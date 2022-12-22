<?php
include "db.php";

$alId = 0;

if (isset($_POST['alId'])) {
    $alId = mysqli_real_escape_string($conn, $_POST['alId']); // department id
}

$aluno_arr = array();

if ($alId > 0) {
    $sql = "SELECT student.id, student.name FROM student WHERE student.id_tent=" . $alId;

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $alunoid = $row['id'];
        $name = $row['name'];

        $aluno_arr[] = array("id" => $alunoid, "name" => $name);
    }

}
//
// encoding array to json format
echo json_encode($aluno_arr);