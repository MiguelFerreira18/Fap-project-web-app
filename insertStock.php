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
            echo "<tr><th>nome da tenda</th><th>nome do produto</th><th>quantity</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "SELECT tent.name,product.name,stock.qtd FROM stock,tent,product where stock.id_tent = tent.id AND stock.id_product = product.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $value = $row[0];
                    echo "<tr><td >" . $row[0] . "</td> <td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
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
                                Adicionar Stock
                            </a>
                        </h5>
                    </div>
                    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">

                            <form action="insertStock.inc.php?=GET" method="GET">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="faculdade" id="sel_fac_b">
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

                                    <select class="form-control text-center" name="curso" id="sel_cursos_b">
                                        <option value="0">--Curso--</option>
                                    </select>

                                    <select class="form-control text-center" name="barraca" id="sel_barracas">
                                        <option value="0">--Barraca--</option>
                                    </select>

                                    <select name="produto" class="form-control input-lg text-center">
                                        <option value="0">--Produto--</option>
                                        <?php
                                        include("db.php");
                                        $sql = "SELECT product.name, product.id FROM product";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                echo "<option value=" . $row[1] . " > " . $row[0] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <input type="text" name="valor" class="form-control m-1 p-1" placeholder="valor"
                                    required>
                                <br>
                                <button type="submit" class="btn btn-primary text-center  m-2">Adicionar stock</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="section3HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId"
                                aria-expanded="true" aria-controls="section3ContentId">
                                Alterar Stock
                            </a>
                        </h5>
                    </div>
                    <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                        <div class="card-body">
                            <form action="insertStock.inc.php?=GET" method="POST">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="tenda">
                                        <option value="0">--Tenda--</option>
                                        <?php
                                        // Fetch Department
                                        $sql = "SELECT * FROM tent";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $idBarraca = $row['id'];
                                            $nomeDaBarraca = $row['name'];
                                            // Option
                                            echo "<option value='" . $idBarraca . "'>" . $nomeDaBarraca . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <select class="form-control text-center" name="prod">
                                        <option value="0">--Produto--</option>
                                        <?php
                                        include("db.php");
                                        $sql = "SELECT product.name, product.id FROM product";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                echo "<option value=" . $row[1] . " > " . $row[0] . "</option>";
                                            }
                                        }
                                        ?>

                                    </select>
                                    <input type="text" name="valor" class="form-control m-1 p-1"
                                        placeholder="valor a alterar" required>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary  text-center  m-2" data-toggle="modal"
                                        data-target="#modelId">
                                        Alterar stock
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pretende mesmo efetuar essa mudança?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer justify-content-center">

                                                    <button type="submit" class="btn btn-outline-success ">Sim</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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