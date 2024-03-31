<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 2rem;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #666;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #cancelConfirmation {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 2;
        }
        #cancelConfirmation .dialog {
            background-color: #fff;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }
        #cancelConfirmation button {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
    <title>Formulario de Registro con Confirmación</title>
    <script>
        function showCancelConfirmation() {
            document.getElementById('cancelConfirmation').style.display = 'block';
        }

        function hideCancelConfirmation() {
            document.getElementById('cancelConfirmation').style.display = 'none';
        }

        function cancelRegistration() {
            hideCancelConfirmation();
            // Redireccionar a la página principal
            window.location.href = '#';
        }
    </script>
</head>
<body>
    <nav class="container-fluid">
        <ul>
            <li><strong>Portal Educativo</strong></li>
        </ul>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>
    <main class="container">
        <div class="form-container">
            <h1>Registro de Usuario</h1>
            <form action="/usuarios/registro" method="POST">

            <!--<form action="{{ route('usuarios.store') }}" method="POST">  -->

                @csrf <!-- Importante para proteger tu formulario con Laravel -->
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required maxlength="30">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required maxlength="30">

                <label for="correo_institucional">Correo Institucional:</label>
                <input type="email" id="correo_institucional" name="correo_institucional" required maxlength="50">

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

                <label for="cargo_institucion">Cargo en la Institución:</label>
                <input type="text" id="cargo_institucion" name="cargo_institucion" required maxlength="50">

                <label for="ci">C.I.:</label>
                <input type="text" id="ci" name="ci" required maxlength="10">

                <label for="celular">Celular:</label>
                <input type="tel" id="celular" name="celular" maxlength="10">

                <button type="submit">Enviar Solicitud</button>
                <button type="button" onclick="showCancelConfirmation()">Cancelar</button>
            </form>
        </div>
    </main>
    <div id="cancelConfirmation">
        <div class="dialog">
            <p>¿Estás seguro de cancelar el registro?</p>
            <button onclick="cancelRegistration()">Sí, cancelar</button>
            <button onclick="hideCancelConfirmation()">No</button>
        </div>
    </div>
    <footer class="container">
        <small>&copy; 2024 Portal Educativo. Todos los derechos reservados.</small>
    </footer>
</body>
</html>