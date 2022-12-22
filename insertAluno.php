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
            echo "<tr><th>numero do Aluno</th><th>nome do Aluno</th><th>nome do curso</th><th>nome da faculdade</th><th>nome da Barraca</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "SELECT student.nr_student,student.name ,course.name ,faculty.name,tent.name ,course.id FROM course,faculty,tent,student where   faculty.id = course.id_faculty and course.id =tent.id_course and tent.id = student.id_tent";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $value = $row[0];
                    echo "<tr><td >" . $row[0] . "</td> <td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>";
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
                                Adicionar Aluno
                            </a>
                        </h5>
                    </div>
                    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">
                            <form action="insertAluno.inc.php?=GET" method="GET">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="faculdade" id="sel_fac_b">
                                        <option value="0">--Faculdade--</option>
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
                                    </select>
                                    <select class="form-control text-center" name="curso" id="sel_cursos_b">
                                        <option value="0">--curso--</option>
                                    </select>

                                    <select class="form-control text-center" name="barraca" id="sel_barracas">
                                        <option value="0">--barraca--</option>
                                    </select>

                                    <input type="text" name="aluno" class="form-control m-1 p-1"
                                        placeholder="nome do Aluno" required>
                                    <input type="text" name="nAluno" class="form-control m-1 p-1"
                                        placeholder="numero do Aluno" required>
                                    <button type="submit" class="btn btn-primary text-center  m-2">subementer
                                        Aluno</button>
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
                                Alterar Aluno
                            </a>
                        </h5>
                    </div>
                    <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                        <div class="card-body">
                            <form action="insertAluno.inc.php?=PUT" method="POST">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="faculdade" id="sel_fac_s">
                                        <option value="0">--Faculdade--</option>
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

                                    <select class="form-control text-center" name="curso" id="sel_cursos_s">
                                        <option value="0">--Curso--</option>
                                    </select>

                                    <select class="form-control text-center" name="barraca" id="sel_barracas_s">
                                        <option value="0">--Barraca--</option>
                                    </select>

                                    <select class="form-control text-center" name="aluno" id="sel_aluno">
                                        <option value="0">--Aluno--</option>
                                    </select>

                                </div>
                                <input type="text" name="numeroTochange" class="form-control m-1 p-1"
                                    placeholder="Novo numero do Aluno" required>
                                <input type="text" name="alunoTochange" class="form-control m-1 p-1"
                                    placeholder="Novo nome do Aluno" required>
                                <br>
                                <button type="submit" class="btn btn-primary text-center  m-2">alterar Aluno</button>
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