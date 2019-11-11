<?php

require("./src/DWESBaseDatos.php");

$db = new DWESBaseDatos(
              'test.sqlite3', 'sqlite'
          );

$db -> ejecuta("DROP TABLE IF EXISTS Respuesta");
$db -> ejecuta("CREATE TABLE Respuesta ( id MEDIUMINT NOT NULL,  titulo  varchar(120) NOT NULL )");


$db -> ejecuta(
          "INSERT INTO Respuesta ( id , titulo) VALUES (?,?)",
          1, "Tema de prueba"
        );

$db -> ejecuta(
          "INSERT INTO Respuesta ( id , titulo) VALUES (?,?)",
          [2, "Como array"]
        );

$db -> ejecuta("SELECT * FROM Respuesta");

$resultados = $db -> obtenDatos();

foreach($resultados as $fila) {
  print_r($fila);
}

 ?>
