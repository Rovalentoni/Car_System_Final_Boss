$(document).ready(function(){
    $.ajax({
        url: 'api.php/?f=listDrivers_Api',
        type: 'GET',
        success: function(response) {
            var tbody = '';
            for(i = 0; i < response.length; i++){
                tbody += '<tr><td>' + response[i].drivers_id + '</td><td>' + response[i].drivers_username + '</td><td>' +
                response[i].drivers_age + '</td><td>' + response[i].drivers_type + '</td><td>' + response[i].drivers_cnh +
                '</td><td>' + response[i].drivers_sex + '</td><td>  <button id="' + response[i].drivers_id + ' " class="smallerButton" onclick="window.location=\'' + '/?f=driversEditPage&driverid='+ response[i].drivers_id + '\'">Editar</button>'+
                '<button value="" id="' + response[i].drivers_id + ' "class="smallerRedButton deleteBtn">Deletar</button>' +
                '<button value="detailsBtn" id="' + response[i].drivers_id + ' "class="detailsButton2" onclick="window.location=\'' + '/?f=driversDetailsPage&driverid=' + response[i].drivers_id +'\'">Ver Detalhes</button>' + '</td></tr>';
            }
            $('#tbody_Driver').html(tbody);
            $('#tbody_Driver').show('slow');
        }
    })
})

$(document).on("click", ".deleteBtn", function(){
    var thisID = $(this).attr('id');
    $.ajax({
        url:'api.php/?f=deleteDrivers_Api',
        type: 'POST',
        data: 'driverid='+ thisID,
        success: function(response){
            alert('O usuário foi deletado com sucesso');
            window.location = "/?f=driversHomePage&delete=1";
        }
    })
})