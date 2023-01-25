$('#submitBtn').click(function (e) {
    e.preventDefault(); // -> This mofo makes it so we don't create duplicates. It prevents the default action. But where is the duplicate?
    //Found it, because the button is inside the form on the userCreatePage, it automatically understands that once you click it, it's supposed to submit. 
    var createForm = $('#createForm');
    $.ajax({
        url: createForm.attr('action'), //  api.php/?f=createUser_Api;
        type: createForm.attr('method'), //POST;
        data: createForm.serialize(),
        statusCode: {
            204: function () {
                alert('Os campos não podem estar em branco');
                window.location = "/?f=userCreatePage&blank=true";
            },
            206: function () {
                alert("Todos os campos precisam ter ao menos 4 digitos.");
                window.location = "/?f=userCreatePage&strlen=true";
            },
            201: function () {
                alert('O usuário foi criado com sucesso!');
                window.location = "/?f=userHomePage&cadastro=1";
            }
        },

        //Brinquei com o 'statusCode' pra aprender a usar, mas fiz a function success funcionando abaixo caso Gabriel ache mais viável. 

        // success: function(response, status, xhr){
        //     console.log(response);
        //     if (xhr.status == 201) {
        //         alert('O usuário foi criado com sucesso!');
        //         window.location = "/?f=userHomePage&cadastro=1";
        //     } else if (xhr.status == 204) {
        //         alert('Os campos não podem estar em branco');
        //         window.location = "/?f=userCreatePage&blank=true";
        //     }
        // }
    })
})



/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)	
    error(xhr,status,error)	
    success(result,status,xhr)	*/