<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="stylesheet" href="//resources/CSS/styles.css">
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/resources/img/backgroundRain.jpg");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>



<h3 class="headerUser">Gerenciamento de Motoristas de: <?php echo $_SESSION['username'] ?></h3>

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
<div>
    <table class="tableHome">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Etnia</th>
            <th>CNH</th>
            <th>Sexo</th>
            <th style="width:280px;">Ações</th>

        </tr>
        <tbody id="tbody_Driver" class="tdTable"></tbody>

    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="/resources/JS/driver_list_script.js"></script>


</body>
