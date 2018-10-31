<?php 
$page = !empty($_GET['page']) ? $_GET['page'] : 'home.php';
// $allowedPages = ['home.php', 'sqli.php', 'xss.php', 'login.php', 'logout.php'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vulnpix</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style type="text/css">
        .well {
            margin: 20px 0;
            padding: 20px;
            border-radius: 3px;
            border: 1px solid #ededed;
            background-color:#F8F9FA
        }
        .logo {
            width: 50px
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg static-top <?php echo !empty($_SESSION['fortilogsUsername']) ? 'navbar-dark bg-dark' : 'navbar-light bg-light' ?>">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="images/vulpix.png" class="logo" /> Vulnpix</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'sqli' ? 'active' : ''; ?>" href="/index.php?page=sqli.php">SQLi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'xss' ? 'active' : ''; ?>" href="/index.php?page=xss.php">XSS</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'xss' ? 'active' : ''; ?>" href="/index.php?page=rce.php">RCE</a>
                    </li> -->
                    <?php if (!empty($_SESSION['loggedIn'])): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page == 'logout' ? 'active' : ''; ?>" href="/index.php?page=logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $page == 'login' ? 'active' : ''; ?>" href="/index.php?page=login.php">Login</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container">
        <?php 
            // if (in_array($page, $allowedPages)) {
                include("$page");
            // } else {
                // echo "<div class='alert alert-danger text-center'>Invalid page</div>";
            // }
        ?>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>