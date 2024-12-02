<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap"
            rel="stylesheet"
    />
</head>
<body class="m-0 vh-100 row justify-content-center align-items-center" >
    <div class="container" style="background-color: #282a35;">
        <div class="row m-0">
            <div class="col-5">
                <div class="card p-5 text-white vh-100 justify-content-center" style="background-color: #282a35;">
                    <h1 class="text-center" style="font-size: 35px">Iniciar sesión</h1>
                    <form action="controller/ControllerLogin.php" method="post">
                        <div class="form-group">
                            <label for="email" class="mb-1" style="font-size: 25px">Correo</label>
                            <input type="email" class="form-control mb-3" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="mb-1" style="font-size: 25px">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-50">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-7" style="background-image: url('assets/img/cunoc.png');">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>