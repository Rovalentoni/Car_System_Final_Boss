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
            console.log(response);
            console.log(xhr);
            alert('Você editou o usuário com sucesso!');
            window.location = "/?f=carsHomePage&editdone=true";

        },
        error: function (xhr, status, error) {
            alert('Os campos devem ser alterados e não devem ser deixados em brancos');
            console.log(xhr);
            console.log(status);
            console.log(xhr);
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

/*  Colinha das funções do ajax - Estudo
    complete(xhr,status)	
    error(xhr,status,error)	
    success(result,status,xhr)	*/