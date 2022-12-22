<?php

if (!isset($_COOKIE["user"])) {
    header("location:index.php");
}
include("header.php");
?>


<div class="container">
    <div class="row m-4 p-2">
        <div class="col-lg-6">
            <a href="insertFaculdade.php">
                <div class="card m-2 p-4 bg-primary"
                    style="background-image:url(./img/cover1.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-light">INSERIR FACULDADE</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 ">
            <a href="insertCurso.php">
                <div class="card p-4 bg-info" style="background-image:url(./img/cover2.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-light">INSERIR CURSOS</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row m-4 p-2">
        <div class="col-lg-6">
            <a href="insertBarraca.php">
                <div class="card m-2 p-4 bg-success"
                    style="background-image:url(./img/cover3.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-light">INSERIR BARRACAS</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="insertAluno.php">
                <div class="card m-2 p-4 bg-warning"
                    style="background-image:url(./img/cover4.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-light">INSERIR ALUNOS</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row m-4 p-2">
        <div class="col-lg-6">
            <a href="insertStock.php">
                <div class="card m-2 p-4 bg-danger"
                    style="background-image:url(./img/cover5.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-light">INSERIR STOCK</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="insertProduto.php">
                <div class="card p-4" style="background-image:url(./img/cover6.jpg) ; background-size: cover;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-center text-light">INSERIR PRODUTOS</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>









<script>
    let element = document.querySelector("nav");
    element.classList.remove("fixed-top");
    element.classList.remove("navbar-dark");

    element.style = "background: rgb(117, 116, 139);";
    element.style = " background: linear-gradient(90deg, rgba(117, 116, 139, 1) 0%, rgba(145, 144, 162, 1) 49%, rgba(117, 116, 139, 1) 88%);";
</script>
<?php


include("footer.php");
?>