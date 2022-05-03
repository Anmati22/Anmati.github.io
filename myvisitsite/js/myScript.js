




function recalculatePrices() {
  var total = 0;
  $('.service').each(function() {
    total += $(this).val() * $(this).attr('data-price');
  });
  $('#coinss').html(total);

}

$(document).ready(function() {
  $('.service').on('change', recalculatePrices);
});










$(document).ready(function(){

	$(window).scroll(()=> {
		let scrollDistance = $(window).scrollTop();

		$(".section").each((i,el) =>{
			if($(el).offset().top - $("nav").outerHeight() <= scrollDistance)
			{
				$("nav a").each((i, el) => {
					if($(el).hasClass("active")){
						$(el).removeClass("active");
					}
				});
				$('nav li:eq('+ i +')').find('a').addClass('active');
			}
		});
	});
});



var number = document.querySelector('.number'),
		numberTop = number.getBoundingClientRect().top,
		start = +number.innerHTML, end = +number.dataset.max;

		window.addEventListener('scroll', function onScroll() {
			if(window.pageYOffset > numberTop - window.innerHeight / 2) {
				this.removeEventListener('scroll', onScroll);
				var interval = setInterval(function() {
					number.innerHTML = ++start;
					if(start == end) {
						clearInterval(interval);
					}
				}, 5);
			}
		});
	
var number1 = document.querySelector('.number1'),
		number1Top = number1.getBoundingClientRect().top,
		start1 = +number1.innerHTML, end1 = +number1.dataset.max;

		window.addEventListener('scroll', function onScroll() {
			if(window.pageYOffset > number1Top - window.innerHeight / 2) {
				this.removeEventListener('scroll', onScroll);
				var interval1 = setInterval(function() {
					number1.innerHTML = ++start1;
					if(start1 == end1) {
						clearInterval(interval1);
					}
				}, 5);
			}
		});
  
var number2 = document.querySelector('.number2'),
		number2Top = number2.getBoundingClientRect().top,
		start2 = +number2.innerHTML, end2 = +number2.dataset.max;

		window.addEventListener('scroll', function onScroll() {
			if(window.pageYOffset > number2Top - window.innerHeight / 2) {
				this.removeEventListener('scroll', onScroll);
				var interval2 = setInterval(function() {
					number2.innerHTML = ++start2;
					if(start2 == end2) {
						clearInterval(interval2);
					}
				}, 5);
			}
		});

var number3 = document.querySelector('.number3'),
		number3Top = number3.getBoundingClientRect().top,
		start3 = +number3.innerHTML, end3 = +number3.dataset.max;

		window.addEventListener('scroll', function onScroll() {
			if(window.pageYOffset > number3Top - window.innerHeight / 2) {
				this.removeEventListener('scroll', onScroll);
				var interval3 = setInterval(function() {
					number3.innerHTML = ++start3;
					if(start3 == end3) {
						clearInterval(interval3);
					}
				}, 5);
			}
		});

		setTimeout(function(){ 
    $("#openmodal").click();
}, 15000000);

$(document).ready(function(){
	new WOW().init();
});

	$(document).ready(function(){	


$("#phone").mask("+7(999) 999-9999");
	
})
