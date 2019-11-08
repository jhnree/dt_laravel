$(function () {
    var x = realTime();

    //For realtime clock
    setInterval(function(){
        realTime();
    }, 1000);

    //disable input
    $('#datepicker').keydown(function(){
        return false;
    });

    $('#datepicker').datepicker({
        dateFormat: 'M dd, yy'
    });

    $('#datepicker').val(x);

    $('#timeentry').submit(function(){
        let form = $(this).serialize();
        // console.log(form);
        $.ajax({
            url: '/timein',
            data: form,
            method: 'get',
        }).done(function(result){
            // console.log(result);
            if(result==0){
                toastr.error('Error');
            }
            else{
                alert('Time in');
            }
        }).fail({
            
        });
        return false;
    });
});

function realTime(){
    var datetime = new Date();
    
    // Use for converting date and time;
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var shortMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var hours = datetime.getHours() == 0 ? 12 : datetime.getHours() > 12 ? datetime.getHours() - 12 : datetime.getHours();

    // fetching date and time
    var getDay = days[datetime.getUTCDay()];
    var getMonth = months[datetime.getUTCMonth()];
    var getDate = datetime.getUTCDate();
    var getYear = datetime.getUTCFullYear();
    var getMinutes = datetime.getUTCMinutes();
    var getSeconds = datetime.getUTCSeconds();
    var ampm = datetime.getHours() < 12 ? "am" : "pm";

    $("#day").text(getDay);
    $("#date").text(getMonth + " " + getDate + ", " + getYear);
    $('#ampm').text(ampm);
    
    if(hours < 10){
        if(getMinutes < 10){
            $("#hour").text("0" + hours + ":" + "0" + getMinutes);
        }
        else{
            $("#hour").text("0" + hours + ":" + getMinutes);
        }
    }
    else{
        if(getMinutes < 10){
            $("#hour").text(hours + ":" + "0" + getMinutes);
        }
        else{
            $("#hour").text(hours + ":" + getMinutes);
        }
    }

    if(getSeconds < 10){
        $("#seconds").text("0" + getSeconds);
    }
    else{
        $("#seconds").text(getSeconds);
    }

    if(ampm == 'am'){
        if(hours >= 6 && hours <= 11){
            $(".image").css('background-image', 'url("../img/morning.jpg")');
            // alert("6 to 11")
        }
        else{
            $(".image").css('background-image', 'url("../img/evening.jpg")');
            // alert("0 to 5");
        }
    }
    else{
        if(hours >= 7 && hours <= 11){
            $(".image").css('background-image', 'url("../img/evening.jpg")');
            // alert("7pm to 11pm")
        }
        else if(hours >= 5 && hours < 7){
            $(".image").css('background-image', 'url("../img/afternoon.jpg")');
            // alert("5pm to 7pm") 
        }
        else{
            $(".image").css('background-image', 'url("../img/morning.jpg")');
            // alert("12pm to 4pm")
        }
    }

    return shortMonth[datetime.getUTCMonth()] + " " + getDate + ", " + getYear;
    // alert(datetime.getUTCFullYear());
}