<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un Ambiente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
        .alert {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="pre_container">
                        <div class="container">
                            <h1>REGISTRAR AMBIENTE</h1>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <form id="registroForm" action="{{ route('aula.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <div class="left-column">
                                            <label for="nombre">Nombre del Aula: *</label>
                                            <input type="text" id="nombre" name="nombre" required maxlength="40">
                                            <br>
                                            <label for="capacidad">Capacidad de Estudiantes: *</label>
                                            <input type="number" id="capacidad" name="capacidad" required>
                                            <span id="capacidadError" style="color: red; display: none;">La capacidad debe ser un número mayor o igual a 1</span>
                                            <br>
                                            <label for="data">Data: *</label>
                                            <select id="data" name="data" required>
                                                <option value="con">Cuenta con data</option>
                                                <option value="sin">No cuenta con data</option>
                                            </select>
                                            <br>
                                            <label for="pizarra">Pizarra: *</label>
                                            <select id="pizarra" name="pizarra" required>
                                                <option value="con">Cuenta con pizarra</option>
                                                <option value="sin">No cuenta con pizarra</option>
                                            </select>
                                        </div>
                                        <div class="right-column">
                                            <label for="wifi">Wifi: *</label>
                                            <select id="wifi" name="wifi" required>
                                                <option value="si">Cuenta con wifi</option>
                                                <option value="no">No cuenta con wifi</option>
                                            </select>
                                            <br>
                                            <label for="tipo_aula">Tipo de aula: *</label>
                                            <select id="tipo_aula" name="tipo_aula" required>
                                                <option value="normal">Aula normal</option>
                                                <option value="laboratorio">Aula laboratorio</option>
                                            </select>
                                            <br><br>
                                            <div class="Subir">
                                                <i class="fas fa-image msubir-imag"></i>
                                                <label for="imagen">Subir Imagen: *</label>
                                                <img src="{{ asset('images/sample_image.jpg') }}" alt="" class="sample-image">
                                                <input type="file" id="imagen" name="imagen" class="upload-input" accept=".jpg, .jpeg, .png" required onchange="validateFile(this, 'image')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button type="button" class="cancel-button" id="btnCan" onclick="confirmCancel()">Cancelar</button>
                                        <button type="submit" class="subir-form" id="submitBtn" onclick="return confirm('¿Estás seguro de registrar el ambiente?')">Registrar Ambiente</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmCancel() {
            if (confirm('¿Estás seguro de cancelar el registro?')) {
            }
        }

        document.getElementById('registroForm').addEventListener('submit', function(event) {
            var capacidad = parseInt(document.getElementById('capacidad').value);
            if (isNaN(capacidad) || capacidad < 1) {
                document.getElementById('capacidadError').style.display = 'block';
                event.preventDefault(); // Evitar que se envíe el formulario si hay un error
            }
        });
    </script>
    <style>
body {
    font-family: Arial;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.contenedor {
    width: 80%;
    margin: 0 auto;
}

.pre_container {
    background-color: #ddd;
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.input-group {
    display: flex;
    justify-content: space-between;
}

.input-group label {
    margin-bottom: 10px;
}

.input-group input[type="text"],
.input-group input[type="number"],
.input-group input[type="file"],
.input-group select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.input-group input[type="file"] {
    border: none;
    padding: 0;
}

.input-group input[type="file"].upload-input {
    padding: 8px 0;
}

.buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.cancel-button {
    background-color: #ff3333;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.cancel-button:hover {
    background-color: #e60000; 
}

.subir-form:hover {
    background-color: #45a049; 
}

.subir-form {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.left-column,
.right-column {
    flex: 0 0 48%;
    margin-left: 20px;
}

.Subir { 
    display: flex; 
    flex-direction: column;
    align-items: center;  
    margin-bottom: 10px; 
} 

.Subir i { 
    font-size: 40px; 
    color:black;
    margin-bottom: 5px; 
}

@media screen and (max-width: 768px) {
    .input-group {
        flex-direction: column;
    }

    .right-column {
        margin-left: 0;
    }

    .left-column,
    .right-column {
        width: 100%;
        margin: 0;
    }
}

    </@style>
</body>
</html>

