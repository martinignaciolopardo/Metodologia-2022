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
    <title>Próximos turnos</title>
</head>

<body>
    <main>
        <section>
            <h1 class="turnsTitle">Próximos turnos</h1>
        </section>
        <section>
            <form class="filtroTurnos" action="turnos" method="GET">
                <label for="turno">Turno</label>
                <select id="turno" name="timeRange">
                    <option disabled>Turno</option>
                    <option value="maniana">Mañana</option>
                    <option value="tarde">Tarde</option>
                    <option value="">Ver todo</option>
                </select>
                <div class="rangoFecha">
                    <div class="labelsRango">
                        <p for="fecha_min">Desde: </p>
                        <p for="fecha_max">Hasta:</p>
                    </div>

                    <input id="fecha_min" class="" name="fecha_min" type="date">

                    <input id="fecha_max" name="fecha_max" type="date">
                </div>

                <button>Filtrar</button>
            </form>
        </section>
        <section class="seccionTabla">
            <table class="table">
                <thead>
                    <td>DÍA</td>
                    <td>HORARIO</td>
                </thead>
                <tbody>
                    {foreach $turnos as $turno}
                        <tr>
                            <td>{date("d/M/Y" ,strtotime($turno->fecha))}</td>
                            <td>{date("h:i:s" ,strtotime($turno->fecha))}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>
</body>

</html>