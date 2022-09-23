<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" >
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css">   
</head>
<body>
    <h3><?=$encabezado?></h3>
    <form action="?ctrl=CtrlCliente&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">ID:</label>
            <input type="text" class="form-control"
                name="id" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Nombre:</label>
            <input type="text" class="form-control"
                name="nombre" value="" id="inputCliente">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Apellido:</label>
            <input type="text" class="form-control"
                name="apellido" value="" id="inputApellido">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">DNI:</label>
            <input type="text" class="form-control"
                name="DNI" value="" id="inputDNI">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Correo:</label>
            <input type="text" class="form-control"
                name="correo" value="" id="inputCorreo">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Direccion:</label>
            <input type="text" class="form-control"
                name="direccion" value="" id="inputDireccion">
        </div>
        <div class="col-md-6">
            <label for="inputCliente" class="form-label">Genero:</label>
            <input type="text" class="form-control"
                name="genero" value="" id="inputGenero">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlCliente" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</body>
</html>