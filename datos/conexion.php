

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
        $dbName = 'dbkermesse';
        $userName = 'root';
<<<<<<< HEAD
        $pwd = 'Usuario123.';
=======

        $pwd = 'Temporal2022++';
>>>>>>> 550aadb5b0cba5aa45cb7f566216738277a928a0


       
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

