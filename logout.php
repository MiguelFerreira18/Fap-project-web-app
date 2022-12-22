<!-- Modal -->
<div class="modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content clearfix">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <div class="modal-body">
                <form method="post" action="logout.inc.php">
                    <?php
                    echo "<h2 class='text-center' id='font' style='font-size:60px!important;'>" . $_COOKIE["user"] . "</h2>";
                    ?>
                    <h3 class="description text-center" style="font-family:'times new roman' ;">Pretende mesmo sair?
                    </h3>
                    <div class=" text-center">
                        <button class="btn btn-outline-danger m-5 p-3 btn-lg" type="submit" name="submit"
                            value="sim">sim</button>
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