<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Veículos</title>
    <link rel="stylesheet" href="/styles.css">

    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/Midia/backgroundClose.jpg");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>

    <h3 class="headerUser">Detalhamento de Veículos <?php echo $_SESSION['username'] ?></h3>

    <div class="navigationMenu">
        <ul class="ulNavigation">
            <li class="liNavigation"><a href="/?f=mainHome">Home</a></li>
            <li class="liNavigation"><a href="/?f=userHomePage">Usuários</a></li>
            <li class="liNavigation"><a href="/?f=carsHomePage">Veículos</a></li>
            <li class="liNavigation"><a href="/?f=driversHomePage">Motoristas</a></li>
            <li class="liNavigation"><a href="api.php/?f=logout">Logout</a></li>
        </ul>
    </div>
    <div class="sideBar">
        <ul class="sideUl">
            <li class="sideLi"><a href="/?f=carsHomePage">Listar</a></li>
            <li class="sideLi"><a href="/?f=carsCreatePage">Criar</a></li>
        </ul>

    </div>

    <div class="detailsPage">


        <div class="detailsInfo">
            <b>ID:</b>
            <div class="detailsInfo" id="cars_id" data-id="<?php echo $_GET['carId'] ?>"></div>
        </div>
        <div class="detailsInfo">
            <b>Placa:</b>
            <div class="detailsInfo" name="cars_plate" id="cars_plate"></div>
        </div>

        <div class="detailsInfo"><b>Marca: </b>
            <div class="detailsInfo" name="cars_manufacturer" id="cars_manufacturer"></div>
        </div>

        <div class="detailsInfo">
            <b>Modelo:</b>
            <div class="detailsInfo" name="cars_model" id="cars_model"></div>
        </div>

        <div class="detailsInfo">
            <b>Tipo:</b>
            <div class="detailsInfo" name="cars_type" id="cars_type"></div>
        </div>
        <div class="detailsInfo">
            <b>Ano:</b>
            <div class="detailsInfo" name="cars_year" id="cars_year"></div>
        </div>
        <div class="detailsInfo">
            <b>Cor:</b>
            <div class="detailsInfo" name="cars_color" id="cars_color"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="/cars_details_script.js"></script>
</body>