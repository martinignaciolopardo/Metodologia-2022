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
            <h1 class="turnsTitle">Reservar turno</h1>
        </section>
        <section>
            <form class="filtroTurnos" action="turnos" method="GET">
                <select id="" name="medico">
                    <option disabled>Médico</option>
                    {foreach $medicos as $medico}
                        <option value="{$medico}">{$medico}</option>
                    {/foreach}
                </select>
                <select id="" name="especialidad">
                    <option disabled>Especialidad</option>
                    {foreach $especialidades as $especialidad}
                        <option value="{$especialidad}">{$especialidad}</option>
                    {/foreach}
                </select>
                <select id="" name="obraSocial">
                    <option disabled>Obra social</option>
                    {foreach $obrasSociales as $obraSocial}
                        <option value="{$obraSocial}">{$obraSocial}</option>
                    {/foreach}
                </select>
                <button>Filtrar</button>
            </form>
        </section>
        <section class="seccionTabla">
            <table class="table">
                <thead>
                    <td>DÍA</td>
                    <td>HORARIO</td>
                    <td>DURACIÓN</td>
                    <td>DISPONIBILIDAD</td>
                </thead>
                <tbody>
                    {foreach $turnos as $turno}
                        <tr>
                            <td>{date("d/M/Y" ,strtotime($turno->fecha))}</td>
                            <td>{date("h:i:s" ,strtotime($turno->fecha))}</td>
                            <td>{$turno->duracion}</td>
                            {if isset($turno->id_paciente) }
                                <td>OCUPADO</td>
                                {else} 
                                <td><a href="paciente/updateTurno">RESERVAR TURNO</a></td> {*se recarga la pagina y aparece ocupado*}
                            {/if}
                            
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