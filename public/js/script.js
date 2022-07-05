  
  // グローバルナビ
  // guronabi

  $('.puru-buttom').on('click' , function () {
    $(this).toggleClass('active');
    $('.navi').css('display' , 'block');
    if ($(this).hasClass('active')) {
      $('.navi').addClass('active');
    } else {
      $('.navi').removeClass('active');
    }
  }) ;

  // モーダル
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      // console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

 