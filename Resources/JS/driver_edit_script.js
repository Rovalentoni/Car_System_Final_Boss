
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
        success: function (response, status, xhr) {
            console.log(response);
            console.log(xhr);
            alert('Você editou o usuário com sucesso!');
            window.location = "/?f=drivershomepage&edit=1";

        },
        error: function (xhr, status, error) {
            alert('Os campos devem ser alterados e não devem ser deixados em brancos');
            console.log(xhr);
            console.log(status);
            console.log(xhr);
        }
    })
})

$(document).on('click', '#logoutBtn', function(e){
    e.preventDefault();
    $.ajax({
        url: 'api.php/?f=logout',
        type: 'GET',
        success: function(response, status, xhr) {
            console.log(response);
            console.log(xhr);
                if(xhr.status == 204) {
                    alert ('Logout efetuado com sucesso!');
                    window.location = "/?f=loginForm&try=2";
                }
        }
    })
})