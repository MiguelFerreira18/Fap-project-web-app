<?php
include "db.php";

$faculdadeid = 0;

if (isset($_POST['faculdadeid'])) {
    $faculdadeid = mysqli_real_escape_string($conn, $_POST['faculdadeid']); // department id
}

$courses_arr = array();

if ($faculdadeid > 0) {
    $sql = "SELECT course.id, course.name FROM  course WHERE course.id_faculty=" . $faculdadeid;

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $courseid = $row['id'];
        $name = $row['name'];

        $courses_arr[] = array("id" => $courseid, "name" => $name);
    }
}

// encoding array to json format
echo json_encode($courses_arr);