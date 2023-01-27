$(document).on('click', '#saveBtn', function(e){
e.preventDefault();
var form = $('#driverCreateForm');
    $.ajax({
        url: 'api.php/?f=createDrivers_Api',
        type: 'POST',
        data: form.serialize(),
        success: function(response, status, xhr) {
            console.log (response);
            console.log (xhr);
            if(xhr.status == 201) {
                alert ('Motorista cadastrado com sucesso!');
                window.location = "/?f=driversHomePage&create=1";
            } else if (xhr.status == 204) {
                alert ('Não é possível deixar nenhum dos campos em branco');
                window.location = "/?f=driversCreatePage&blank=1";
            }
        }
    })
})