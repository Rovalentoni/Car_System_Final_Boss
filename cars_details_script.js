$(document).ready(function(){
    var thisCarId = $('#cars_id').attr('data-id');
    $.ajax({
        url: 'api.php/?f=listCars_Api',
        type: 'GET',
        success: function (response) {
            console.log(response);
            for (let i = 0; i < response.length; i++) {
                if (thisCarId === response[i].cars_id) {
                    $('#cars_id').html(response[i].cars_id);
                    $('#cars_plate').html(response[i].cars_plate);
                    $('#cars_manufacturer').html(response[i].cars_manufacturer);
                    $('#cars_model').html(response[i].cars_model);
                    $('#cars_type').html(response[i].cars_type);
                    $('#cars_year').html(response[i].cars_year);
                    $('#cars_color').html(response[i].cars_color);

                }
            }
        }
    })
})