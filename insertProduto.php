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
            echo "<tr><th>nome</th><th>price</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            $sql = "SELECT Product.name as namePr,product.price FROM product";
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
                <div class="card mt-3 ">
                    <div class="card-header" role="tab" id="section1HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId"
                                aria-expanded="true" aria-controls="section1ContentId">
                                Adicionar Produto
                            </a>
                        </h5>
                    </div>
                    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">
                            <form action="insertProduto.inc.php?=GET" method="GET">
                                <div class="form-group text-center m-2 p-4">
                                    <input type="text" class="form-control" name="prod" placeholder="Nome do produto"
                                        required>
                                    <input type="text" class="form-control" name="price" placeholder="preço do produto"
                                        required>
                                    <button type="submit" class="btn btn-primary text-center  m-2">subementer
                                        Produto</button>
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
                                Alterar Nome do Produto
                            </a>
                        </h5>
                    </div>
                    <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                        <div class="card-body">
                            <form action="insertProduto.inc.php?=PUT" method="POST">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="produto">
                                        <option value="0">--Produto--</option>
                                        <?php
                                        $sql = "SELECT Product.name as namePr, Product.id FROM product";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                $value = $row[0];
                                                echo " <option value='$row[1]'>" . $row[0] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="text" name="prodTochange" class="form-control m-1 p-1"
                                        placeholder="Novo Nome do Produto " required>
                                    <br>
                                    <button type="submit" class="btn btn-primary text-center  m-2  ">alterar
                                        Produto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="section2HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId"
                                aria-expanded="true" aria-controls="section2ContentId">
                                Alterar Preço do Produto
                            </a>
                        </h5>
                    </div>
                    <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                        <div class="card-body">
                            <form action="insertProduto.inc.php?=PUT" method="POST">
                                <div class="form-group text-center m-2 p-4">
                                    <select class="form-control text-center" name="produto">
                                        <option value="0">--Produto--</option>
                                        <?php
                                        $sql = "SELECT Product.name as namePr, Product.id FROM product";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_row($result)) {
                                                $value = $row[0];
                                                echo " <option value='$row[1]'>" . $row[0] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="text" name="priceTochange" class="form-control m-1 p-1"
                                        placeholder="Novo preço " required>
                                    <br>
                                    <button type="submit" class="btn btn-primary text-center  m-2  ">alterar Preço do
                                        Produto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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