<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?=$titulo?></title> 
    <!-- CSS only --> 
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" > 
    <link rel="stylesheet" href="recursos/icons/bootstrap-icons.css"> 
</head> 
<body> 
    <h1><?=$encabezado?></h1> 
    <a href="?ctrl=CtrlModelo_ram&accion=nuevo" class="btn btn-primary"> 
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Modelo ram
    </a> 
    <br><br> 
    <table class="table table-striped"> 
        <tr> 
            <th>Id</th> 
            <th>ram</th>               
            <th>Modelo</th> 
            <th>Operaciones</th> 
        </tr> 
        <?php 
        if (is_array($datos)) 
        foreach ($datos as $c) { ?> 
        <tr> 
            <td><?=$c["idmodelo_ram"]?></td> 
            <td><?=$c["ram"]?></td> 
            <td><?=$c["modelo"]?></td> 
            <td> <a href="?ctrl=CtrlModelo_ram&accion=editar&id=<?=$c["idmodelo_ram"]?>"> 
                <i class="bi bi-pencil-square"></i> Editar </a> 
                / 
                <a href="?ctrl=CtrlModelo_ram&accion=eliminar&id=<?=$c["idmodelo_ram"]?>"> 
                <i class="bi bi-trash"></i> Eliminar </a> 
            </td> 
        </tr> <?php } ?> 
    </table> <br><a href="?" class="btn btn-primary"> 
        <i class="bi bi-arrow-90deg-left"></i> 
        Retornar</a> 
</body> 
</html>