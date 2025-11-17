<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$ubicacion = [
    "Index Principal" => "/index.php"
];
$GLOBALS['ubicacion'] = $ubicacion;

$textos = $_SESSION["textos"];

if(isset($_POST["registrar"])){
    $texto = new RegistroTexto($_POST["texto1"]);
    array_push($textos,$texto);
}
if(isset($_POST["limpiar"])) {
    $textos=[];
}

$_SESSION["textos"] = $textos;


// Dibuja la plantilla de la vista
inicioCabecera("Relación 8");
cabecera();
finCabecera();

inicioCuerpo("2 DAW - Relación 8");
cuerpo($textos);
finCuerpo();

function intrTexto() {
    ?>
        <form action="" method="post">
            <label for="">Introduce texto 1</label>
            <input type="text" name="texto1"> <br>
            <input type="submit" value="Registrar texto" name="registrar">
            <input type="submit" value="Limpiar todo" name="limpiar">
        </form>
    <?php 
}


// **********************************************************



function cabecera() {}
//vista
function cuerpo($textos)
{
    intrTexto();
?>  <br>
    <textarea name="" id="" style="margin-left: 10px; width:700px; height:500px;"><?php 
            foreach($textos as $valor) {
                echo $valor->getCadena() . ", " . $valor->getFechaHora() . "\n";
            }
        ?>
    </textarea>

<?php

}
