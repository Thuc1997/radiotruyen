
///xử lý bật lên form thêm
var modal = document.getElementById("modal");
var btn_addd = document.querySelector('.add_sp');
var xquit = document.querySelector('.xquit');

    btn_addd.addEventListener('click',function(){
        modal.classList.add('open');
    })

    xquit.addEventListener('click',function(){
        modal.classList.remove('open');
    });


var modal2 = document.getElementById("modal2");
var btn_addd1 = document.querySelector('.add_au');
var xquitt = document.querySelector('.xquitt');
    btn_addd1.addEventListener('click',function(){
        modal2.classList.add('open');
    });
    xquitt.addEventListener('click',function(){
        modal2.classList.remove('open');
    });

var modal3 = document.getElementById('modal3');    
var btn_addd2 = document.querySelector('.add_sl');
var xquittt = document.querySelector('.xquittt');
    btn_addd2.addEventListener('click',function(){
        modal3.classList.add('open');
    });
    xquittt.addEventListener('click',function(){
        modal3.classList.remove('open');
    });


