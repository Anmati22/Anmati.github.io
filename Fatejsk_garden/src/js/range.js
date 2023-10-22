// Загрузка в виде яблока. Если не пропадает, значит где-то косяк в JS.
window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
      document.body.classList.add('loaded');
      document.body.classList.remove('loaded_hiding');
    }, 500);
  };


// Функция для пролистывания колонок с разной скоростью.

$(function(){
	var boxes = $('.box'),
	$window = $(window);
	$window.scroll(function(){
		var scrollTop = $window.scrollTop();
		boxes.each(function(){
			var $this = $(this),
			scrollspeed = parseInt($this.data('scroll-speed')),
			val = - scrollTop / (scrollspeed/2);
			$this.css('transform', 'translateY(' + val + 'px)');
		});
	});
});


const scrollMaxValue = () => {
  const body = document.body;
  const html = document.documentElement;

  const documentHeight = Math.max(
    body.scrollHeight,
    body.offsetHeight,
    html.clientHeight,
    html.scrollHeight,
    html.offsetHeight
  );

  const windowHeight = window.innerHeight;

  return documentHeight - windowHeight;
};
scrollMaxValue()

