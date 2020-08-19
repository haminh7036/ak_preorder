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

$('input[name="Payment"]').change(function(event){
    if(event.currentTarget.value === 'Đặt cọc tại cửa hàng'){
        $('#store_order').prop('disabled', true);
        $('#block_test').show()
    }
    else{
        $('#store_order').prop('disabled', false);
        $('#block_test').hide()
    }
})
$('#city').change(function (event) {
    provinc = $('#city').val();
    $.post('/page/cities/getProvince', {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        "proviceId": provinc
    }).done(function (data) {
        let html = "<option disabled selected>Quận/Huyện</option>";
        let element = '#wards';
        $.each(data, function (index, value) {
            html += "<option value='" + value.title + "' >" + value.title + "</option>";
        });
        $('#wards').html('').append(html);

        // let html1 = "<option>Địa chỉ đại lý</option>"
        //   let element2 = '#detail_address'
        //   $.each(b, function(index,value){
        //       html1 += "<option value='" + value.address_show + "' >" + value.address_show + "</option>";
        //   })
        //   $('#detail_address').html('').append(html1);

    });
});
$('#wards').change(function(event){
    provinc = $('#city').val();
    province = $('#wards').val();
    $.post('/page/cities/getShops', {
        "_token": $('meta[name="csrf-token"]').attr('content'),
        "proviceId": province,
        "city":provinc,
    }).done(function (data) {
        let html1 = "<option value='' selected disabled>Địa chỉ cửa hàng</option>"
        let element2 = '#detail_address'
        $.each(data, function(index,value){
            html1 += "<option value='" + value.address_show + "' >" + value.address_show + "</option>";
        })
        $('#detail_address').html('').append(html1);
    });
})
    let city=0;
    let ward=0;
    let detail=0;
    const checkButton = (a,b,c) => {
        if(a === b && b === c){
            $('#store_order').prop('disabled', false);
        }
        else{
            $('#store_order').prop('disabled', true);
        }
    }
    $('#city').change(function(event){
        if($('#city').val() != ''){
            city = 1;
        }
        else{
            city = 0;
        }
        checkButton(city,ward,detail)
    })
    $('#wards').change(function(event){
        if($('#city').val() != ''){
            ward = 1;
        }
        else{
            ward = 0;
        }
        checkButton(city,ward,detail)

    })
    $('#detail_address').change(function(event){
        if($('#city').val() != ''){
            detail = 1;
        }
        else{
            detail = 0;
        }
        checkButton(city,ward,detail)
    })

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

