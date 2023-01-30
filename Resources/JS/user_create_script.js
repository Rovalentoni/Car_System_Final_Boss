$('#submitBtn').click(function (e) {
    e.preventDefault(); // -> This mofo makes it so we don't create duplicates. It prevents the default action. But where is the duplicate?
    //Found it, because the button is inside the form on the userCreatePage, it automatically understands that once you click it, it's supposed to submit. 
    var createForm = $('#createForm');
    $.ajax({
        url: createForm.attr('action'), //  api.php/?f=createUser_Api;
        type: createForm.attr('method'), //POST;
        data: createForm.serialize(),

        success: function (response, status, xhr) {
            console.log(response);
            console.log(xhr);
            // alert(response);
            if (xhr.status == 201) {
                alert('O usuário foi criado com sucesso!');
                window.location = "/?f=userHomePage&cadastro=1";
            }
        },

        error: function (response) {
            alert(response.responseText);
            // alert('Os campos não podem estar em branco');
            // window.location = "/?f=userCreatePage&blank=true"
        }
    })
})

//Brinquei com o 'statusCode' pra aprender a usar. 

// statusCode: {
//     204: function () {
//         alert('Os campos não podem estar em branco');
//         window.location = "/?f=userCreatePage&blank=true";
//     },
//     206: function () {
//         alert("Todos os campos precisam ter ao menos 4 digitos.");
//         window.location = "/?f=userCreatePage&strlen=true";
//     },
//     201: function () {
//         alert('O usuário foi criado com sucesso!');
//         window.location = "/?f=userHomePage&cadastro=1";
//     }
// },

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