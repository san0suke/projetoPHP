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
	        $this->host = SERVIDOR;
	        $this->database = BASE_DADOS;
	        $this->user = LOGIN_DB;
	        $this->pass = SENHA_DB;
	        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
	        $this->conn = new PDO($dns, $this->user, $this->pass);
    	}
    } 
    
    /**
     * Replaces any parameter placeholders in a query with the value of that
     * parameter. Useful for debugging. Assumes anonymous parameters from
     * $params are are in the same order as specified in $query
     *
     * @param string $sql The sql query with parameter placeholders
     * @param array $params The array of substitution parameters
     * @return string The interpolated query
     */
    public function debugQuery($sql, $params) {
    	$keys = array();
    	$values = $params;
    
    	# build a regular expression for each parameter
    	foreach ($params as $key => $value) {
    		if (is_string($key)) {
    			$keys[] = '/'.$key.'/';
    		} else {
    			$keys[] = '/[?]/';
    		}
    
    		if (is_array($value))
    			$values[$key] = implode(',', $value);
    
    		if (is_null($value))
    			$values[$key] = 'NULL';
    	}
    	// Walk the array to see if we can add single-quotes to strings
    	array_walk($values, create_function('&$v, $k', 'if (!is_numeric($v) && $v!="NULL") $v = "\'".$v."\'";'));
    
    	$sql = preg_replace($keys, $values, $sql, 1, $count);
    
    	return $sql;
    }
}