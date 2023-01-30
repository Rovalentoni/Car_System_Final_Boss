
$(document).ready(function () {
    $.ajax({
        url: '/api.php/?f=listCars_Api',
        type: 'GET',
        success: function success(response) {
            console.log(response);

            var result = '';
            for (let i = 0; i < response.length; i++) {
                result += '<tr><td>' + response[i].cars_id +
                    '</td><td>' + response[i].cars_plate +
                    '</td><td>' + response[i].cars_manufacturer +
                    '</td><td>' + response[i].cars_model +
                    '</td><td>' + response[i].cars_type +
                    '</td><td>' + response[i].cars_year +
                    '</td><td>' + response[i].cars_color +
                    '</td><td>  <button id="' + response[i].cars_id + ' " class="smallerButton" onclick="window.location=\'' + '/?f=carsEditPage&carId='+ response[i].cars_id + '\'">Editar</button>'+
                    '<button value="" id="' + response[i].cars_id + ' "class="smallerRedButton deleteBtn">Deletar</button>' +
                    '<button value="detailsBtn" id="' + response[i].cars_id + ' "class="detailsButton2" onclick="window.location=\'' + '/?f=carsDetailsPage&carId=' + response[i].cars_id +'\'">Ver Detalhes</button>' + '</td></tr>';
            }
            console.log(result);
            $('#tbody').html(result);
            $('#tbody').show('slow');
        },

    })
    
})

$(document).on("click", ".deleteBtn",function(){
    var del_id = $(this).attr('id');
    $.ajax({
        url: 'api.php/?f=deleteCars_Api',
        type: 'POST',
        data: 'carId=' + del_id,
        success: function success (response){
            alert('O Veículo foi deletado com sucesso!') ;
            window.location="/?f=carsHomePage&delete=1"
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