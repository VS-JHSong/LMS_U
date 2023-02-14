$(document).ready(function () {
  // 시험 타이머
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;    
      var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);
    
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
    
        display.textContent = minutes + ":" + seconds;
    
        if (--timer < 0) {
          timer = duration;
        }

        if($(".evaluation-detail").hasClass("show") == false){
          clearInterval(interval);
        }

        if(timer === 0) {
          clearInterval(interval);
          display.textContent = "세션 만료!";
        }
      }, 1000);    
  }  

  var minutes = 60;
  var fiveMinutes = (60 * minutes) - 1,
      display = document.querySelector('.countdown');
  
  $(".evaluation-apply").click(function(){
    startTimer(fiveMinutes, display);
  });

  $(".evaluation-next").click(function(){
    
    $(".evaluation1").hide();
    $(".evaluation2").show();
  });

  $(".evaluation-prev").click(function(){
    
    $(".evaluation2").hide();
    $(".evaluation1").show();
  });


});