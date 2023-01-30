<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
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



    <h3 class="headerUser">Detalhamento de usuários <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=userHomePage">Listar</a></li>
            <li class="sideLi"><a href="/?f=userCreatePage">Criar</a></li>
        </ul>

    </div>

    < </tr>
        <?php

        ?>
                <div class="detailsPage">
                    <ul>
                        <li class="detailsInfo" name="userid" id="users_id" data-id="<?php echo $_GET['userid'] ?>"><b>ID:</b><?php echo $_GET['userid'] ?></li>

                        <li class="detailsInfo">
                            <b>Nome:</b>
                            <div class="detailsInfo" name="users_username" id="users_username"></div>
                        </li>

                        <li class="detailsInfo">
                            <b>Email:</b>
                            <div class="detailsInfo" name="users_email" id="users_email"></div>
                        </li>

                        <li class="detailsInfo">
                            <b>Senha: </b>
                            <div class="detailsInfo" name="users_password" id="users_password"></div>
                        </li>

                    </ul>

   
            <div> <button class="detailsButton" onclick="window.location='/?f=userHomePage'"> Voltar </button></div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
                <script src="/resources/JS/user_details_script.js"></script>
</body>