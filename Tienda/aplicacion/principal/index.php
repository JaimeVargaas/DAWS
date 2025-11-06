<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once "./almacenaDatos.php";


$ubicacion = [
    "Index Principal" => "/index.php",
];
$GLOBALS['ubicacion'] = $ubicacion;

global $muebles;

// Dibuja la plantilla de la vista
inicioCabecera("2DAW TIENDA");
cabecera();
finCabecera();

inicioCuerpo("2DAW TIENDA");
cuerpo($muebles);
finCuerpo();



// **********************************************************

function cabecera() {}
//vista
function cuerpo($muebles)
{
?>  

    <table>
        <tr>
            <th>Índice</th>
            <th>Tipo de mueble</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Material</th>
            <th>Fabricante</th>
        </tr>
    <?php
        foreach($muebles as $clave => $valor) {
            echo "<tr>";
                echo "<td>$clave</td>";
                echo "<td>". get_class($valor) ."</td>";
                echo "<td>". $valor->getNombre()."</td>";
                echo "<td>". $valor->getPrecio()."</td>";
                echo "<td>". $valor->getMaterialDescripcion()."</td>";
                 echo "<td>". $valor->getFabricante()."</td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>
    <br>
    <form action="" method="post">
        <label for="mueble">Introduce el mueble que quieras</label>
        <input type="text" name="mueble" id="mueble">
        <br>
        <input type="submit" value="Mostrar Mueble">
        <input type="submit" value="Modificar Mueble">
    </form>


<?php

}
