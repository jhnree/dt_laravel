$(function(){

    var back = $('#backBox');

    // keypress
    $('#username').keypress(function (e){
        var key = e.which;
        if(key == 13){
            $('#next').click();
            return false;
        }
    });

    // Next Button
    $('#next').click(function(){
        $.ajax({
            url: '/check-username',
            type: 'get',
            data: { username:$('#username').val()},
        }).done(function(result){
            if(result=='success'){
                $('#usernameBox').css({display: 'none', top: '35px'});
                setTimeout(function(){
                    $('#welcome').find("span").text('Welcome, ' + $('#username').val() + "!");
                    back.css({display: 'block'})
                    $('#next').css({display: 'none'});
                    $('#login').css({display: 'block'});
                    $('#passwordBox').css('display', 'block');
                    $('#passwordBox').animate({top: '-20px'}, 200);
                }, 250);
            }
            else{
                toastr.error("Invalid Username");
            }
        }).fail(function(){

        });
    });

    // Back Button
    $('#back').click(function(){
        $('#passwordBox').css({display: 'none', top: '35px'});
        setTimeout(function(){
            $('#usernameBox').css({display: 'block'});
            $('#next').css({display: 'block'});
            $('#usernameBox').animate({top: '0px'}, 200);
            back.css({display: 'none'});
            $('#login').css({display: 'none'});
        }, 250);
    });
    
    $('#loginForm').submit(function(){
        let form = $(this).serialize();
        $.ajax({
            url: '/check-password',
            type: 'get',
            data: form,
        }).done(function(result){
            if(result == 1){
                toastr.error("Please don't leave any blank");
            }
            else if(result == 'success'){
                window.location.href='/';
                // alert(result);
            }
            else{
                toastr.error(result);
            }
        }).fail(function(){

        });
        return false;
    });
})