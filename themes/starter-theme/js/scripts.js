$(document).ready(function () {

   $(function () {

      if ($(window).width() > 980) {
         $(".menu-item-has-children > a").on("focus", function () {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
         });
      } else {
         $(".menu-item-has-children").on("click", function () {
            $(this).toggleClass('open').find(".sub-menu").slideToggle();
         })
      }
      $(".menu-button").on("click", function () {
         $(this).toggleClass("open");
         console.log(this);
         $(".menu-main").slideToggle();
      })

      //   Resize function to close the mobile menu. Change MENU CONTAINER to navigation container of the theme
      var dwidth = $(window).width();

      $(window).on('resize', function () {
         if ($(window).width() > 1200) {
            $(".menu-main ul").css('display', 'flex');
         } else {
            var wwidth = $(window).width();
            if (dwidth !== wwidth) {
               dwidth = $(window).width();
               $(".menu-main ul").css('display', 'none');
               $('.menu-button').removeClass('open');
            }
         }
      });


      // IE Check
      if (navigator.appName == 'Microsoft Internet Explorer' || !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
         $('body').addClass('IE');
      }
   });

//Toggle Show/Hide in Services
$("#services-1").show();
$("#services-title-1").addClass("active-services");
$(".tablink").on("click", function (e) {
   var target = $(this).attr("rel");
   $(".tablink").removeClass("active-services");
   $(this).addClass("active-services");
   $("#" + target).show().siblings("div").hide();
});
});

//Dropdown onchange for services
$(".tabcontent").hide();
$("#services-select").change(function () {
   $(".tabcontent").hide();
   $("#" + $(this).val()).show();
})
