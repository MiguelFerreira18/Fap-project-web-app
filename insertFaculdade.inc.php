<?php



include("db.php");






if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'POST':
            $nomeFaculdade = $_POST["faculdade"];
            $nomeFaculdadeAlterar = $_POST["uniTochange"];


            $sql = "UPDATE FACULTY set Faculty.name='$nomeFaculdadeAlterar' WHERE faculty.id = $nomeFaculdade";
            $result = mysqli_query($conn, $sql);


            header("location: insertFaculdade.php?=UpdateSuccess");
            break;
        case 'GET':

            $nomeFaculdade = $_GET["uni"];


            $sql = " INSERT INTO FACULTY (name) VALUE('$nomeFaculdade')";
            $result = mysqli_query($conn, $sql);


            header("location: insertFaculdade.php?=insertSuccess");
            break;
        default:
            header("location: insertFaculdade.php?=NothingHappend");
            break;
    }
}