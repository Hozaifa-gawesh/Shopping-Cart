$(document).ready(function () {

    'use strict';

    $('.confirm').click(function () {
       return confirm('Are You Sure Delete Item?');
    });


    $('.confirm_accept').click(function () {
       return confirm('Are You Sure Accept Item?');
    });


    /*=====================================
     Start Slider Control
     =====================================*/

    $(".owl-buttons .owl-prev").append("<i class='fa fa-angle-left'></i>")
    $(".owl-buttons .owl-next").append("<i class='fa fa-angle-right'></i>")

    /*=====================================
     End  Slider Control
     =====================================*/

});