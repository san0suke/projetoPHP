<?php
class Conexao {
   
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    public $conn;
   
    public function __construct(PDO $conn = null){
    	if($conn != null) {
	        $this->conn = $conn;
    	} else {
	        $this->engine = 'mysql';
	        $this->host = 'localhost';
	        $this->database = 'projeto_phonegap';
	        $this->user = 'root';
	        $this->pass = '';
	        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
	        $this->conn = new PDO($dns, $this->user, $this->pass);
    	}
    } 
}