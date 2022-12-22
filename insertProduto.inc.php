<?php
include("db.php");

if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'POST':

            if (isset($_POST["priceTochange"])) {
                $idProd = $_POST["produto"];
                $precoProdutoAlterar = $_POST["priceTochange"];


                $sql = "UPDATE product set product.price=$precoProdutoAlterar WHERE Product.id = $idProd ";
                $result = mysqli_query($conn, $sql);


                header("location: insertProduto.php?=PriUpdateSuccess");

            } else {
                $idProd = $_POST["produto"];
                $nomeProdutoAlterar = $_POST["prodTochange"];


                $sql = "UPDATE product set product.name='$nomeProdutoAlterar' WHERE Product.id = $idProd ";
                $result = mysqli_query($conn, $sql);


                header("location: insertProduto.php?=ProUpdateSuccess");
            }



            header("location: insertProduto.php?=UpdateSuccess");
            break;
        case 'GET':
            $nomeProduto = $_GET["prod"];
            $priceProd = $_GET["price"];

            $sql = "INSERT INTO product (name,price) VALUE('$nomeProduto',$priceProd)";
            $result = mysqli_query($conn, $sql);


            header("location:  insertProduto.php?=insertSuccess");
            break;
        default:
            header("location:  insertProduto.php?=NothingHappend");
            break;
    }
}