<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ITE CALCULADORA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('css/login2.css') }}">
</head>
<body>
    
    <div class="panel-lite">
        <h2 class="title">CALCUDORA DE NOTA </h2>
        <div class="thumbur">
            <div class="icon-lock"></div>
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="trimestre1" max="100" id="trimestre1" value="{{ old('trimestre1', 31) }}" min="0" required="required"/>
            <label class="form-label">Nota del primer trimestre</label>
        </div>
        
        <div class="form-group">
            <input class="form-control" type="number" name="trimestre2" id="trimestre2" value="{{ old('trimestre2', 50) }}" min="0" required="required"/>
            <label class="form-label">Nota del segundo trimestre</label>
        </div>
        
        <div class="form-group">
            <select class="form-control" name="materia_id" id="materia_id" required>
                <option value="0">Seleccione una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" {{ old('materia_id') == $materia->id ? 'selected' : '' }}>{{ $materia->materia }}</option>
                @endforeach
            </select>
            <label class="form-label">Materia</label>
        </div>
        
        <div class="form-group">
            <input class="form-control" type="number" name="telefono" id="telefono" value="{{ old('telefono', 71039910) }}" min="0" required="required"/>
            <label class="form-label">Teléfono</label>
        </div>
        {{-- <div class="form-group">
            @if ($errors->has('trimestre1'))
                <span class="text-danger">{{ $errors->first('trimestre1') }}</span>
            @endif
            <input class="form-control" type="number" name="trimestre1" value="{{ old('trimestre1', 31) }}" id="trimestre1" min="0" required="required"/>
            <label class="form-label">Nota del primer trimestre</label>
        </div>
        
        <div class="form-group">
            @if ($errors->has('trimestre2'))
                <span class="text-danger">{{ $errors->first('trimestre2') }}</span>
            @endif
            <input class="form-control" type="number" name="trimestre2" id="trimestre2" value="{{ old('trimestre2', 50) }}" min="0" required="required"/>
            <label class="form-label">Nota del segundo trimestre</label>
        </div>
        
        <div class="form-group">
            @if ($errors->has('materia_id'))
                <span class="text-danger">{{ $errors->first('materia_id') }}</span>
            @endif
            <select class="form-control" name="materia_id" id="materia_id" required>
                <option value="0">Seleccione una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" {{ old('materia_id') == $materia->id ? 'selected' : '' }}>{{ $materia->materia }}</option>
                @endforeach
            </select>
            <label class="form-label">Materia</label>
        </div>
        
        <div class="form-group">
            @if ($errors->has('telefono'))
                <span class="text-danger">{{ $errors->first('telefono') }}</span>
            @endif
            <input class="form-control" min="0" type="number" value="{{ old('telefono', 71039910) }}" name="telefono" id="telefono" required="required"/>
            <label class="form-label">Teléfono</label>
        </div>
        
         --}}
        
        <button class="floating-btn" id="submitBtn"><i class="icon-arrow"></i></button>
        

        <a target="_blank" href="https://www.tiktok.com/@ite_educabol">Siguenos en tik tok</a>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                
                <div class="titulo">
                    Bienvenido
                </div>
                <form>
                    <input type="text" name="trimestre1" id="trimestre1" placeholder="nota primer trimestre" required>
                    <input type="text" name="trimestre2" id="trimestre2" placeholder="nota segundo trimestre" required>
                    <select class="custom-select" id="materia_id" name="materia_id" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->materia }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="telefono" placeholder="telefono" required>
                    
                    <input type="number" id="promedio_minimo" placeholder="Promedio deseado" value="51" name="promedio_minimo"  required>
                    
                    <button type="submit" title="Ingresar" id="calcular-btn" name="Ingresar">Calcular</button>
                </form>
                <div class="pie-form">
                    <a href="#">sigueme en tik tok</a>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('calcular-btn').addEventListener('click', function(e) {
    e.preventDefault();
    alert("todo bien");
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
    //document.getElementById('trimestre3').value = trimestre3.toFixed(2);
    //document.getElementById('respuesta').innerHTML = "El promedio mínimo es: " + promedioMinimo + " y el valor necesario en el tercer trimestre es: " + trimestre3.toFixed(2);
});
</script>
</body>
</html> --}}
