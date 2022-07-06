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
    <title>Registrarme</title>
</head>

<body>
    <h1>Registrarme</h1>
    <div class="formUser">
        <form action="addUser" method="POST">
            <input type="name" name="nombre" placeholder="Nombre y apellido" required>
            <input type="number" name="dni" placeholder="DNI" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="email" name="mail" placeholder="Mail" required>
            <input type="text" name="obraSocial" placeholder="Obra social" required>
            <input type="number" name="nroAfiliado" placeholder="Numero de afiliado" required>
            <input type="password" name="contrasena" placeholder="Password" required>
            <input type="submit" value="Registrar">
        </form>
        {if $result != ""}
            <p class="result">{$result}</p>
        {/if}
        <a href="login">Iniciar sesión</a>
    </div>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>