<?php

include("db.php");

if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'POST':


            $alunoId = $_POST["aluno"];
            $numeroAlterar = $_POST["numeroTochange"];
            $alunoAlterar = $_POST["alunoTochange"];


            $sql = "UPDATE student set student.name='$alunoAlterar' , student.nr_student=$numeroAlterar WHERE  student.id= $alunoId";
            $result = mysqli_query($conn, $sql);
            header("location: insertAluno.php?=UpdateSuccess");
            break;
        case 'GET':

            $idBarraca = $_GET["barraca"];
            $nomeDoAluno = $_GET["aluno"];
            $numeroAluno = $_GET["nAluno"];



            $sql = " INSERT INTO student (nr_student,name,id_tent) VALUE($numeroAluno,'$nomeDoAluno',$idBarraca)";
            $result = mysqli_query($conn, $sql);


            header("location:insertAluno.php?=insertSuccess");


            break;
        default:
            header("location: insertAluno.php?=NothingHappend");
            break;
    }
}