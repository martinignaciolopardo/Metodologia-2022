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
    <title>Iniciar sesión | Paciente</title>
</head>

<body>
    <div class="topBarLogin">
        <a href="login"><input class="inputWhite" type="button" value="SOY MÉDICO / SECRETARIA"></a>
    </div>
    <div class="formPatient">
        <img src="images/1.png">
        <form class="loginForm" action="verifyPatient" method="POST">
            <label for="dni-patient">NÚMERO DE DNI</label>
            <input type="number" minlength="6" maxlength="9" id="dni-patient" name="dni-patient"
                placeholder="DNI (sin puntos)" required>
            <input type="submit" value="Ingresar">
        </form>
        <div class="divRegister">
            <a href="register"><input class="inputRegister" type="button" value="Registrarme"></a>
        </div>
    </div>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>