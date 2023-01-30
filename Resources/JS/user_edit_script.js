$(document).ready(function () {
    var thisUserId = $('#saveInfoBtn').attr('data-id');
    $.ajax({
        url: 'api.php/?f=listUsers_Api',
        type: 'GET',
        success: function (response) {
            console.log(thisUserId);
            for (let i = 0; i < response.length; i++) {
                if (thisUserId === response[i].users_id) {
                    $('#users_username').attr('value', response[i].users_username);
                    $('#users_username').attr('value', response[i].users_username);
                    $('#users_email').attr('value', response[i].users_email);
                    $('#users_password').attr('value', response[i].users_password);
                    $('#users_id').attr('value', response[i].users_id);
                }
            }
        }
    })
})

$(document).on("click", ".editBtn", function (e) {
    e.preventDefault();
    var editform = $('#editForm');
    $.ajax({
        url: 'api.php/?f=editUser_Api',
        type: 'POST',
        data: editform.serialize(), //Isso manda em forma de "POST" as informações do formulário, com as tags "name" ditando a key de cada item.
        success: function (response, status, xhr) {
            console.log(response);
            console.log(xhr);
            alert('Você editou o usuário com sucesso!');
            window.location = "/?f=userHomePage&editdone=true";

        },
        error: function (xhr, status, error) {
            alert('Os campos devem ser alterados e não devem ser deixados em brancos');
            console.log(xhr);
            console.log(status);
            console.log(xhr);
        }
    })
})


$(document).on('click', '#logoutBtn', function (e) {
    e.preventDefault();
    $.ajax({
        url: 'api.php/?f=logout',
        type: 'GET',
        success: function (response, status, xhr) {
            console.log(response);
            console.log(xhr);
            if (xhr.status == 204) {
                alert('Logout efetuado com sucesso!');
                window.location = "/?f=loginForm&try=2";
            }
        }
    })
})

/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)
    error(xhr,status,error)
    success(result,status,xhr)	*/



// O  (e) não funciona na function success, por algum motivo. Mas consigo fazer condicionais usando o (e) pela função de complete. (Motivo acima)

// $('#editBtn').click(function(e){
//     e.preventDefault();
//     var edit_id = $(this).attr('id');
//     var editform = $('#editForm');
//     $.ajax({
//         url:'api.php/editUser_Api',
//         type: 'POST',
//         data: editform.serialize(),
//         success: function(){
//             alert ('O usuário foi editado com sucesso!');
//         }
//     })
// })
