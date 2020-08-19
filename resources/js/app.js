// Lodash
window._ = require('lodash');

// Bootstrap 4
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

require('bootstrap');
// Lightbox
require('lightbox2/dist/js/lightbox')

require('owl.carousel/dist/owl.carousel')
require('bootstrap-select/dist/js/bootstrap-select.min')
$(document).ready(function(){
    $('#slide-registrant').owlCarousel({
        margin:3,
        autoWidth:false,
        nav:true,
        items:3,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        },

        navText : ["<i class='mdi mdi-arrow-left' style='color: #d57b2d'></i>","<i class='mdi mdi-arrow-right' style='color: #d57b2d' ></i>"]
    });
});

$(document).ready(function(){
    $('#slide-news').owlCarousel({
        margin:3,
        autoWidth:false,
        items:4,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        },
    });
});
$(document).ready(function(){
    $('#slide-videos').owlCarousel({
        margin:3,
        autoWidth:false,
        nav:false   ,
        items:3,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        },
    });
});

$(document).ready(function(){
    $('.owl-products-images').owlCarousel({
        margin:3,
        autoWidth:false,
        nav:true,
        items:1,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        },

        navText : ["<i class='mdi mdi-arrow-left' style='color: #d57b2d'></i>","<i class='mdi mdi-arrow-right' style='color: #d57b2d' ></i>"]
    });
});
$('#city').change(function (event) {
    provinc = $('#city').val();
    $.post('/cities/getProvince', {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        "proviceId": provinc
    }).done(function (data) {
        let html = "<option disabled selected>Quận/Huyện</option>"
        let element = '#wards'
        $.each(data, function (index, value) {
            html += "<option value='" + index + "' >"+value+"</option>";
        })
        $('#wards').html('').append(html)
    });
});
// Sidebar and Header
require('jquery-slimscroll');
require('./vendor/waves');
require('sticky-kit/dist/sticky-kit');
require('./vendor/jquery.sparkline.min');

// JSZip
// window.JSZip = require('jszip');

// pdfMake
// window.pdfMake = require('pdfmake/build/pdfmake');
// window.pdfFonts = require('pdfmake/build/vfs_fonts');
// pdfMake.vfs = pdfFonts.pdfMake.vfs;

// Datatables
require('datatables.net-bs4');
require('datatables.net-buttons-bs4');
require('datatables.net-buttons/js/buttons.colVis.js');
require('datatables.net-buttons/js/buttons.html5.js');
require('datatables.net-buttons/js/buttons.print.js');
require('datatables.net-fixedcolumns-bs4');
require('datatables.net-responsive-bs4');

// Moment JS
window.moment = require('moment');

// Toastr
window.toastr = require('toastr');

// Sweet Alert 2
window.Swal = require('sweetalert2');

// Theme
require('./theme/sidebarmenu');
require('./theme/main');


// Janys

require('jasny-bootstrap/dist/js/jasny-bootstrap.min')

// App
require('./app/custom_file_input');

