<?php
include "db.php";

$cursoId = 0;

if (isset($_POST['cursoid'])) {
    $cursoId = mysqli_real_escape_string($conn, $_POST['cursoid']); // department id
}

$barracas_arr = array();

if ($cursoId > 0) {
    $sql = "SELECT tent.id, tent.name FROM tent WHERE tent.id_course=" . $cursoId;

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $barracaid = $row['id'];
        $name = $row['name'];

        $barracas_arr[] = array("id" => $barracaid, "name" => $name);
    }

}
//
// encoding array to json format
echo json_encode($barracas_arr);