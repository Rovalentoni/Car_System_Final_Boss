$(document).ready(function(){
    var thisID = $('#getID').attr('data-id');
    $.ajax({
        url:'/api.php/?f=listDrivers_Api',
        type: 'GET',
        success: function(response){
            for(i = 0; i < response.length; i++){
                if(thisID == response[i].drivers_id) {
                    $('#drivers_id').html(response[i].drivers_id);
                    $('#drivers_username').html(response[i].drivers_username);
                    $('#drivers_age').html(response[i].drivers_age);
                    $('#drivers_type').html(response[i].drivers_type);
                    $('#drivers_cnh').html(response[i].drivers_cnh);
                    $('#drivers_sex').html(response[i].drivers_sex);
                }
            }
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