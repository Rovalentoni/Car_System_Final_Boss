<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="stylesheet" href="/resources/CSS/styles.css">

    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/resources/img/backgroundWhite.png");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>


    <h3 class="headerUser">Detalhamento de Motoristas <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=driversHomePage">Listar</a></li>
            <li class="sideLi"><a href="/?f=driversCreatePage">Criar</a></li>
        </ul>

    </div>

    < </tr>
        <?php
        ?>
        <div class="detailsPage">
            <ul>
                <li class="detailsInfo"><b>ID:</b></li>
                <dd class="detailsInfo" id="drivers_id"></dd>
                <li class="detailsInfo"><b>Nome:</b></li>
                <dd class="detailsInfo" id="drivers_username"></dd>
                <li class="detailsInfo"><b>Idade:</b></li>
                <dd class="detailsInfo" id="drivers_age"></dd>
                <li class="detailsInfo"><b>Etnia:</b></li>
                <dd class="detailsInfo" id="drivers_type"></dd>
                <li class="detailsInfo"><b>CNH:</b></li>
                <dd class="detailsInfo" id="drivers_cnh"></dd>
                <li class="detailsInfo"><b>Sexo:</b></li>
                <dd class="detailsInfo" id="drivers_sex"></dd>
            </ul>

            <input type="hidden" id="getID" data-id="<?php echo $_GET['driverid'] ?>">

            <div> <button class="detailsButton3" onclick="window.location='/?f=driversHomePage'"> Voltar </button></div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <script src="/resources/JS/driver_details_script.js"></script>

</body>