<?php
session_start();
$dbserver = "localhost";
$dbuname = "root";
$dbpsw = "";
$db = "loginsys";
$conn = mysqli_connect($dbserver, $dbuname, $dbpsw, $db);
if(!$conn){
    die("Error, Connection Failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solid Template</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
	<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <style>
        .berr{
            color: #f2f2f2;
            background-color: #466dc2;
            padding: 5pt 10pt;
            border-radius: 2pt;
        }
        .gerr{
            color: #f2f2f2;
            background-color: #3bb355;
            padding: 5pt 10pt;
            border-radius: 2pt;
        }
        .results{
            background-color: #1D2026;
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 400pt;
            align-items: center;
            justify-content: center;
            margin: 20pt 0;
        }
form{
    width: 100%;
    max-width: 400pt;
    margin: 10pt auto;
    padding: 0 10pt;
}
.form-group{
    margin: 9pt 0;
    width: 100%;
    display: flex;
    flex-direction: column;
}
.form-group .form-control{
    border: none;
    border-bottom: 4pt solid #242830;
    background-color: #1D2026;
    padding: 5pt 10pt;
    outline: none;
    color: #242830;
    width: 100%;
}
.form-group .form-control:valid,
.form-group .form-control:focus{
    border-bottom: 4pt solid #2F89FC;
    color: #2F89FC;
}
.form-group .form-control:valid+label,
.form-group .form-control:focus+label{
    border-bottom: 4pt solid #2F89FC;
    color: #2F89FC;
}
.hero-cta{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin: 20pt 0;
}
.hero-cta button,
.hero-cta a{
    width: fit-content;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 9pt;
    padding: 5pt 10pt;
    border: none;
    border-radius: 5pt;
    font-weight: 600;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}
.site-header-inner div:nth-child(2) button{
    background-color: #2F89FC;
}
.site-header-inner, .site-header-inner div:nth-child(2){
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    z-index: 100;
}
    </style>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
							<a href="index.php">
								<img class="header-logo-image" src="dist/images/logo.svg" alt="Logo">
                            </a>
                        </h1>
                    </div>
                    <div class="hero-cta">
                    <?php
                    if(isset($_SESSION["uname"])){
                        echo '<a class="header-nav-link" href="index.php">'.$_SESSION["uname"].'</a>
                        <a class="header-nav-link button" href="index.php?search">Search</a>
                        <form action="function.php" method="post">
                        <button class"button" type="submit" name="logout">Logout</button>
                        </form>';
                    }
                    ?>
                    </div>
                </div>
            </div>
            
        </header>