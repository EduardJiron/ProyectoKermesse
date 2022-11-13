

<?php

class Conexion
{
    // Atributos
    private $pdo;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;

    // Metodos
    public function conectar()
	{
        $serverName = 'localhost';
        $dbName = 'webk';
        $userName = 'root';
        $pwd = 'Temporal2022+';

		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Se conecto a HR exitosamente!";

            return $this->pdo; 		        
		}
		catch(PDOException $e)
		{
            echo "La conexion fallo!";
			die($e->getMessage());
		}


    }

    public function desconectar()
    {
        try
		{
            $pdo = null;
            //echo "Se desconecto de HR exitosamente!";
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }

}

/* Testing */
$con = new Conexion();
$con->conectar();
$con->desconectar();