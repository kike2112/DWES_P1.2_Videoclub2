<?php
include_once "Videoclub.php"; // No incluimos nada más
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";


$vc = new Videoclub("Severo 8A");

//voy a incluir unos cuantos soportes de prueba
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es","16:9");
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9");
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

//listo los productos
$vc->listarProductos();

//voy a crear algunos socios
$vc->incluirSocio("Amancio Ortega");
$vc->incluirSocio("Pablo Picasso", 2);

$vc->alquilaSocioProducto(1,2);
$vc->alquilaSocioProducto(1,3);
//alquilo otra vez el soporte 2 al socio 1.
// no debe dejarme porque ya lo tiene alquilado
$vc->alquilaSocioProducto(1,2);
//alquilo el soporte 6 al socio 1.
//no se puede porque el socio 1 tiene 2 alquileres como máximo
$vc->alquilaSocioProducto(1,6);

//listo los socios
$vc->listarSocios();




//Pruebo a devolverlos
$vc->devuelveSocioProducto(1,2);
$vc->devuelveSocioProducto(1,3);
//devuelvo otra vez el soporte 2 al socio 1.
// no debe dejarme porque ya lo tiene devuelto
$vc->devuelveSocioProducto(1,2);
//devuelvo el soporte 6 al socio 1.
//no se puede devolver porque el socio 1 no tiene soporte 6
$vc->devuelveSocioProducto(1,6);

//listo los socios
$vc->listarSocios();