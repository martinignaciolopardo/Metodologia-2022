<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="formUser">
        <img src="images/1.png">
        <form class="loginForm" action="verifyUser" method="POST">
            <label for="usuario">Usuario</label>
            <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
            <label for="contraseña">Contraseña</label>
            <input id="contraseña" type="password" name="contrasenia" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
    </div>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>