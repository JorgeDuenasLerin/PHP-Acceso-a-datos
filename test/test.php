<?php

require("./src/DWESBaseDatos.php");

$db = new DWESBaseDatos(
              'foro'
          );

$db -> ejecutaPosicional("ASD", "asd", "ddd");
$db -> ejecutaPosicional("ASD", ["asd", "ddd"]);

 ?>
