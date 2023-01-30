<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <link rel="stylesheet" href="/resources/CSS/styles.css">
</head>

<body>



    <h3 class="headerUser">Edição de veículos de: <?php echo $_SESSION['username'] ?></h3>

    <div class="navigationMenu">
        <ul class="ulNavigation">
            <li class="liNavigation"><a href="/?f=mainHome">Home</a></li>
            <li class="liNavigation"><a href="/?f=userHomePage">Usuários</a></li>
            <li class="liNavigation"><a href="/?f=carsHomePage">Veículos</a></li>
            <li class="liNavigation"><a href="/?f=driversHomePage">Motoristas</a></li>
            <li class="liNavigation"><a href="api.php/?f=logout" id="logoutBtn">Logout</a></li>
        </ul>
    </div>
    <div class="sideBar">
        <ul class="sideUl">
            <li class="sideLi"><a href="/?f=carsHomePage">Listar</a></li>
            <li class="sideLi"><a href="/?f=carsCreatePage">Criar</a></li>
            <li class="sideLi"><a href="/?f=carsHomePage">Voltar</a></li>

        </ul>
        <img src="/resources/img/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>



    
                <div class="divMiddle">
                    <form action="/api.php/?f=editCars_Api" method="POST" id="editForm">
                        <div class="middlecontroller">
                            <b>
                                <div><label>Placa</label></div>
                            </b>
                            <input type="text" class="inputListing"  name="placa" id="cars_plate">
                            <b>
                                <div><label>Fabricante</label></div>
                            </b>
                            <input type="text" class="inputListing" name="marca" id="cars_manufacturer">
                            <b>
                                <div><label>Modelo</label></div>
                            </b>
                            <input type="text" class="inputListing" name="modelo" id="cars_model">
                            <b>
                                <div><label>Type</label></div>
                            </b>
                            <input type="text" class="inputListing" name="tipo" id="cars_type">
                            <b>
                                <div><label>Ano</label></div>
                            </b>
                            <input type="number" class="inputListing" name="ano" id="cars_year">
                            <b>
                                <div><label>Cor</label></div>
                            </b>
                            <input type="text" class="inputListing" name="cor" id="cars_color">
                            <input type="hidden" class="inputListing" name="carId" id="cars_id">

                    </form>
                    <button class="buttonEntrar" id="editBtn" value="Salvar" data-id ="<?php echo $_GET['carId'] ?>"> Salvar Edições </button>


            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
            <script src="/resources/JS/cars_edit_script.js"></script>
</body>

</html>