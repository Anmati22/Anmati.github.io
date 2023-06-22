// Загрузка в виде яблока. Если не пропадает, значит где-то косяк в JS.
window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
      document.body.classList.add('loaded');
      document.body.classList.remove('loaded_hiding');
    }, 500);
  };



 $(document).ready(function() {
var start_pos=$('.menu').offset().top;
 $(window).scroll(function(){
 if ($(window).scrollTop()>=start_pos) {
 if ($('.menu').hasClass()==false) $('.menu').addClass('fixed');
 }
 else $('.menu').removeClass('fixed');
 });
});

$(document).ready(function() {
 	$(window).scroll(function(event) {
     var s = $(this).scrollTop();
     var w = $(this).outerWidth();
     var h = $('.content').outerHeight();
     var h_b = $('.parallax').outerHeight();
     var p = s/h*100;
     var p_b = s/h_b*100;
     var o = 1-1/100*p_b;
     var z_1 = 1+(w/10000*p_b);
     $('.parallax_fog').css('transform','scale('+z_1+')');
      $('.parallax_fog').css('opacity',o);
      
      var z_2 = 1+(w/5000000*p);
      $('.parallax_mountain_1').css('transform','scale('+z_2+')');

      var hr = w/2000*p_b;
      var z_3 = 1+(w*0.000005*p_b);
      $('.parallax_mountain_2').css('transform','translate3d('+hr+'px,0,0) scale('+z_3+')');

      var hr_2 = w/1500*p_b;
      var z_4 = 1+(w*0.00001*p_b);
      $('.parallax_mountain_3').css('transform','translate3d('+hr_2+'px,0,0) scale('+z_4+')');

 });
 });	

(function () {
  var square = document.querySelector('.square');

  var observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (typeof getCurrentAnimationPreference === 'function' && !getCurrentAnimationPreference()) {
        return;
      }

      if (entry.isIntersecting) {
        entry.target.classList.add('square-animation');
      }
    });
  });

  observer.observe(square);
});