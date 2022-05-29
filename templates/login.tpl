<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="formUser">
        <img src="images/1.png">
        <form action="verifyUser" method="POST">
            <input type="text" name="user" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
    </div>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>