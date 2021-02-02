/*global $, jquery, alert, console*/
$(document).ready(function () {
    
    'use strict';
    
    
    //FOR NAVBAR RESPONSIVE
    if($(window).width() <= 990 ){
        
    $('.nav .icon-nav, .nav ul li a ').click(function () {
            $('.nav-links').animate({
                "height" : "toggle"
    
            });
        });
    }
    ///////////////////////////////////
    //FOR NAVBAR ICON ANIMATION
    var counter = 1;
    $('.nav .icon-nav , .nav ul li a').click(function(){
        counter++;
        if( counter %2 == 0 ){
            $('.nav .icon-nav .inSecond').css({
                "transform" : "rotateY(90deg)"
            });
            $('.nav .icon-nav .inFerst').css({
                "marginBottom" : "-9px",
                "transform" : "rotate(-45deg)"
            });
            $('.nav .icon-nav .inThird').css({
                "marginTop" : "-9px",
                "transform" : "rotate(45deg)"   
            });
            
        }else{
            $('.nav .icon-nav .inSecond').css({
                "transform" : "rotateY(0deg)"
            });
            $('.nav .icon-nav .inFerst').css({
                "margin" : "6px 0",
                "transform" : "rotate(0deg)"
            });
            $('.nav .icon-nav .inThird').css({
                "margin" : "6px 0",
                "transform" : "rotate(0deg)"   
            });
        }
    })
    /////////////////////////////////////////////
    //FOR ANIMATION NAVNAR
    
    $(window).on("scroll",function(){
        if( $(window).scrollTop() == 0  && $(window).width() < 990) {
            
            $('.nav').css({
                "height":"70px",
            })
            $('.nav .nav-links').css({
                "top":"70px",
            })
        }else{
            $('.nav').css({
                "height":"60px",
            });
            $('.nav .nav-links').css({
                "top":"60px",
            })
        }
    });
    $(window).on("scroll",function(){
        if( $(window).scrollTop() == 0  && $(window).width() > 990) {
            $('.nav').css({
                "paddingTop":"40px",
                "paddingBottom":"250px",
                "background": "transparent" ,
                "height":"70px",
            })
        }else{
            $('.nav').css({
                "paddingTop":"10px",
                "paddingBottom":"0px",
                "background": "#263073" ,
                "height":"60px !important",
            })
        }
    });
    /////////////////////////////////////////
    
    /*$('.like').on("click",function(){
        $(this).fadeOut(50);
        $(this).next().fadeIn(50);
    })
    $('.dislike').on("click",function(){
        $(this).fadeOut(50);
        $(this).prev().fadeIn(50);
    })*/
    
});
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
