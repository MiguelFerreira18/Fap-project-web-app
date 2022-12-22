<div id="Footer">
    <footer>
        <div class="container">
            <div class="row">
                <!--social media e contactos-->
                <div class="col-lg-5 col-md-5 col-sm-5 pt-3 mt-auto">
                    <h1 class="text-white">Fale Connosco</h1>
                    <h5 class="text-white">Tens alguma dúvida? </h5>
                    <h5 class="text-white">A FAP está disponível para te esclarecer.</h5>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-5 p-3 mt-5">
                    <h3 class="text-white p-3 m-1">Social Media: </h3>
                    <ul id="ulItems">
                        <li><a href="https://www.instagram.com/federacaoacademicaporto/"><i
                                    class="fa fa-instagram p-2 m-1" aria-hidden="true"
                                    style="color: rgb(192, 25, 170); background-color: #D9CBBD; border-radius: 25%;"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/FAP1989/"><i class="fa fa-facebook-official p-2 m-1"
                                    aria-hidden="true"
                                    style="color: rgb(9, 13, 205); background-color: #D9CBBD; border-radius: 25%;"></i></a>
                        </li>
                        <li><a href="https://twitter.com/FAP1989"><i class="fa fa-twitter p-2 m-1" aria-hidden="true"
                                    style="color: rgb(12, 118, 240);  background-color: #D9CBBD; border-radius: 25%;"></i></a>
                        </li>
                        <li><a href="https://www.linkedin.com/company/federação-académica-do-porto"><i
                                    class="fa fa-linkedin-square p-2 m-1" aria-hidden="true"
                                    style="color: rgb(89, 97, 169);  background-color: #D9CBBD; border-radius: 25%;"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/user/FedAcadPorto"><i class="fa fa-youtube-play p-2 m-1"
                                    aria-hidden="true"
                                    style="color: rgb(219, 24, 24);  background-color: #D9CBBD; border-radius: 25%;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row m-4 pt-4">
                <!--Form -->
                <div class="col-md-12 col-sm-">
                    <form action="post">
                        <!-- Nome e email row-->
                        <div class="form-group row ">

                            <!-- Nome Input -->
                            <label for="input" class="col-form-label text-white mr-2 ">Nome: </label>
                            <div class="col-sm-12 col-lg-5 col-md-10">
                                <input type="text" class="form-control" name="Name" id="input" placeholder="Nome"
                                    style="color:white ;" required>
                            </div>
                            <!-- Email input-->

                            <label for="email " class="col-form-label text-white mr-2">Email: </label>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 ">
                                    <input type="email" class="form-control" name="email" id="input"
                                        aria-describedby="emailHelpId" placeholder="@gmail.com" style="color:white ;">
                                </div>
                            </div>
                        </div>
                        <!--TextArea Row-->
                        <div class="form-group row ">
                            <!--TextArea Input-->

                            <div class="col-sm-6 col-lg-6 col-md-6 ">
                                <label for="textInput" class="col-form-label text-white  mr-2">Texto: </label>
                                <textarea class=" form-control " name="inputTexto " id="input" rows="2"
                                    style="color:white ;" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row p-1 m-5 ">
                            <div class="offset-sm-4 col-sm-10 ">
                                <button type="submit" id="buttonSubmit">Enviar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="m-1" id="infoContact">
                        <li><a href="tel:226 076 370" style="color: rgb(255, 255, 255);"><i class="fa fa-phone m-1"
                                    aria-hidden="true" style="color: rgb(255, 255, 255);  border-radius: 25%;"></i>226
                                076 370</a></li>
                        <li><a href="geral@fap.pt" style="color: rgb(255, 255, 255);"><i class="fa fa-envelope m-1"
                                    aria-hidden="true"
                                    style="color: rgb(255, 255, 255); border-radius: 25%;"></i>geral@fap.pt</a></li>
                        <li>
                            <a href="https://www.google.com/maps/dir//Rua+do+Campo+Alegre+627,+4150-179+Porto/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0xd24650c829ac5af:0x219eea745d7ca2ea?sa=X&ved=2ahUKEwjxza-B9bD0AhXRN8AKHcZzCmsQwwV6BAgSEAM"
                                style="color: rgb(255, 255, 255);"><i class="fa fa-home m-1" aria-hidden="true"
                                    style="color: rgb(255, 255, 255);  border-radius: 25%;"></i>Rua do Campo Alegre,
                                627, 4150 - 179 Porto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
</footer>
</div>

<!---src="script.js" type="text/javascript"-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js " crossorigin="anonymous "></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script type="text/javascript" src="./tableorter-master/dist/js/jquery.tablesorter.js"></script>
<script type="text/javascrpt" src="./tableorter-master/dist/js/jquery.tablesorter.widgets.js"></script>
<script>

    $(function () {
        $('#tabelaShowOf').on('click', 'tbody tr', function () {
            // closest finds the row, .eq(0) finds the first cell
            var id = $(this).closest('tr').children().eq(0).text();

            //perguntar a professora
            $.ajax({
                url: "rowsPage.php",
                type: "POST",
                data: { "myRow": id },
                success: function (response) {
                    console.log(id);
                    var caminho = "rowsPage.php?id=" + id;
                    window.location.replace(caminho);
                    console.log(caminho);
                }, error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        })

    });
</Script>
<script src="script.js" type="text/javascript"></Script>


</body>



</html>