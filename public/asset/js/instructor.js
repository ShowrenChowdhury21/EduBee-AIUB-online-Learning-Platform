$(function () {'use strict';
  var aside = $('.side-nav'),showAsideBtn = $('.show-side-btn'),contents = $('#contents'),_window = $(window)

  showAsideBtn.on("click", function () {
    $("#" + $(this).data('show')).toggleClass('show-side-nav');
    contents.toggleClass('margin');
  });

  if (_window.width() <= 767) {
    aside.addClass('show-side-nav');
  }

  _window.on('resize', function () {
    if ($(window).width() > 767) {
      aside.removeClass('show-side-nav');
    }
  });

  var slideNavDropdown = $('.side-nav-dropdown');
  $('.side-nav .categories li').on('click', function () {
    var $this = $(this)
    $this.toggleClass('opend').siblings().removeClass('opend');
    if ($this.hasClass('opend')) {
      $this.find('.side-nav-dropdown').slideToggle('fast');
      $this.siblings().find('.side-nav-dropdown').slideUp('fast');
    } else {
      $this.find('.side-nav-dropdown').slideUp('fast');
    }
  });
  $('.side-nav .close-aside').on('click', function () {
    $('#' + $(this).data('close')).addClass('show-side-nav');
    contents.removeClass('margin');
  });
});

  function show(param_div_id) {
    document.getElementById('main').innerHTML = document.getElementById(param_div_id).innerHTML;
  }

  $(document).ready(function ()
  { $(".notify").each(function(i){
       var len=$(this).text().trim().length;
       if(len>20)
       {
           $(this).text($(this).text().substr(0,20)+'...');
       }
   });
});
