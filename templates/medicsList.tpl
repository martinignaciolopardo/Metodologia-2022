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
    <title>Medicos</title>
</head>

<body>

    <main>
        
        <section>
            <h1 class="turnsTitle">Seleccionar un medico</h1>
        </section>

        {******* Start form *******}

        <section>
            <form class="medicos" action="medicos" method="GET">
                <div>
                    <label for="obra_social">Obra social</label>
                    <select id="obra_socual" name="obraSocial">
                        {if $obra == 1}
                            <option value="1" selected >IOMA</option>
                        {else}
                            <option value="1">IOMA</option>    
                        {/if}
                        {if $obra == 2}
                            <option value="2" selected >OSDE</option>
                        {else}
                            <option value="2">OSDE</option>    
                        {/if}
                        {if $obra == 3}
                            <option value="3" selected >SWISS MEDICAL</option>
                        {else}
                            <option value="3">SWISS MEDICAL</option>    
                        {/if}
                        {if $obra == 4}
                            <option value="4" selected >SANCOR SALUD</option>
                        {else}
                            <option value="4">SANCOR SALUD</option>    
                        {/if}
                        {if $obra == 5}
                            <option value="5" selected >TODAS</option>
                        {else}
                            <option value="5"></option>    
                        {/if}

                    </select>
                </div>
                <div>
                    <label for="especialidadId">Especialidad</label>
                    <input type="text" id="especialidadId" name="especialidad" placeholder="Especialidad..">
                </div>
                <button>Filtrar</button>
            </form>
        </section>

        {******* End form *******}

        {******* Start table *******}

        <section class="seccionTabla">
            <table class="table">
                <thead>
                    <td>MEDICO</td>
                    <td>OBRA SOCIAL</td>
                    <td>ESPECIALIDAD</td>
                </thead>
                <tbody>
                    {foreach $medics as $medico}
                        <tr>
                            <td><a href="#">{$medico->nombre}</a></td>
                            <td> 
                                {if $medico->descripcion}
                                    {$medico->descripcion}
                                {else}
                                    - 
                                {/if}
                            </td>
                            <td> {$medico->especialidad} </td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>

        {******* End table *******}
    </main>

    <footer>
        Copyright 2022-2022. All Rights Reserved.
        Sistema de Turnos is Powered by Grupo7.
    </footer>

</body>

</html>