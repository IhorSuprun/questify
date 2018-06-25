(function(){
var animatein = $('.showAnimet').attr('data-animated-in');
var animatein2 = $('.showAnimet2').attr('data-animated-in');
var animatein2 = $('.showAnimet3').attr('data-animated-in');
var animateout = $('.showAnimet').attr('data-animated-out');
var animateout2 = $('.showAnimet2').attr('data-animated-out');
var animateout2 = $('.showAnimet3').attr('data-animated-out');
$('#testiSlide').flexslider({
    animation: "fade",    
     directionNav: true,
    useCSS: false,
    slideshow: true, 
    animationSpeed: 1200,
    controlsContainer: ".flex-control",
    start: function(slider) {
    $('.showAnimet').addClass(animatein);
    $('.showAnimet2').addClass(animatein2);
    $('.showAnimet3').addClass(animatein2);
      },
     before: function(slider) {
        slider.slides.eq(slider.currentSlide).delay(1200);
        //delay slide fadeIn until the animations on the prev slide are over
        slider.slides.eq(slider.animatingTo).delay(1200);
		$('.showAnimet').addClass(animateout);
		$('.showAnimet2').addClass(animateout2);
		$('.showAnimet3').addClass(animateout2);
      }, 
      after: function(slider) {
		$('.showAnimet').removeClass(animateout);
		$('.showAnimet2').removeClass(animateout2);
		$('.showAnimet3').removeClass(animateout2);
      }
    }); 
 $('.flex-control-paging li a').text(" ");
})();