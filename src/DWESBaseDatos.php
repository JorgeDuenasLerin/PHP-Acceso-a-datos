<?php

/*

Clase para facilitar las conexiones y consultas a bases de datos

Por Jorge Dueñas Lerín

*/


class DWESBaseDatos {

    private $conexion = null;

    function __construct(
        $basedatos,
        $usuario  = 'root',
        $pass     = '1234',
        $motor    = 'mysql',
        $serverIp = 'localhost',
        $charset  = 'utf8mb4',
        $options  = null
    ) {
        $cadenaConexion = "$motor:host=$serverIp;dbname=$basedatos;charset=$charset";

        if($options == null){
            $options = [
              PDO::ATTR_EMULATE_PREPARES   => false, // La preparación de las consultas no es simulada
                                                     // más lento pero más seguro
              PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Cuando se produce un error
                                                                      // salta una excepción
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Cuando traemos datos lo hacemos como array asociativo
            ];
        }

        try {
          $this->$conexion = new PDO($cadenaConexion, $usuario, $pass, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('No ha sido posible la conexión');
        }
    }

    /*
      Permite ejecutar una consulta preparada con parámetros posicionales.
        Parámetros
          1º SQL
          2º ... parámetros o array con parámetros
    */
    function ejecutaPosicional(string $sql, ...$parametros) {
        if($parametros != null && is_array($parametros[0])) {
            $parametros = $parametros[0]; // Si nos pasan un array lo usamos como parámetro
        }

        print_r($parametros);
    }

    function __destruct(){
        $this->conexion = null;
    }
}
?>
