$(document).ready(function(){

    var thisUserId = $('#users_id').attr('data-id');

    $.ajax({
        url:'api.php/?f=listUsers_Api',
        type: 'GET',
        success:function(response){
            console.log(response);

            for (let i = 0; i < response.length; i++) {
                if(response[i].users_id === thisUserId){
                    $('#users_username').html(response[i].users_username);
                    $('#users_email').html(response[i].users_email);
                    $('#users_password').html(response[i].users_password);
                }
            }
        }
    })
})

/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)	
    error(xhr,status,error)	
    success(result,status,xhr)	*/