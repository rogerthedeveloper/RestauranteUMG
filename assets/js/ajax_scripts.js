/**
 * Created by RSpro on 23/05/16.
 */

$("input, textarea").val("");


var table_details = $('.detail_table').DataTable({

    responsive: true,
    dom: 'Bfrtlip',
    buttons: [
        'excel', 'pdf', 'print'
    ],
    select: true,
    pageLength: 10,
    scrollY:    150,

});


function adjustHeaders() {


    table_details.columns.adjust().draw();


}

setTimeout(function(){ adjustHeaders(); }, 100);



$(".panel-title").on("click", function()  {


    setTimeout(function(){ adjustHeaders(); }, 100);


});


$(window).resize(function() {


    setTimeout(function(){ adjustHeaders(); }, 100);


});



// Métodos Delegados

$('.datepicker').datepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: "hh:mm:ss",

});

var tpr = $('.bxslider.tpr').bxSlider({
        pager: false,
        slideMargin: 10,
        infiniteLoop: false,
        adaptiveHeight: true,
        responsive: true,
        touchEnabled: false,
        controls: false,
        adaptiveHeightSpeed: 0,

  });


var tpr_data = new Array();

tpr_data["tpr_restaurante_id"] = "";
tpr_data["tpr_restaurante_fecha"] = "";
tpr_data["tpr_restaurante_tipo"] = "";
tpr_data["tpr_restaurante_no_min_sillas"] = "";
tpr_data["tpr_restaurante_id_mesa"] = "";
tpr_data["tpr_restaurante_nombre_reservacion"] = "";
tpr_data["tpr_restaurante_apellido_reservacion"] = "";


function tpr_restaurante(param, section) {

    switch(section) {
        case 'restaurante':

        tpr_data["tpr_restaurante_id"] = param;

        tpr.goToNextSlide();

        break;
        case 'fecha':

        tpr_data["tpr_restaurante_fecha"] = param;

        tpr.goToNextSlide();

        break;
        case 'tipo_mesa':

        tpr_data["tpr_restaurante_tipo"] = param;

        tpr.goToNextSlide();

        break;
        case 'no_personas':

        tpr_data["tpr_restaurante_no_min_sillas"] = param;

        tpr.goToNextSlide();

        break;
        case 'mesa_id':

        tpr_data["tpr_restaurante_id_mesa"] = param;

        tpr.goToNextSlide();

        break;
        case 'nombre_reservacion':

        tpr_data["tpr_restaurante_nombre_reservacion"] = param;

        tpr.goToNextSlide();

        break;
        case 'apellido_reservacion':

        tpr_data["tpr_restaurante_apellido_reservacion"] = param;

        tpr.goToNextSlide();

        break;
        case 'reservar':

        var obj = $.extend({}, tpr_data);

        $.ajax({

            url: "../classes/Api.php?action=reservar",
            method: "POST",
            data: { "data": obj },
            dataType: "JSON",
            success: function(r) {

                tpr.goToNextSlide();

                $.each(r[0], function(key, value) {

                    $("#"+key).val(value);

                });
                

            }


        });
       

        break;
        case 'cancelar':

        tpr.goToSlide(0);
        $("input, textarea").val("");


        break;
        default:

        tpr.goToNextSlide();
        

        break;
    }

    

}





$("button.new").on("click", function()     {

    var control = this;

    var form = $(control).closest(".panel");

    $(this).closest(".panel").find("input, textarea").val("");
    switchUD(control, false);
    refreshDetail(form);


});


$("button.create").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find(".inputs_wrapper").find("input, textarea");

    var form = $(control).closest(".panel");


    var arrayFields = [];


    $.each(fields, function(key, value) {


        arrayFields[value.id] = $(value).val();


    });

    var obj = $.extend({}, arrayFields);


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=create",
        method: "POST",
        data: { "data": obj, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Inserted") {

                $(form).closest(".panel").find("input, textarea").val("");
                switchUD(control, false);
                refreshDetail(form);

            }


        }


    });



});


$("button.update").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find(".inputs_wrapper").find("input, textarea");

    var arrayFields = [];


    $.each(fields, function(key, value) {


        arrayFields[value.id] = $(value).val();


    });

    var obj = $.extend({}, arrayFields);


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=update",
        method: "POST",
        data: { "data": obj, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Updated") {

                refreshDetail(control);

            }


        }


    });


});

$("button.delete").on("click", function()  {


    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=delete",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r == "Deleted") {

                $(form).closest(".panel").find("input, textarea").val("");
                switchUD(control, false);
                refreshDetail(control);

            }

        }


    });



});

$("button.prev").on("click", function()    {

    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=prev",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {

            if(r != "") {

                switchUD(control, true);
                refreshDetail(control);

            }

            $.each(r[0], function(key, value) {

                $(form).find("#"+key).val(value);

            });

        }


    });



});


$("button.next").on("click", function()    {

    var control = this;

    var fields = $(this).closest(".panel").find("input").first().val();

    var form = $(control).closest(".panel");


    var table = $(this).closest(".panel").attr("id");

    var key = $(this).closest(".panel").find("input").first().attr("id");

    var cod = $(this).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=next",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if(r != "") {

                switchUD(control, true);
                refreshDetail(form);

            }

            $.each(r[0], function(key, value) {

                $(form).find("#"+key).val(value);

            });

        }


    });



});

function refreshDetail(control) {


    var fields = $(control).closest(".panel").find("input").first().val();

    var table = $(control).closest(".panel").attr("id");

    var key = $(control).closest(".panel").find("input").first().attr("id");

    var cod = $(control).closest(".panel").find("input").first().val();


    $.ajax({

        url: "../classes/Api.php?action=all",
        method: "POST",
        data: { "data": fields, "table": table, "key": key, "cod": cod },
        dataType: "JSON",
        success: function(r) {


            if (r) {


                $(control).closest(".panel").find('.detail_table').DataTable().clear().draw();

                $(control).closest(".panel").find('.detail_table').DataTable().rows.add(r).draw();


            }

        }

    });



}


function switchUD(control, option) {

    if(option) {

        $(control).closest(".panel").find("#delete").removeAttr("disabled");
        $(control).closest(".panel").find("#update").removeAttr("disabled");
        $(control).closest(".panel").find("#create").attr("disabled", true);

    }
    else {

        $(control).closest(".panel").find("#delete").attr("disabled", true);
        $(control).closest(".panel").find("#update").attr("disabled", true);
        $(control).closest(".panel").find("#create").removeAttr("disabled");

    }


}



    $('input').on('keyup', function(e) {

        if (e.which === 13) {

            $(this).next('input').focus();

        }


});



$("select").select2({

    ajax: {
        url: "https://api.github.com/search/repositories",
        dataType: 'json',
        delay: 300,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data, page) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.name,
                        name: item.name,
                        id: item.name
                    }
                })
            };
        },
        cache: true
    },


    minimumInputLength: 1

});



