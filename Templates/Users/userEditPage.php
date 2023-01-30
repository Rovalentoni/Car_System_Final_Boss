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



    <h3 class="headerUser">Edição de Usuários de: <?php echo $_SESSION['username'] ?></h3>

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
        <img src="/resources/img/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>

 <tr> 
                <div class="divMiddle">
                    <form action="/api.php/?f=editUser_Api" method="POST" id="editForm">
                        <div class="middlecontroller">
                            <div><label>Nome do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="users_username" id="users_username"></div>
                            <div><label>Email do usuário:</label></div>
                            <input type="text" class="inputListing" name="users_email" id="users_email">
                            <div><label>Senha do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="users_password" id="users_password"></label></div>
                            <input type="hidden" name="userid" id="users_id" >
                    </form>
                    <button class="buttonEntrar editBtn" data-id="<?php echo $_GET['userid']?>" id="saveInfoBtn"> Salvar </button>


            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
            <script src="/resources/JS/user_edit_script.js"></script>
</body>

</html>