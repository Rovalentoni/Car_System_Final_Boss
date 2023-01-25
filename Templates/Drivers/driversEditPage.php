<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <link rel="stylesheet" href="/styles.css">
</head>


<h3 class="headerUser">Edição de Motoristas de: <?php echo $_SESSION['username'] ?></h3>

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
        <li class="sideLi"><a href="/?f=driversHomePage">Voltar</a></li>

    </ul>
    <img src="/Midia/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

</div>

<div class="divMiddle">
    <form action="api.php/?f=editDrivers_Api" method="POST" id="driversEditForm">
        <div class="middlecontroller">
            <input type="hidden" class="inputListing" name="driverid" id="drivers_id">
            <label><b>Nome:</b></label><input type="text" class="inputListing" name="drivers_username" id="drivers_username">
            <label><b>Idade:</b></label><input type="text" class="inputListing" name="drivers_age" id="drivers_age">
            <label><b>Etnia:</b></label><input type="text" class="inputListing" name="drivers_type" id="drivers_type">
            <label><b>CNH:</b></label><input type="text" class="inputListing" name="drivers_cnh" id="drivers_cnh">
            <label><b>Sexo:</b></label><input type="text" class="inputListing" name="drivers_sex" id="drivers_sex">

            <button class="buttonEntrar" id="saveBtn">Salvar</button>
            <input type="hidden" id="getID" data-id="<?php echo $_GET['driverid'] ?>">
    </form>


    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="/driver_edit_script.js"></script>
    </body>