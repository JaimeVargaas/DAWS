<?php 

$mueble1 = new MuebleReciclado("Ropero","Ikea","Suecia",2024,"02/05/2024","01/01/2025",2,100.99, new Caracteristicas("Color","Blanco","Tipo","Habitacion"),60.0);
$mueble2 = new MuebleReciclado("Cabecera","Rapimueble","Alemania",2024,"11/02/2023","01/01/2024",1,40.95, new Caracteristicas("Color","marron","Tipo","Cama"),80.2);
$mueble3 = new MuebleReciclado("Comoda","Sanchez","China",2022,"23/02/2022","01/01/2024",0,123.99, new Caracteristicas("Color","Amarillo","Tipo","Decoracion"),25.3);
$mueble4 = new MuebleTradicional("Comoda","Sanchez","China",2022,"23/07/2022","01/01/2024",0,123.99,59.2,new Caracteristicas("Color","Amarillo","Tipo","Decoracion"),"A8923");
$mueble5 = new MuebleTradicional("Mesa","Ikea","Suecia",2025,"23/04/2025","01/01/2026",2,200.10,67.2,new Caracteristicas("Color","Negro","Tipo","Utilidad"),"Zhjk1234");

$muebles = [
    1=> $mueble1,
    2=> $mueble2,
    3=> $mueble3,
    4=> $mueble4,
    5=> $mueble5
];


?>