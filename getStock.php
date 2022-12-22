<?php
include "db.php";

$barracaId = 0;

if (isset($_POST['barracaId'])) {
    $barracaId = mysqli_real_escape_string($conn, $_POST['barracaId']); // department id
}

$barracas_arr = array();

if ($barracaId > 0) {
    $sql = "SELECT course.id, course.name FROM  course WHERE course.id_faculty=" . $faculdadeid;

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $barracaid = $row['id'];
        $name = $row['name'];

        $barraca_arr[] = array("id" => $courseid, "name" => $name);
    }
}

// encoding array to json format
echo json_encode($barraca_arr);