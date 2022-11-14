

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
<<<<<<< HEAD
<<<<<<< HEAD
        $pwd = 'Temporal2022+';
=======
        $pwd = 'Usuario123.';


>>>>>>> 90154e26afb6214e828d7de21b45d0f0ab1dfe19
=======


        $pwd = 'Temporal2022+';
>>>>>>> 8bc2b9276c41689473c7d90360d6f331a69f94fa


       
		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "0";

            return $this->pdo; 		        
		}
		catch(PDOException $e)
		{
            //echo "-1";
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

