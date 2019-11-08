$(function(){
    var datetime = new Date();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    $('.datepicker').keydown(function(){
        return false;
    });

    $('.datepicker').datepicker({
        dateFormat: 'MM dd, yy'
    });

    $('.fromDatepicker').val(months[datetime.getUTCMonth()] + " 01, " + datetime.getUTCFullYear());
    $('.toDatepicker').val(months[datetime.getUTCMonth()] + " 30, " + datetime.getUTCFullYear());
    
    $('#generateForm').submit(function(){
        $('#loader').modal('show');
        let form = $(this).serialize();
        setTimeout(() => {
            $.ajax({
                url: '/reports',
                data: form,
                method: 'post'
            }).done(function(result){
                let append = ''
                let timeOut = ''
                $.each(result, function(key, value){
                    if(value.time_out === null){
                        timeOut = `<td class="text-danger" colspan="3">No Time Out</td>`;
                    }
                    else{
                        timeOut = `
                                    <td>${convertTime(value.time_out)}</td>
                                    <td>${value.time_out_loc}</td>
                                    <td>${value.time_out_client}</td>
                                `;
                    }
                    append += `<tr>
                                   <td>${value.time_in_date}</td>
                                   <td>${convertTime(value.time_in)}</td>
                                   <td>${value.time_in_loc}</td>
                                   <td>${value.time_in_client}</td>
                                   ${timeOut}
                                </tr>
                            `;
                });
                $('#timeReport tbody').html(append);
                $('#loader').modal('hide');
            }).fail(function(){
    
            });
        }, 1000);
        return false;
    });
});

function convertTime(time24) {
    var ts = time24;
    var H = +ts.substr(0, 2);
    var h = (H % 12) || 12;
    h = (h < 10)?("0"+h):h;
    var ampm = H < 12 ? " AM" : " PM";
    ts = h + ts.substr(2, 3) + ampm;
    return ts;
}