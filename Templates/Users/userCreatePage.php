<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/resources/CSS/styles.css">
</head>

<body>

    <h3 class="headerUser">Cadastro de Usuários de: <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=userHomePage">Voltar</a></li>

        </ul>
        <img src="/resources/img/userCreate.png" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>

    <div class="divMiddle">
        <form action="/api.php/?f=createUser_Api" method="POST" id="createForm">
            <div class="middlecontroller">
                <h2>Cadastro de novo usuário:</h2>

                <div><label>Novo usuário:</label></div>
                <div><input type="text" class="inputMiddle" name="users_username"></div>

                <div><label>Email do usuário:</label></div>
                <div><input type="text" class="inputMiddle" name="users_email"></label></div>

                <div><label>Senha do usuário:</label></div>
                <div><input type="password" class="inputMiddle" name="users_password"></label></div>

                <div><button class="buttonEntrar" value="Cadastrar" id="submitBtn">Cadastrar</button></div>

            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="/resources/JS/user_create_script.js"></script>
</body>