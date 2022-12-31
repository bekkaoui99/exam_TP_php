<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Product menu -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="showData.php">personne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addPer.php">ajouter personne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="show_with_c.php">personne 2020</a>
                </li>

            </ul>
            <!-- Login and register menu -->
            <ul class="navbar-nav">
                <li class="nav-item">

                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        echo "<a class='nav-link' href='logout.php'>logout</a>";
                    } else {
                        echo "<a class='nav-link' href='index.php'>Login</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>