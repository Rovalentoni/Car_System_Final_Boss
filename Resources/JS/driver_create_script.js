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
                alert ('Motorista cadastrado com sucesso!');
                window.location = "/?f=driversHomePage&create=1";
        },
        error: function(xhr) {
            alert (xhr.responseText);
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