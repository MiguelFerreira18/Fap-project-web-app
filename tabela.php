<?php
if (!isset($_COOKIE["user"])) {
    header("location: index.php?=youCannotAccessThisPage");
    exit();
}
?>
<?php
include("header.php");
?>

<!---<table>
    <tr><th>1</th></tr>
    <tr><th>2</th></tr>
    <tr><th>3</th></tr>
</table>-->

<div class="container m-3 p-2">
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
        if ($row[0] != "dbuser")
            echo "<tr><td>$row[0]</td></tr>";
    }
    ?>
        </tbody>


    </table>

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