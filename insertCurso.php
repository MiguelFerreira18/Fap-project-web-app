<?php
if (!isset($_COOKIE["user"])) {
    header("Location: index.php?=logged_out");
}
include("db.php");
include("header.php");
?>


<div class="container">
    <div class="row">
        <div class="col-lg-6 p-2">
            <?php
            echo "<table id='secondaryTable'>";
            echo "<thead>";
            echo "<tr><th>nome</th><th>faculdade</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "SELECT course.name as nameCs, faculty.name,course.id FROM course,faculty where   faculty.id = course.id_faculty";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $value = $row[0];
                    echo "<tr><td >" . $row[0] . "</td> <td>" . $row[1] . "</td></tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
            ?>
        </div>

        <div class="col-lg-6 p-3">
            <div id="accordianId" role="tablist" aria-multiselectable="true">
                <div class="card mt-5 ">
                    <div class="card-header" role="tab" id="section1HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId"
                                aria-expanded="true" aria-controls="section1ContentId">
                                Adicionar Curso
                            </a>
                        </h5>
                    </div>
                    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">
                            <form action="insertCurso.inc.php?=GET" method="GET">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control" name="fac">
                                        <?php
                                        // Fetch Department
                                        $sql = "SELECT * FROM faculty";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $idFaculdade = $row['id'];
                                            $nomeDaFaculdade = $row['name'];
                                            // Option
                                            echo "<option value='" . $idFaculdade . "'>" . $nomeDaFaculdade . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="text" class="form-control" name="curso" placeholder="Nome do curso">
                                    <button type="submit" class="btn btn-primary text-center  m-2">subementer
                                        Curso</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="section3HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId"
                                aria-expanded="true" aria-controls="section3ContentId">
                                Alterar Curso
                            </a>
                        </h5>
                    </div>
                    <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                        <div class="card-body">
                            <form action="insertCurso.inc.php?=PUT" method="POST">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="faculdade" id="sel_fac">
                                        <?php
                                        $sql = "SELECT faculty.name as nameFa, faculty.id FROM faculty";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                $value = $row[0];
                                                echo " <option value='$row[1]'>" . $row[0] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select class="form-control" name="curso" id="sel_cursos">
                                    </select>
                                </div>
                                <input type="text" name="cursoTochange" class="form-control m-1 p-1"
                                    placeholder="Novo nome do curso">
                                <br>
                                <button type="submit" class="btn btn-primary text-center  m-2">alterar Curso</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>



<script type="text/javascript">
    let element = document.querySelector("nav");
    element.classList.remove("fixed-top");
    element.classList.remove("navbar-dark");

    element.style = "background: rgb(117, 116, 139);";
    element.style = "background: linear-gradient(90deg, rgba(117, 116, 139, 1) 0%, rgba(145, 144, 162, 1) 49%, rgba(117, 116, 139, 1) 88%);";
</script>

<?php

include("footer.php");

?>