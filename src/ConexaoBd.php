<?php 

namespace web3\prjsempog; 

use PDO;

class ConexaoBd 
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('pgsql:host=localhost;port=5432;dbname=sempog2024', 'sempog', 'sempog');
    }

    public function conexao(): PDO
    {
        return $this->pdo;
    }

}



?>