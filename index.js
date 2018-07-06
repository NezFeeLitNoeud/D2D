// ANMATION PAGE ADMIN.PHP
$("#form_product").hide();

$(document).ready(function(){
    $("#show_left").click(function(){
        $("#form_product").toggle();
    });
});

$("#form_rank").hide();

$(document).ready(function(){
    $("#show_right").click(function(){
        $("#form_rank").toggle();
    });
});


// ANIMATION INDEX.PHP
$(document).ready(function(){
    $("#panel_image").mouseover(function(){
        $(this).css("width", "90px");
        $(this).css("transition", "1s");
            });
});

$(document).ready(function(){
    $("#panel_image").mouseout(function(){
        $(this).css("width", "50px");
            });
})



// $('.list-group-item').on('click', function (e) {
//   $(this).css("background-color", "red");
// })


