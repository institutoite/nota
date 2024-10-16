<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Bienvenido
                </div>
                <form id="loginform">
                    <input type="text" name="trimestre1" placeholder="nota primer trimestre" required>
                    <input type="text" name="trimestre2" placeholder="nota segundo trimestre" required>
                    <select class="custom-select" id="materia_id" name="materia_id" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->materia }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="telefono" placeholder="telefono" required>
                    
                    <input type="promediodeseado" placeholder="Promedio deseado" value="51" name="promediodeseado" required>
                    
                    <button type="submit" title="Ingresar" name="Ingresar">Calcular</button>
                </form>
                <div class="pie-form">
                    <a href="#">sigueme en tik tok</a>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('calcular-btn').addEventListener('click', function() {
    // Obtener valores de los trimestres y el promedio mínimo
    var trimestre1 = parseFloat(document.getElementById('trimestre1').value) || 0;
    var trimestre2 = parseFloat(document.getElementById('trimestre2').value) || 0;
    var promedioMinimo = parseFloat(document.getElementById('promedio_minimo').value) || 60;

    // Calcular lo que necesita en el tercer trimestre para alcanzar el promedio mínimo
    var totalNecesario = promedioMinimo * 3;  // Promedio deseado multiplicado por los 3 trimestres
    var trimestre3 = totalNecesario - (trimestre1 + trimestre2);  // Lo que necesita en el tercer trimestre

    // Asegurarse de que el trimestre 3 no sea negativo
    trimestre3 = Math.max(trimestre3, 0);

    // Mostrar el valor calculado en el campo de trimestre3
    document.getElementById('trimestre3').value = trimestre3.toFixed(2);
});
</script>
</body>
</html>
