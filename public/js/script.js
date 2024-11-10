let error = $('<p></p>', {
    class: 'error-text'
});

function getExperience() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $.ajax({
       url: '/experience/get',
       method: 'post',
       data: {
           'user_id': $('#user_id').val(),
       },
       success: function(data) {
           if(data['success']) {
               $(error).remove();
               $('#current_experience').html(data['success']);
           }
           else {
               $('#current_experience').html('');
               error.html('Не удалось получить опыт');
               $('div.buttons').after(error);
           }
       }
    });
}

async function setExperience() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $.ajax({
        url: '/experience/set',
        method: 'post',
        data: {
            'user_id': $('#user_id').val(),
        },
        success: function(data) {
            if(!data['success']) {
                $('#current_experience').html('');
                error.html('Не удалось установить опыт');
                $('div.buttons').after(error);
            }
            else {
                $(error).remove();
            }
        }
    });
}

$(document).ready(function() {
    let interval;

    $('#start_button').click(function() {
        clearInterval(interval);

        $('#experience_form').show();

        interval = setInterval(async function() {
            await setExperience();
            getExperience();
        }, 1000)
    });

    $('#stop_button').click(function() {
        clearInterval(interval);
        interval = null;
    });
});
