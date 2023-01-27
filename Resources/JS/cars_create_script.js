$(document).on("click", "#saveBtn", function (e) {
    e.preventDefault(); 
    var form = $('#create_Form');
    $.ajax({
        url: form.attr('action'), // -> '/api.php/?f=createCars_Api';
        type: form.attr('method'), // -> 'POST'; 
        data: form.serialize(),
        success: function(response,status, e){
            console.log(response);  //Dados da resposta tratada
            console.log(status);    //Status code em escrito
            console.log(e);  //Objeto xhr cujo atributo status = 201/204 etc.

            if(e.status == 204) {
                alert ('Não é possível deixar nenhum campo em branco');
            } else if (e.status == 201) {
                alert ('Você criou um veículo com sucesso!');
                window.location = "/?f=carsHomePage&create=1";
            }
        },

    })
})

/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)	
    error(xhr,status,error)	
    success(result,status,xhr)	*/

//4 horas pro saco pq o corno do form tinha tag "name" invés de "id".