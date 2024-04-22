/* ============================================================
 * Plugin Core Init
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
 
'use strict';

$(document).ready(function() {

    $('#start_tour').click(function() {
        $("#notifications").velocity("scroll", {
            duration: 800
        });
    })
    var sliderone = new Swiper('#reviews-1', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        width:320,
        speed:1000,
        loop:true,
        loopedSlides:10,
        autoplay: {
          delay: 1000,
        },
        autoplayDisableOnInteraction: false,
        grabCursor: true,

    });

    var slidertwo = new Swiper('#reviews-2', {
      pagination: '.swiper-pagination',
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      spaceBetween: 30,
      width:320,
      speed:1000,
      loop:true,
      loopedSlides:10,
      autoplay: {
        delay: 2500,
      },
      autoplayDisableOnInteraction: false,
      grabCursor: true,
    });


  $("#btnLicenseTrigger").popover({
      html: true, 
      trigger: 'focus',
    content: function() {
            return $('#license').html();
          }
  });

  $(document).on("click",".license-selector",function(e){
    e.preventDefault();

    if($(this).data("type") == "regular"){
      $(".regularls").show()
      $(".extendedls").hide()
    }
    else{
      $(".regularls").hide()
      $(".extendedls").show()
    }
    $('#btnLicenseTrigger').popover('hide')
  });


  $("#btnLive").on("click",function(e){
    e.preventDefault();
     $('html,body').animate({
          scrollTop: $("#sectionLayout").offset().top},
        '700');
    });
    // $('.preview-selector').on("click",function () {
    //     var url = $(this).data("url");
    //     window.location = url;
    // });
    // 
    $('#card').card({
        progress: 'circle',
        progressColor: 'primary',
        onRefresh: function() {

            setTimeout(function() {
                // Hides progress indicator
                $('#card').card({
                    refresh: false
                });
            }, 2000);
        }
    });
    $("#btnRequest").on("click",function(e){
      e.preventDefault();
      var k = $("#k").val();
      var b = $("#b").val();
      var g = $("#g").val();
      if(b == "" || g == "" || k == ""){
        $('#githubform').validate();
        $("#k").focus();
        return;
      }
      $('#card').card({refresh: true});
      $.ajax( "https://us-central1-pages-a8339.cloudfunctions.net/app/request/github/?k="+k+"&b="+b+"&g="+g )
        .done(function(data) {
            var d = data
            if(d["success"] != true){
              $('#card').card({
                    error: d["message"]
                });
              $("#githubform")[0].reset();
            }
            else{
              $("#mheader").html('Github<br>Invitation Sent');
              $("#mmsg").html("Congratulations, we have sent you an invite to the account "+g+".")
              $("#githubform").fadeOut().remove();
              $("#success").fadeIn().append('<div class="sa"><div class="sa-success"><div class="sa-success-tip"></div><div class="sa-success-long"></div><div class="sa-success-placeholder"></div><div class="sa-success-fix"></div></div></div>');
              $("#btnRequest").remove();
              $("#btnDone").show();
            }
        })
        .fail(function() {
          $('#card').card({
                    error: "Something went terribly wrong"
                });
        })
        .always(function() {
          //alert( "complete" );
        });
    });
// setTimeout(function(){
//   $(".offer").addClass("open")
// },2000);

//   $(".offer").on("click",function(){
//       $(this).removeClass("open")
//       $('html,body').animate({
//             scrollTop: $("#Licensing").offset().top},
//           '700');

//   });
//   $(".offer-close").on("click",function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     $(this).parent().removeClass("open")
//   });
});