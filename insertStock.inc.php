<?php
if (!isset($_COOKIE["user"])) {
    header("Location: index.php?=logged_out");
}

include("db.php");
if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'GET':


            $barracaId = $_GET["barraca"];
            $productId = $_GET["produto"];
            $value = $_GET["valor"];


            $sql = "INSERT INTO STOCK (id_tent,id_product,qtd) VALUE($barracaId,$productId,$value)";
            $result = mysqli_query($conn, $sql);


            header("location:  insertStock.php?=UpdateSuccess");


            break;
        case 'POST':

            $tendaId = $_POST["tenda"];
            $prodId = $_POST["prod"];
            $value = $_POST["valor"];

            $sql = " UPDATE stock SET qtd=$value where stock.id_tent=$tendaId and stock.id_product=$prodId";
            $result = mysqli_query($conn, $sql);


            header("location: insertStock.php?=UpdateSuccess");

            break;
        default:
            header("location:  insertStock.php?=NothingHappend");
            break;
    }
}