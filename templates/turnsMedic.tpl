<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos turnos</title>
</head>

<body>
    <main>
        <section>
            <h1>Próximos turnos</h1>
        </section>
        <section>
            <form action="turnos" method="GET">
                <select name="timeRange">
                    <option disabled>Turno</option>
                    <option value="maniana">Mañana</option>
                    <option value="tarde">Tarde</option>
                </select>
                <label>Desde: <input name="fecha_min" type="date"></label>
                <label>Hasta: <input name="fecha_max" type="date"></label>
                <button>Filtrar</button>
            </form>
        </section>
        <section>
            <table>
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