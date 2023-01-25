
$(document).ready(function(){
    var thisID = $('#getID').attr('data-id');

    $.ajax({
        url: 'api.php/?f=listDrivers_Api',
        type: 'GET',
        success: function(response){
            for (i = 0; i < response.length; i++){
                if (thisID == response[i].drivers_id){
                    $('#drivers_id').attr('value', response[i].drivers_id);
                    $('#drivers_username').attr('value', response[i].drivers_username);
                    $('#drivers_age').attr('value', response[i].drivers_age);
                    $('#drivers_type').attr('value', response[i].drivers_type);
                    $('#drivers_cnh').attr('value', response[i].drivers_cnh);
                    $('#drivers_sex').attr('value', response[i].drivers_sex);
                }
            }
        }
    })
})

$(document).on('click', '#saveBtn', function(e){
    e.preventDefault();
    var form = $('#driversEditForm');
    $.ajax({
        url:'api.php/?f=editDrivers_Api',
        type: 'POST',
        data: form.serialize(),
        success: function(response, status, xhr){
            console.log(response);
            if(xhr.status == 200) {
                alert ('Motorista editado com sucesso!');
                window.location = "/?f=drivershomepage&edit=1";
            } else if(xhr.status == 204) {
                alert ('Nenhum dos campos podem estar em branco!');
            }
        }
    })
})