<?php
if (!isset($_COOKIE["user"])) {
    header("Location: index.php?=logged_out");
}
include("header.php");
?>


<div class="container m-1 p-2">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <table id="tabelaShowOf">
                <thead>
                    <tr>
                        <th>TABELAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        include("db.php");
        $sql = "SHOW tables";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            if ($row[0] != "dbuser" && $row[0] != "stock")
                echo "<tr><td>$row[0]</td></tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 col-md-6">
            <?php
    if (!empty($_SERVER['QUERY_STRING'])) {
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $id = $queries['id'];




        if ($id === "faculty") {
            faculdade($conn);
        } else if ($id === "product") {
            produto($conn);
        } else if ($id === "tent") {
            tenda($conn);
        } else if ($id === "course") {
            curso($conn);
        } else if ($id === "stock") {
            stock($conn);
        } else if ($id === "student") {
            estudante($conn);
        } else {
            $arrayCode = explode(" ", $id);

            if ($arrayCode[1] == "20") {
                informationFaculty($conn, $arrayCode[0]); //Mostra informação dos cursos da faculdade
            } else if ($arrayCode[1] == "30") {
                infoCursos($conn, $arrayCode[0]); //mostra informação das barracas do curso
            } else if ($arrayCode[1] == "40") {
                infoBarracas($conn, $arrayCode[0]); //mostra a informação dos estudantes e do stock da barraca
            }

        }
    }



    //função para curso
    function curso($conn)
    {

        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>Nome</th><th>Faculdade</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT course.name as nameCr, faculty.name as nameFc,course.id FROM course,faculty WHERE faculty.id = course.id_faculty ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td><a href='rowsPage.php?id=$row[2] 30'>" . $row[0] . "</a></td>" . " <td>" . $row[1] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    //função para faculdade
    function faculdade($conn)
    {

        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>nome</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT faculty.name as nameFa, faculty.id FROM faculty";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $value = $row[0];
                echo "<tr><td ><a href='rowsPage.php?id=$row[1] 20'>" . $row[0] . "</a></td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    //função para o produto
    function produto($conn)
    {
        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>Nome</th><th>preço</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT product.name as namePr, product.price as pricePr FROM product ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td>" . " <td>" . $row[1] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    //função para o stock
    function stock($conn)
    {
        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>Nome do produto</th><th>preço</th><th>quantidade</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT product.name as namePr, product.price as pricePr, stock.qtd as quantity FROM product,stock  where stock.id_product = product.id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td>" . " <td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }

    //função para o estudante
    function estudante($conn)
    {
        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>Número do aluno</th><th>nome do estudante</th><th>nome da tenda</th><th>Nome do curso</th><th>nome de faculdade</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT student.nr_student as numeroAl, student.name as nameAl, tent.name as nameTe, course.name as nameCr, faculty.name as facultyNa FROM TENT,COURSE,FACULTY,Student where tent.id_course = course.id AND faculty.id = course.id_faculty and student.id_tent = tent.id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td>" . " <td>" . $row[1] . "</td>" . "<td>" . $row[2] . "</td><td>" . $row[3] . "</td><td> " . $row[4] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    //função para tenda
    function tenda($conn)
    {

        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>Nome</th><th>Nome do curso</th><th>Nome da faculdade</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $sql = "SELECT tent.name as nameTe, course.name as nameCour, faculty.name as nameFc,tent.id FROM TENT,COURSE,FACULTY where tent.id_course = course.id AND faculty.id = course.id_faculty ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td><a href='rowsPage.php?id=$row[3] 40'>" . $row[0] . "</a></td>" . " <td>" . $row[1] . "</td>" . "<td>" . $row[2] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    //Funções de listagens especificas
    
    //informação dos cursos da faculdade
    function informationFaculty($conn, $id)
    {


        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>nome do cursos</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        $sql = "SELECT course.name as nameCr, course.id FROM course,faculty where faculty.id = '$id' and course.id_faculty = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td><a href='rowsPage.php?id=$row[1] 30'>" . $row[0] . "</a></td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";

    }

    //informação das barracas dos cursos
    function infoCursos($conn, $id)
    {

        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>nome das barracas</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        $sql = "SELECT tent.name as nameTe, tent.id FROM course,tent where course.id='$id' and tent.id_course= '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td><a href='rowsPage.php?id=$row[1] 40'>" . $row[0] . "</a></td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";

    }

    //informação dos alunos e do stock das barracas
    function infoBarracas($conn, $id)
    {

        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>nome do aluno</th><th>numero do aluno</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        $sql = "SELECT student.name as nameSt, student.nr_student as numberSt FROM Student,tent where tent.id='$id' and student.id_tent= '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";


        echo "<table id='secondaryTable'>";
        echo "<thead>";
        echo "<tr><th>quantidade de stock</th><th>nome do produto</th><th>preço do produto</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        $sql = "SELECT stock.qtd as quantSt, product.name as prodNa, product.price as prodPr FROM stock,tent,product where stock.id_product=product.id and stock.id_tent ='$id' and tent.id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . " €</td></tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }

    ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
        </div>
    </div>
</div>


<script>

    let element = document.querySelector("nav");
    element.classList.remove("fixed-top");
    element.classList.remove("navbar-dark");

    element.style = "background: rgb(117, 116, 139);";
    element.style = " background: linear-gradient(90deg, rgba(117, 116, 139, 1) 0%, rgba(145, 144, 162, 1) 49%, rgba(117, 116, 139, 1) 88%);";
</script>


<?php
include("footer.php");
?>