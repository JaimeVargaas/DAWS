<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

// si no hay sesion iniciada le manda a login
if (!$acceso->hayUsuario()) {
    header("Location: /aplicacion/acceso/login.php");
    exit;
}
$ubicacion = [
    "Index Principal" => "/index.php",
    "Personalizar" => "/aplicacion/personalizar/personalizar.php"
];

if(isset($_POST["cambiarColores"])) {
    setcookie("colorTexto",$_POST["letra"],time()+3600*24*30, "/");
    setcookie("colorFondo",$_POST["fondo"],time()+3600*24*30, "/");
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

// si le da al boton de cerrar sesion quita el usuario
if(isset($_POST["cerrarSesion"])) $acceso->quitarRegistroUsuario();

// si no tiene el permiso uno no puede entrar a la pagina
if(!$acceso->puedePermiso(1)){
     paginaError("No tienes permiso para acceder a esta página");
     exit;
}



// Dibuja la plantilla de la vista
inicioCabecera("Relación 8");
cabecera();
finCabecera();

inicioCuerpo("2 DAW - Relación 8");
cuerpo($acceso);
finCuerpo();



// **********************************************************
function comboFuente($acceso) {
    ?>
    <form action="" method="post">
        <label for="">Elige el color de letra</label>
        <select name="letra" id="letra">
            <option value="black">Negro</option>
            <option value="white">Blanco</option>
            <option value="blue">Azul</option>
            <option value="red">Rojo</option>
            <option value="yellow">Amarillo</option>
        </select> <br>
        <label for="">Elige el color de fondo</label>
        <select name="fondo" id="fondo">
            <option value="white">Blanco</option>
            <option value="black">Negro</option>
            <option value="blue">Azul</option>
            <option value="red">Rojo</option>
            <option value="cyan">Cyan</option>
            <option value="purple">Morado</option>
        </select>
        <br>
            <?php if($acceso->puedePermiso(2)) { ?>
         <input type="submit" value="cambiar los colores" name="cambiarColores">
         <?php } else {?>
            <p style="color: red;">No tienes permisos para modificiar los colores</p>
          <?php }?>  
    </form>
    <?php
}

function cabecera() {}
//vista
function cuerpo($acceso)
{   
    comboFuente($acceso);

?>  
    

<?php

}
