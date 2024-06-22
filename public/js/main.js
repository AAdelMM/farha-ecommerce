(function ($) {
    "use strict";
     //Canvas Menu
     $(".canvas__open").on('click', function () {
        $(".header__menu").fadeToggle();
        // $(".offcanvas-menu-wrapper").addClass("active");
        // $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay, .offcanvas__close").on('click', function () {
        // $(".offcanvas-menu-wrapper").removeClass("active");
        // $(".offcanvas-menu-overlay").removeClass("active");
        $(".header__menu").fadeToggle();
    });

    /*------------------
		Navigation
	--------------------*/
    $(".header__menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });
    // Dropdown on mouse hover
    // $(document).ready(function () {
    //     function toggleNavbarMethod() {
    //         if ($(window).width() > 992) {
    //             $('.navbar .dropdown').on('mouseover', function () {
    //                 $('.dropdown-toggle', this).trigger('click');
    //             }).on('mouseout', function () {
    //                 $('.dropdown-toggle', this).trigger('click').blur();
    //             });
    //         } else {
    //             $('.navbar .dropdown').off('mouseover').off('mouseout');
    //         }
    //     }
    //     toggleNavbarMethod();
    //     $(window).resize(toggleNavbarMethod);
    // });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    // $('.vendor-carousel').owlCarousel({
    //     loop: true,
    //     margin: 29,
    //     nav: false,
    //     autoplay: true,
    //     smartSpeed: 1000,
    //     responsive: {
    //         0:{
    //             items:2
    //         },
    //         576:{
    //             items:3
    //         },
    //         768:{
    //             items:4
    //         },
    //         992:{
    //             items:5
    //         },
    //         1200:{
    //             items:6
    //         }
    //     }
    // });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   
      $(".deleteItem").click(function(e){
        e.preventDefault()
        let id = $(this).attr('itemid')
        let requestUrl = $(this).attr('baseurl') + '/deletecart'
        $.ajax({
            type:"delete",
            data: {id:id},
            url: requestUrl,
            success: function() {
              setTimeout(function(){window.location.reload();},2000)
            }
        });
    })   
     $(".addToFav").click(function(e){
        $(this).children('i').toggleClass('text-primary ');
        e.preventDefault()
        let id = $(this).attr('itemid')
        let requestUrl = $(this).attr('baseurl') + '/fav'
        $.ajax({
            type:"POST",
            data: {id:id},
            url: requestUrl,
            success: function(res) {
                console.log(res);
                if(res == 301){
                    $.notify("Please Login first", "Danger");
                    setTimeout(function(){window.location.href = '/login'}, 2000);
                }else{
                    $.notify(res, "Danger");
                    setTimeout(function(){window.location.reload();},2000)
                }
            }
        });
    })
    //  $(".AddToCartBtn").click(function(e){
    //     $(this).children('i').toggleClass('text-primary ');
    //     e.preventDefault()
    //     let size = $('input[type="radio"]:checked').val()
    //     let count = $('.toUpdate').val();
    //     let price = $(this).attr('price');
    //     let stock = $('input[type="radio"]:checked').attr('stock');
    //     let id = $(this).attr('itemid')
    //     let requestUrl = $(this).attr('baseurl') + '/cart'
    //     if(stock >= count && count > 0){
    //         $.ajax({
    //             type:"POST",
    //             data: {id:id, size:size, count:count, price:price},
    //             url: requestUrl,
    //             success: function(res) {
    //                 console.log(res);
    //                 if(res == 301){
    //                     $.notify("Please Login first", "Danger");
    //                     setTimeout(function(){window.location.href = '/login'}, 2000);
    //                 }else{
    //                     $('#itemAdded').modal('show').delay(100).slideUp(1000);
    //                 }
    //             }
    //         });
    //     }else{
    //         $.notify("Available stock is: " +  stock, "Danger");
    //     }

    // })    
     $(".AddToCartBtn").click(function(e){
        $(this).children('i').toggleClass('text-primary');
        e.preventDefault()
        let size = $('input.size[type="radio"]:checked').val()
        // let color3 = $('.color_radio3[type="radio"]:checked').val()
        // let color2 = $('.color_radio2[type="radio"]:checked').val()
        // let color1 = $('.color_radio1[type="radio"]:checked').val()
        var selectedRadios = $('input.color_radio1:checked');
        var color = "";
        selectedRadios.each(function () {
            color += $(this).val() + "-";
        });
        var color_id = "";
        selectedRadios.each(function () {
            color_id += $(this).attr('oid') + ",";
        });
        let count = parseInt($('.toUpdate').val());
        let price = $(this).attr('price');
        let stock = parseInt($('.size[type="radio"]:checked').attr('stock'));
        let sticker = $('.sticker_btn[type="radio"]:checked').val();
        let id = $(this).attr('itemid')
        let requestUrl = $(this).attr('baseurl') + '/cart'
        // if(stock >= count && count > 0){
            $.ajax({
                type:"POST",
                data: {id:id, size:size, color:color, color_id:color_id, count:count, price:price, sticker:sticker},
                url: requestUrl,
                success: function(res) {
                    // console.log(res);
                    // if(res == 301){
                    //     $.notify("Please Login first", "Danger");
                    //     setTimeout(function(){window.location.href = '/login'}, 2000);
                    //     console.log(res)
                    // }else{
                        $('#itemAdded').modal('show');
                    // }
                },error: function(res){
                    // console.log(res)
                }
            });
        // }else{
        //     $.notify("@lang('messages.selectColor)", "Danger");
        // }

    })
    $(".addToCart").click(function(e){
        e.preventDefault();
        let id = $(this).attr('itemid')
        let requestUrl = $(this).attr('baseurl') + '/show/product/' + id;
        $.ajax({
            type:"POST",
            data: {id:id},
            url: requestUrl,
            success: function(res) {
                $("#peak .modal-content").html(res);   
                $('#peak').modal('show').delay(100).slideUp(1000);

            }
        });
    })

if ($(window).width() < 767) {
   $(".dropdown.filter").parents('span').toggleClass('float-right mobile-filter')
}

// $('.SUBmitFOrm').click(function(){
//         $.ajax({
//         type:"POST",
//         data: $(this).parents('div').parents('form').serialize(),
//         url: $(this).parents('div').parents('form').attr('action'),
//         success: function(res) {
//             console.log(res);
//         }
//     });
// });
// $(".mobileSearch").click(function(){
// $(".mobilesearchform").toggleClass('d-none');
// });
})(jQuery);

