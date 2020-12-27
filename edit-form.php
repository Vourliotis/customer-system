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

    <div class="cotainer data-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white text-center font-weight-bold">EDIT CUSTOMER DATA</div>
                    <div class="card-body">

                        <!-- FORM -->
                        <form action="" method="put" id="dataForm" class="dataForm">

                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="fname" class="form-control" name="fname" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="lname" id="lname" class="form-control" name="lname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pnumber" class="col-md-4 col-form-label text-md-right">Phone
                                    Number</label>
                                <div class="col-md-6">
                                    <input type="tel" pattern="([+]\d{1,2})?[0-9]{10}" title="invalid phone number"
                                        id="pnumber" class="form-control" name="pnumber" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                <div class="col-md-6">
                                    <input type="text" id="category" class="form-control" name="category" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Information
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript"> var customer_id = <?php echo $_GET['id']; ?>;</script>
<script type="text/javascript" src="scripts/edit.js"></script>

</body>

</html>