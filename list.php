<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles.css">

    <title>Login Page Assignment</title>
</head>

<body>
    <!-- Navbar -->
    <?php include 'core/header.php';?>

    <div class="container table-container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th width="15%" scope="col">First Name</th>
                    <th width="15%" scope="col">Last Name</th>
                    <th width="15%" scope="col">Phone Number</th>
                    <th width="20%" scope="col">Email</th>
                    <th width="15%" scope="col">Category</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody id="records">

            </tbody>
        </table>
    </div>

    <script src="scripts/list.js"></script>
</body>

</html>
