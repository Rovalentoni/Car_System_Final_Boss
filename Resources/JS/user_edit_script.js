$(document).ready(function(){
    var thisUserId = $('#saveInfoBtn').attr('data-id');
    $.ajax({
        url:'api.php/?f=listUsers_Api',
        type:'GET',
        success: function(response){
            console.log (thisUserId);
            for(let i = 0; i < response.length; i++) {
                if(thisUserId === response[i].users_id) {
                    $('#users_username').attr('value', response[i].users_username);
                    $('#users_email').attr('value', response[i].users_email);
                    $('#users_password').attr('value', response[i].users_password);
                    $('#users_id').attr('value', response[i].users_id);
                }
            }
        }
    })
})

$(document).on("click", ".editBtn", function(e){
    e.preventDefault();
    var edit_id = $(this).attr('id');
    var editform = $('#editForm');
    var datas = editform.serialize();
    $.ajax({
        url:'api.php/?f=editUser_Api',
        type: 'POST',
        data: editform.serialize(), //Isso manda em forma de "POST" as informações do formulário, com as tags "name" ditando a key de cada item.
        // success: function(e,data){
        //     // alert ('Success');
        //     console.log(data);
        //     // window.location="/?f=userHomePage&editdone=true";
        // },
        complete: function(e){
            if(e.status === 200){
                alert ('Você editou o usuário com sucesso!');
                window.location="/?f=userHomePage&editdone=true";
            } else if (e.status === 204){
                alert ('Os campos não podem estar em branco.');
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
