$(function () {

    var uid     = fp.get();
    var browser = fingerprint_browser();
    var flash   = fingerprint_flash();
    var canvas  = fingerprint_canvas();
    var connection = fingerprint_connection();
    var cookie = fingerprint_cookie();
    var display = fingerprint_display();
    var fontsmoothing = fingerprint_fontsmoothing();
    var fonts = fingerprint_fonts();
    var formfields = fingerprint_formfields();
    var java = fingerprint_java();
    var language = fingerprint_language();
    var silverlight = fingerprint_silverlight();
    var os = fingerprint_os();
    var timezone = fingerprint_os();
    var touch = fingerprint_touch();
    var plugins = fingerprint_plugins();
    var useragent = fingerprint_useragent();
    var truebrowser = fingerprint_truebrowser();



    // send ajax request to save the user browser

    var data = {uid : uid,browser : browser, flash: flash, canvas: canvas, connection: connection, cookie: cookie,display: display, fontsmoothing: fontsmoothing, fonts: fonts, formfields: formfields, java: java, language: language, silverlight: silverlight, os:os,timezone: timezone,touch: touch, plugins: plugins,useragent: useragent, truebrowser: truebrowser};
    $.ajaxSetup( {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    } );

    $.ajax({
        type : "POST",
        url  : "/finger",
        data : data,
        dataType: 'JSON',
        success:  function (mydata) {
        },
        error: function(err) {
            // console.log('there is error')
        }
    })

    // function createCookie(name, value, days) {
    //         var expires;
    //         if (days) {
    //             var date = new Date();
    //             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    //             expires = "; expires=" + date.toGMTString();
    //         }
    //         else {
    //             expires = "";
    //         }
    //         document.cookie = name + "=" + value + expires + "; path=/";
    // }


    // createCookie('loxmax', uid, 365);


    // var cookieContaier = $('.cookie-container')


    // var cookieBtn = $('.cookie-btn')
    // cookieBtn.on('click', function () {
    //           cookieContaier.removeClass('active')
    //           localStorage.setItem('cookieBannerDisplayed' , 'true')
    // })

        //   setTimeout(() => {
        //       if(!localStorage.getItem('cookieBannerDisplayed')) {

        //           cookieContaier.addClass('active')
        //       }
        //   }, 2000);



        //   click on call to action button

        // $('.pps-btn-svg').on('click',function(e) {

        //     e.stopImmediatePropagation()

        //     console.log($('.pps-btn-svg').attr('href'));

        //     $.ajax({
        //         type : "post",
        //         url  : "/userclick",
        //         data : data,
        //         success :function() {

        //         }
        //     })
        // });


    });


    //   $('.blo-finger').on('click', function (e) {

    //       var that = $(this);
    //       var id = that.data('id');
    //      if(that.hasClass('unblocked')) {

    //         $.ajax({
    //             type : "GET",
    //             url  : "/block/"+ id,
    //             data : {block : id},
    //             dataType:'text',
    //             success : function () {


    //                 that.removeClass('unblocked');
    //                 that.addClass('blocked')
    //                 that.text('done');

    //             }
    //         })
    //      }

    //      if(that.hasClass('blocked')) {

    //         $.ajax({
    //             type : "GET",
    //             url  : "/unblock/"+ id,
    //             data : {edit : id},
    //             success: function () {
    //                 that.removeClass('blocked')
    //                 that.addClass('unblocked')
    //                 that.text('block');

    //             }
    //         })
    //      }



    //   })







