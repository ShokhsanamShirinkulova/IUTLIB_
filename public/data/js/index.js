  var hellopreloader = document.getElementById("hellopreloader_preload");
  function fadeOutnojquery(el){ 
    el.style.opacity = 1;
    var interhellopreloader = setInterval(function(){
      el.style.opacity = el.style.opacity - 0.05;
      if(el.style.opacity <=0.05){
        clearInterval(interhellopreloader);
        hellopreloader.style.display = "none";
      }
    },16);
  }
  window.onload = function(){
    setTimeout(function(){
      fadeOutnojquery(hellopreloader);
    },1000);
  };

var $amount = $('#amount'),
    $min = $('.min'),
    $max = $('.max'),
    $min_input = $('#min'),
    $max_input = $('#max'),
    $slider = $('#slider').slider({
  orientation: 'horizontal',
  animate: "fast",
  range: true,
  min: 1800,
  max: 2018,
  values: [ 1800, 2018 ],
  slide: function(event, ui) {
    adjust(ui.values[0], ui.values[1]);
  }
});
function adjust(min, max) {
  $min.html(min);
  $max.html(max);
  $min_input.val(min);
  $max_input.val(max);
  // $slider.find('.ui-slider-handle:first-of-type').attr('data-content',min);
  // $slider.find('.ui-slider-handle:last-of-type').attr('data-content',max);
}
var min = $slider.slider('values', 0);
var max = $slider.slider('values', 1);
adjust(min, max);





// function getTimeRemaining(endtime) {
//   var t = Date.parse(endtime) - Date.parse(new Date());
//   var seconds = Math.floor((t / 1000) % 60);
//   var minutes = Math.floor((t / 1000 / 60) % 60);
//   var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
//   var days = Math.floor(t / (1000 * 60 * 60 * 24));
//   return {
//     'total': t,
//     'days': days,
//     'hours': hours,
//     'minutes': minutes,
//     'seconds': seconds
//   };
// }

// function initializeClock(id, endtime) {
//   var clock = document.getElementById(id);
//   var daysSpan = clock.querySelector('.days');
//   var hoursSpan = clock.querySelector('.hours');
//   var minutesSpan = clock.querySelector('.minutes');
//   var secondsSpan = clock.querySelector('.seconds');

//   function updateClock() {
//     var t = getTimeRemaining(endtime);

//     daysSpan.innerHTML = t.days;
//     hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
//     minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
//     secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

//     if (t.total <= 0) {
//       clearInterval(timeinterval);
//     }
//   }

//   updateClock();
//   var timeinterval = setInterval(updateClock, 1000);
// }

// var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
// initializeClock('clockdiv', deadline);