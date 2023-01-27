var editid = null;

$(document).ready(function () {
    $.ajax({
        url: '/api.php/?f=listUsers_Api',
        type: 'GET',
        success: function success(response) {
            console.log(response);

            var result = '';
            for (let i = 0; i < response.length; i++) {
                result += '<tr><td>' + response[i].users_id +
                    '</td><td>' + response[i].users_username +
                    '</td><td>' + response[i].users_email +
                    '</td><td>' + response[i].users_password +
                    '</td><td>  <button id="' + response[i].users_id + ' " class="smallerButton" onclick="window.location=\'' + '/?f=userEditPage&userid='+ response[i].users_id + '\'">Editar</button>'+
                    '<button value="" id="' + response[i].users_id + ' "class="smallerRedButton deleteBtn">Deletar</button>' +
                    '<button value="detailsBtn" id="' + response[i].users_id + ' "class="detailsButton2" onclick="window.location=\'' + '/?f=userDetailsPage&userid=' + response[i].users_id +'\'">Ver Detalhes</button>' + '</td></tr>';
            }
            $('#tbody').html(result);
            $('#tbody').show('slow');
        },

    })
    
})

$(document).on("click", ".deleteBtn",function(){
    var del_id = $(this).attr('id');
    $.ajax({
        url: 'api.php/?f=deleteUser_Api',
        type: 'POST',
        data: 'userid=' + del_id,
        success: function success (){
            alert('O usuário foi deletado com sucesso!') ;
            window.location="/?f=userHomePage&delete=1";
        },
        error: function(){
            alert('error');
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



/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)	
    error(xhr,status,error)	
    success(result,status,xhr)	*/


// $(document).on("click", "#editBtn", function(e){
//     e.preventDefault();
//     var edit_id = $(this).attr('id');
//     var editform = $('#editForm');
//     var datas = editform.serialize();
//     $.ajax({
//         url:'api.php/?f=editUser_Api',
//         type: 'POST',
//         data: editform.serialize(),
//         // success: function(e,data){
//         //     // alert ('Success');
//         //     console.log(data);
//         //     // window.location="/?f=userHomePage&editdone=true";
//         // },
//         complete: function(e){
//             if(e.status === 200){
//                 alert ('Você editou o usuário com sucesso!');
//                 window.location="/?f=userHomePage&editdone=true";
//             } else if (e.status === 204){
//                 alert ('Os campos não podem estar em branco.');
//             }
//         }
//     })
// })

