<?php

require("./src/DWESBaseDatos.php");

$db = DWESBaseDatos::obtenerInstancia();
$db->inicializa(
              'test.sqlite3', null, null, 'sqlite'
          );


$db -> ejecuta("DROP TABLE IF EXISTS Respuesta");
$db -> ejecuta("CREATE TABLE Respuesta ( id MEDIUMINT NOT NULL,  titulo  varchar(120) NOT NULL )");


$db -> ejecuta(
          "INSERT INTO Respuesta ( id , titulo) VALUES (?,?)",
          1, "Tema de prueba"
        );

echo "Insertado\n";
echo "Último ID: " . $db -> getLastId() . "\n";

$db -> ejecuta(
          "INSERT INTO Respuesta ( id , titulo) VALUES (?,?)",
          [2, "Como array"]
        );

echo "Insertado\n";
echo "Último ID: " . $db -> getLastId() . "\n";

$db -> ejecuta("SELECT * FROM Respuesta");

$resultados = $db -> obtenDatos();

foreach($resultados as $fila) {
  print_r($fila);
}

 ?>
