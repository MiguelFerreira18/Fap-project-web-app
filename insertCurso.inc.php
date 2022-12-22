<?php

if (!isset($_COOKIE["user"])) {
    header("Location: index.php?=logged_out");
}

include("db.php");






if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'POST':

            $faculdadeId = $_POST["faculdade"];
            $cursoId = $_POST["curso"];
            $cursoAalterar = $_POST["cursoTochange"];


            $sql = "UPDATE course set course.name='$cursoAalterar' WHERE course.id_faculty = $faculdadeId and course.id=$cursoId";
            $result = mysqli_query($conn, $sql);


            header("location: insertCurso.php?=UpdateSuccess");

            break;
        case 'GET':

            $nomeCurso = $_GET["curso"];
            $idFaculdade = $_GET["fac"];


            $sql = " INSERT INTO course (name,id_faculty) VALUE('$nomeCurso',$idFaculdade)";
            $result = mysqli_query($conn, $sql);


            header("location:insertCurso.php?=insertSuccess");

            break;
        default:
            header("location: insertCurso.php?=NothingHappend");
            break;
    }
}