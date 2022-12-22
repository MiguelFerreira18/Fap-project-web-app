<?php



include("db.php");






if (isset($_SERVER['REQUEST_METHOD'])) {
    $REQUEST = $_SERVER['REQUEST_METHOD'];
    echo $_SERVER['REQUEST_METHOD'];
    switch ($REQUEST) {
        case 'POST':

            $barracaid = $_POST["barraca"];
            $barracaAlterar = $_POST["barracaTochange"];


            $sql = "UPDATE tent set tent.name='$barracaAlterar' WHERE  tent.id= $barracaid";
            $result = mysqli_query($conn, $sql);
            header("location: insertBarraca.php?=UpdateSuccess");
            break;
        case 'GET':
            $cursoId = $_GET["curso"];
            $idFaculdade = $_GET["faculdade"];
            $nomeBarraca = $_GET["barraca"];


            $sql = " INSERT INTO tent (name,id_course) VALUE('$nomeBarraca',$cursoId)";
            $result = mysqli_query($conn, $sql);


            header("location:insertBarraca.php?=insertSuccess");
            break;
        default:
            header("location: insertBarraca.php?=NothingHappend");
            break;
    }
}