<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FEDERAÇÃO ACADEMICA PORTUGUESA</title>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./tableorter-master/dist/css/theme.default.min.css">
    <link rel="stylesheet" href="index.css" type="text/css">
    </link>

</head>

<body>

    <!--NavBar-->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" id="navBarColor">
        <h1 style="font-weight:bold ;"><a class="navbar-brand" href="./index.php" style="font-size:30px ;">Federação
                académica do porto</a></h1>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-3" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0" style="margin-left: 30%;">
                <li class="nav-item active mr-4">
                    <h3><a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a></h3>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_COOKIE["user"])) {
                        echo "<h3><a class='nav-link' href='./tabela.php'>Table<span class='sr-only'></span></a></h3>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php

                    if (isset($_COOKIE["user"])) {
                        echo "<h3><a class='nav-link m-1 p-1' href='insertPage.php'>Insert<span class='sr-only'></span></a></h3>";
                    }
                    ?>
                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0 ml-auto">

                <!---começa aqui A MODEL-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="modal-box text-center">
                                <!-- Button trigger modal -->
                                <?php
                                if (!isset($_COOKIE["user"])) {
                                    echo '<button type="button" class="btn btn-lg show-modal"  data-toggle="modal" data-target="#myModal" style="font-size:30px ; color:rgb(245, 107, 9); font-weight:bold !important;">Login</button>';
                                    include("modalLogIn.php");
                                } else {
                                    echo '<button type="button" class="btn " data-toggle="modal"data-target="#myModalLogout" style="font-size:30px ; color:rgb(245, 107, 9);font-weight:bold !important;">Log out</button>';
                                    include("logout.php");
                                }
                                ?>
            </ul>
        </div>
    </nav>