jQuery(document).ready(function ($) {
  $('.menu-btn a').click(function () {
    $('.overlay').fadeToggle(200);
    $(this).toggleClass('btn-open').toggleClass('btn-close');
  });
  // $('.overlay').on('click', function () {
  //   $('.overlay').fadeToggle(200);
  //   $('.menu-btn a').toggleClass('btn-open').toggleClass('btn-close');
  // });
  $('.menuu a').on('click', function () {
    $('.overlay').fadeToggle(200);
    $('.menu-btn a').toggleClass('btn-open').toggleClass('btn-close');
  });

  $('.btn-mobile-open').click(function () {
    $('.overlay').fadeToggle(200);
    $(this).toggleClass('btn-mobile-open').toggleClass('btn-close');
  });
  $('.overlay').on('click', function () {
    $('.overlay').fadeToggle(200);
    $('.menu-btn a').toggleClass('btn-mobile-open').toggleClass('btn-close');
  });
  $('.menu a').on('click', function () {
    $('.overlay').fadeToggle(200);
    $('.menu-btn a').toggleClass('btn-mobile-open').toggleClass('btn-close');
  });
});
