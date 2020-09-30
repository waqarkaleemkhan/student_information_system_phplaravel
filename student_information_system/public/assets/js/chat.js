/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$( document ).ready(function() {
  
    $('.module').hide();
    $('.icon-close,.close-chat-panel').click(function(){
        $('.module').css('top',-5000);
    });
    
    $('.form-control').keyup(function(e){
        
        var code = e.keyCode || e.which;
        if(code == 13){
            
            var myText=$('textarea.form-control').val();
            $('textarea.form-control').val('');

        }
    });
    
    $('.menu-btn').click(function(){
        if($('.pushy').hasClass('pushy-right')){
            $('.module').hide();
        }
    });
    
    $('.chat').children('li').click(function(){
        
        var top=$(this).offset().top;
        
        $('.module').css("top",top-$('.navbar-collapse').height());
        $('.module').show();
        $('.module').children().children().children('.chat-title').text($(this).text());
    });  
});

