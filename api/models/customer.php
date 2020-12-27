<?php
class Customer
{
    // database connection and table name
    private $conn;
    private $table_name = "customers";

    // object properties
    public $id;
    public $fname;
    public $lname;
    public $pnumber;
    public $email;
    public $category;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read customers
    public function getCustomers()
    {

        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create customer
    public function createCustomer()
    {

        // query to insert customer
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    fname=:fname, lname=:lname, pnumber=:pnumber, email=:email, category=:category";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->lname = htmlspecialchars(strip_tags($this->lname));
        $this->pnumber = htmlspecialchars(strip_tags($this->pnumber));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->category = htmlspecialchars(strip_tags($this->category));

        // bind values
        $stmt->bindParam(":fname", $this->fname);
        $stmt->bindParam(":lname", $this->lname);
        $stmt->bindParam(":pnumber", $this->pnumber);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":category", $this->category);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // get a single customer back from id
    public function getSingleCustomer()
    {
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of customer to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        if ($row) {
            $this->fname = $row['fname'];
            $this->lname = $row['lname'];
            $this->pnumber = $row['pnumber'];
            $this->email = $row['email'];
            $this->category = $row['category'];
        }
    }

    // update customer
    public function updateCustomer()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                fname = :fname,
                lname = :lname,
                pnumber = :pnumber,
                email = :email,
                category = :category
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->lname = htmlspecialchars(strip_tags($this->lname));
        $this->pnumber = htmlspecialchars(strip_tags($this->pnumber));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->category = htmlspecialchars(strip_tags($this->category));

        // bind new values
        $stmt->bindParam(':fname', $this->fname);
        $stmt->bindParam(':lname', $this->lname);
        $stmt->bindParam(':pnumber', $this->pnumber);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete customer
    public function deleteCustomer()
    {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
