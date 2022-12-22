console.log("is ready");
console.log('table sorted');


// call the tablesorter plugin
$("table").tablesorter({

    // initialize zebra striping of the table
    widgets: ['zebra', 'columns'],
    // change the default striping class names
    // updated in v2.1 to use widgetOptions.zebra = ["even", "odd"]
    // widgetZebra: { css: [ "normal-row", "alt-row" ] } still works
});


//SERVE PARA alterar curso
$("#sel_fac").change(function() {
    var facid = $(this).val();
    console.log("entra");
    $.ajax({
        url: 'getCursos.php',
        type: 'post',
        data: { faculdadeid: facid },
        dataType: 'json',
        success: function(response) {

            var len = response.length;
            $("#sel_cursos").empty();
            $("#sel_cursos").append("<option value='0'>--Curso--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_cursos").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});
//ACABA AQUI PARA O CURSO

// SERVE PARA ALTERAR BARRACAS
$("#sel_fac_b").change(function() {
    var facid = $(this).val();
    console.log("entra");
    $.ajax({
        url: 'getCursos.php',
        type: 'post',
        data: { faculdadeid: facid },
        dataType: 'json',
        success: function(response) {

            var len = response.length;
            $("#sel_cursos_b").empty();
            $("#sel_cursos_b").append("<option value='0'>--Curso--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_cursos_b").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});

$("#sel_cursos_b").change(function() {
    var curid = $(this).val();
    console.log(curid);
    $.ajax({
        url: 'getBarraca.php',
        type: 'post',
        data: { cursoid: curid },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            console.log("entrou");
            var len = response.length;
            $("#sel_barracas").empty();
            $("#sel_barracas").append("<option value='0'>--Barraca--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_barracas").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});
//ACABA AQUI PARA AS BARRACAS
console.log('table sorted 12');

//SERVE PARA ALTERAR ALUNOS
$("#sel_fac_s").change(function() {
    var facid = $(this).val();
    //console.log("entra");
    $.ajax({
        url: 'getCursos.php',
        type: 'post',
        data: { faculdadeid: facid },
        dataType: 'json',
        success: function(response) {

            var len = response.length;
            $("#sel_cursos_s").empty();
            $("#sel_cursos_s").append("<option value='0'>--Curso--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_cursos_s").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});

$("#sel_cursos_s").change(function() {
    var curid = $(this).val();
    //console.log(curid);
    $.ajax({
        url: 'getBarraca.php',
        type: 'post',
        data: { cursoid: curid },
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            //console.log("entrou");
            var len = response.length;
            $("#sel_barracas_s").empty();
            $("#sel_barracas_s").append("<option value='0'>--Barraca--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_barracas_s").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});

$("#sel_barracas_s").change(function() {
    var alunoId = $(this).val();
    console.log(alunoId);
    $.ajax({
        url: 'getAluno.php',
        type: 'post',
        data: { alId: alunoId },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            console.log("entrou");
            var len = response.length;
            $("#sel_aluno").empty();
            $("#sel_aluno").append("<option value='0'>--Aluno--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_aluno").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});
//ACABA AQUI PARA OS ALUNOS


//SERVE PARA ALTERAR STOCK
$("#sel_bar").change(function() {
    var barId = $(this).val();
    console.log("entra");
    $.ajax({
        url: 'getStock.php',
        type: 'post',
        data: { barracaId: barId },
        dataType: 'json',
        success: function(response) {

            var len = response.length;
            $("#sel_stock").empty();
            $("#sel_stock").append("<option value='0'>--Stock--</option>");
            for (var i = 0; i < len; i++) {
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_stock").append("<option value='" + id + "'>" + name + "</option>");

            }
        },

    });
});

console.log('table sorted 12');