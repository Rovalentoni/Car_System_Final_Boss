$(document).ready(function () {
    var thisID = $('#editBtn').attr('data-id');
    $.ajax({
        url: 'api.php/?f=listCars_Api',
        type: 'GET',
        success: function (response) {
            console.log(response);
            for (i = 0; i < response.length; i++) {
                if (thisID === response[i].cars_id) {
                    $('#cars_plate').attr('value', response[i].cars_plate);
                    $('#cars_manufacturer').attr('value', response[i].cars_manufacturer);
                    $('#cars_model').attr('value', response[i].cars_model);
                    $('#cars_type').attr('value', response[i].cars_type);
                    $('#cars_year').attr('value', response[i].cars_year);
                    $('#cars_color').attr('value', response[i].cars_color);
                    $('#cars_id').attr('value', response[i].cars_id);
                }
            }
        }
    })
})

$(document).on('click', '#editBtn', function (e) {
    e.preventDefault();
    var thisID = $('#editBtn').attr('data-id');
    var form = $('#editForm');
    $.ajax({
        url: 'api.php/?f=editCars_Api',
        type: 'POST',
        data: form.serialize(),

        success: function (response, status, xhr) {
            // alert('success reached');
            console.log(response);
            console.log(status);
            console.log(xhr);
        },
        complete: function(e){
            if(e.status === 200){
                alert ('Você editou o usuário com sucesso!');
                window.location="/?f=carsHomePage&editdone=true";
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