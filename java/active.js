document.querySelectorAll('.mobile_nav').forEach(
  function(phantu) {
      phantu.style.cssText = "--max-height:"+phantu.scrollHeight+"px";
  }
);

var totop = document.querySelector('.back-top');
  window.addEventListener("scroll",function(){

    if(window.pageYOffset >600){
      totop.style.display = "block";
    }else{
      totop.style.display = "none";
    }
});
totop.addEventListener("click",function(){
    window.scrollTo(0,0);
});


  ///phần lấy href trang chủ
    var home1 =  document.querySelector('.menu>ul>li a:nth-child(1)').setAttribute('href','index.php');
    var home2 =  document.querySelector('.mobile_nav>ul>li a:nth-child(1)').setAttribute('href','index.php');
 
 ///phần slider
$(function() {

    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      prevArrow : '.back',
      nextArrow : '.next'
    });

});


$(window).on('load', function(event) {
  $('body').removeClass('preloading');
  $('.loader').delay(1000).fadeOut('fast');

});
///menu_mobile

var toggleNav = document.getElementById("menu-bar-icon");
const mNav = document.querySelector(".mobile_nav");
const mParent = document.querySelectorAll(".mobile_nav>ul>li:nth-child(n+2)");
for (let i = 0; i < mParent.length; i++) {
    mParent[i].addEventListener("click", function () {
      
      let ddStatus = mParent[i].childNodes[1].style.display;
  
      if (ddStatus === "block") {
        mParent[i].childNodes[1].style.display = "none";
        document.querySelectorAll('.mobile_nav').forEach(
          function(phantu) {
              phantu.style.cssText = "--max-height:"+140+"px";
          }
       );
      } else {
        closeAll(mParent);
        mParent[i].childNodes[1].style.display = "block";
        document.querySelectorAll('.mobile_nav').forEach(
          function(phantu) {
              phantu.style.cssText = "--max-height:"+980+"px";
          }
       );
      }
    })
  }
  toggleNav.addEventListener("click",function() {
    mNav.classList.toggle("open");
    toggleNav.classList.toggle("open"); 
  })

     
  function closeAll(arg) {
      for (let i = 0; i < arg.length; i++) {
        arg[i].childNodes[1].style.display = "none";
      }
    }
//icon down mobile
    var href_mobile = document.querySelectorAll('.mobile_nav>ul>li>a:nth-last-child(n+2)');
    for (var h = 0; h < href_mobile.length; h++){
     href_mobile[h].setAttribute('href','javascript:void(0)');
     href_mobile[h].innerHTML+= '<i class="right_icon fas fa-chevron-down"></i>';
    }
//icon down pc
    var href_pc = document.querySelectorAll('.menu>ul>li>a:nth-last-child(n+2)');
    for(var t = 0; t <href_pc.length; t++){
      href_pc[t].setAttribute('href','javascript:void(0)');
     href_pc[t].innerHTML+='<i class="size_dow fas fa-chevron-down"></i>';
    }
  
    ///phần làm đây
var mainAudio = document.getElementById("main-audio");
var wrapper   = document.querySelector('.top_play');
var progressbar = document.querySelector('.progress-bar');
var progressarea = document.querySelector('.progress-area');

  
    
  function loadmussic() {
  document.querySelector('.play_media:nth-child(1)').style.color = "#f50";
  var play_media1 = document.querySelector('.play_media:nth-child(1)').getAttribute('data-file');
  var playy1 = play_media1.split('/');
  mainAudio.src = './audio/'+playy1[2]+'';

  }
 window.addEventListener("load",loadmussic);
   

  var play_media = document.querySelectorAll('.play_media');
  for (let i = 0; i <play_media.length; i++){
      play_media[i].addEventListener('click',function(){
          var file = play_media[i].getAttribute('data-file');
          var playy = file.split('/');
         mainAudio.src = './audio/'+playy[2]+'';
         playMusic();
///phần add class màu
          document.querySelectorAll('.play_media').forEach(btns=>{
              btns.style.color = "white";
          });
            play_media[i].style.color = "#f50";       
      });  
  }

var playPlausebtn = document.querySelector('.play-pause');

playPlausebtn.addEventListener("click", function(){
    var isMussic = wrapper.classList.contains("paused");
      isMussic ? pauseMusic() : playMusic();
});
//play mussic
function playMusic(){
  wrapper.classList.add("paused");
  playPlausebtn.querySelector("i").innerHTML = "pause";
  mainAudio.play();
}
//stop mussic
function pauseMusic(){
  wrapper.classList.remove("paused");
  playPlausebtn.querySelector("i").innerHTML = "play_arrow";
  mainAudio.pause();
}
///lấy thanh phát audio
mainAudio.addEventListener("timeupdate",function(e){
  var currentTim = e.target.currentTime;
  var duratio    = e.target.duration;
  var progressWidth = (currentTim / duratio)*100;
  progressbar.style.width = `${progressWidth}%`;

      var mussicCurentTime =wrapper.querySelector(".current-time");
      var mussicDucation   =wrapper.querySelector(".max-duration");
      ///lấy thời gian phía sau
          mainAudio.addEventListener("loadeddata", function(){
              var audioDucation = mainAudio.duration;
                    var totalMin = Math.floor(audioDucation / 60);
                    var totalSec = Math.floor(audioDucation % 60);
                    if(totalSec < 10){
                        totalSec = `0${totalSec}`;
                    }
               mussicDucation.innerText = `${totalMin}:${totalSec}`;     
          });
                    var curentMin = Math.floor(currentTim /60);
                    var curentSec = Math.floor(currentTim %60);
                    if(curentSec <10){
                        curentSec = `0${curentSec}`;
                    }
               mussicCurentTime.innerText = `${curentMin}:${curentSec}`;       

});

progressarea.addEventListener("click", function(e){
     var progressWidthval = progressarea.clientWidth;
     var clickedOffsetX   = e.offsetX;
     var songDuration     = mainAudio.duration;
     mainAudio.currentTime = (clickedOffsetX / progressWidthval)* songDuration;
     playMusic();
});

var back =  document.getElementById('prev');
  back.addEventListener("click",function(){
      alert('chưa code...');
  });

var next = document.getElementById('next');
next.addEventListener("click",function(){
alert('chưa code...');
});