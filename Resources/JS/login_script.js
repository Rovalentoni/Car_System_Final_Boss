$("#login_btn").click(function (e) {
    e.preventDefault();
    var loginform = $("#login_form");
    $.ajax({
        url: loginform.attr("action"), ///api.php/?f=login_Api
        type: loginform.attr("method"), //POST
        data: loginform.serialize(),
        success: function(response) {
            window.location = "/?f=mainHome";
        },
        error: function(xhr) {  
            alert ('Usuário e senha inválidos');
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
        },
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

/* - "statusCode:{200: function(){alert('algo')}}" Faz com que algo aconteça no determinado status code retornado. Forma fácil de fazer uma condicional via Ajax.

      - Quando eu retorno, com http_response_code(200 / 400), indica quais das funções cairá a chamada ajax. Como 200 é um status code de sucesso, caso eu retorne 200-299, 
        terei minha "success: function(){} " rodando. Caso o erro englobe um status de error (400-499) ela cairá automaticamente na error: function(){}. O statusCode acima condiciona
        cada código de error individualmente, sendo mais versátil. */

