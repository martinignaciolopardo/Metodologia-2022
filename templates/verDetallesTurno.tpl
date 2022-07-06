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
    <title>Reservar turno</title>
</head>

<body>
    <main>
        <section>
            <h1 class="turnsTitle">Turno Reservado</h1>
        </section>
        <section class="seccionTabla">
            <table class="table">
                <thead>
                    <td>DÍA</td>
                    <td>HORARIO</td>
                    <td>DURACIÓN</td>
                    <td>MEDICO</td>
                </thead>
                <tbody>
                    <tr>
                        <td>{date("d/M/Y" ,strtotime($turno->fecha))}</td>
                        <td>{date("h:i:s" ,strtotime($turno->fecha))}</td>
                        <td>{$turno->duracion}</td>
                        <td>{$medico->nombre}, {$medico->apellido}</td>
                        {*se recarga la pagina y aparece ocupado*}
                    </tr>
                </tbody>
            </table>
        </section>
        <div class="imprimir">
            <button onclick="window.print()">Imprimir</button>
        </div>

    </main>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>