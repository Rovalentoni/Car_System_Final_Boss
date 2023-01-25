$("#login_btn").click(function () {
    var loginform = $("#login_form");
    $.ajax({
        url: loginform.attr("action"), ///api.php/?f=login_Api
        type: loginform.attr("method"), //POST
        data: loginform.serialize(),
        statusCode: {
            200: function () {
                window.location = "/?f=mainHome";
            },
            400: function() {
                window.location = "?f=loginForm&try=1";
            }
        },

        // success: function (response) {
        //     alert('This was a success');
        // },
        // error: function (response) {
        //     alert('This was an error');
        // },

        //Decidi usar a "statusCode" por acha-la mais versátil. Porém fiz funcionar com ambas.
        
    })
})

/* - "statusCode:{200: function(){alert('algo')}}" Faz com que algo aconteça no determinado status code retornado. Forma fácil de fazer uma condicional via Ajax.

      - Quando eu retorno, com http_response_code(200 / 400), indica quais das funções cairá a chamada ajax. Como 200 é um status code de sucesso, caso eu retorne 200-299, 
        terei minha "success: function(){} " rodando. Caso o erro englobe um status de error (400-499) ela cairá automaticamente na error: function(){}. O statusCode acima condiciona
        cada código de error individualmente, sendo mais versátil. */

