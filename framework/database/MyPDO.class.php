<?php
	/**
	* 
	*================================================================
	*framework/database/MyPDO.class.php
	*	
	*Database operation class
	*
	*================================================================
	*/

	class MyPDO extends PDO{
		private $host = null;
		private $port = null;
		private $db_name = null;
		private $user = null;
		private $db_pass = null;

    	/**
    	* 
     	* Constructor, to connect to database, select database and set charset
     	* 
     	* @param $config string configuration array
     	* 
     	*/

    	public function __construct($config = array()){
        	$this->host = isset($config['host']) ? $config['host'] : '';
        	$this->user = isset($config['user']) ? $config['user'] : '';
        	$this->db_pass = isset($config['password']) ? $config['password'] : '';
        	$this->db_name = isset($config['dbname']) ? $config['dbname'] : '';
        	$this->port = isset($config['port']) ? $config['port'] : '';
        	//$charset = isset($config['charset']) ? $config['charset'] : '';
        	parent::__construct('mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db_name, $this->user, $this->db_pass, null);
    	}//__construct

		/**
		* 
     	* Set charset
     	* 
     	* @access private
     	* 
     	* @param $charset string charset
     	* 
     	*/

    /*private function setChar($charest){

        $sql = 'set names '.$charest;

        $this->query($sql);

    }*/

    	/**
    	* 
     	* Execute SQL statement
     	* 
     	* @access public
     	* 
     	* @param $sql string SQL query statement
     	* 
     	* @return $result，if succeed, return resrouces; if fail return error message and exit
     	* 
     	*/

    	public function query($query){
    	    $args = func_get_args();
    	    array_shift($args);
    	    $reponse = parent::prepare($query);
    	    $reponse->execute($args);
    	    return $reponse;
    	}//query
    
    	public function insecureQuery($query){
    		return parent::query($query);
    	}//insecureQuery
    	
    	public function queryAllById($query){
    	    $args = func_get_args();
    	    array_shift($args);
    	    $reponse = parent::prepare($query);
    	    $reponse->execute($args);
    	    $list = array();
    	    while($o = $reponse->fetchObject())
    	        $list[] = $o;
    	        return $list;
    	}//query
    
    	/*
    	* 
    	* Get all records
    	* 
 		* @access public
 		* 
    	* @param $sql SQL query statement
    	* 
    	* @return $list an 2D array containing all result records
    	* 
    	*/
    	public function getAll($table){
    		$sql = "SELECT * FROM $table";
    		$result = $this->query($sql);
    		$list = array();
    		while($o = $result->fetch())
    			$list[] = $o;
    		return $list;
    	}//getAll
    	
    	
    	public function getOne($sql){
    	    
    	    $result = $this->query($sql);
    	    
    	    $row = $result->fetch();
    	    
    	    if ($row) {
    	        
    	        return $row[0];
    	        
    	    } else {
    	        
    	        return false;
    	        
    	    }
    	}
    	
    /**

     * Get the first column of the first record

     * @access public

     * @param $sql string SQL query statement

     * @return return the value of this column

     */
    	
    	

    /*public function getOne($sql){

        $result = $this->query($sql);

        $row = mysqli_fetch_row($result);

        if ($row) {

            return $row[0];

        } else {

            return false;

        }

    }*/

    /**

     * Get one record

     * @access public

     * @param $sql SQL query statement

     * @return array associative array

     */

    /*public function getRow($sql){

        if ($result = $this->query($sql)) {

            $row = mysqli_fetch_assoc($result);

            return $row;

        } else {

            return false;

        }

    }*/

    /**

     * Get the value of a column

     * @access public

     * @param $sql string SQL query statement

     * @return $list array an array of the value of this column

     */

    /*public function getCol($sql){

        $result = $this->query($sql);

        $list = array();

        while ($row = mysqli_fetch_row($result)) {

            $list[] = $row[0];

        }

        return $list;

    }*/


   

    /**

     * Get last insert id

     */

    /*public function getInsertId(){

        return mysqli_insert_id($this->conn);

    }*/

    /**

     * Get error number

     * @access private

     * @return error number

     */

    /*public function errno(){

        return mysqli_errno($this->conn);

    }*/

    /**

     * Get error message

     * @access private

     * @return error message

     */

    /*public function error(){

        return mysqli_error($this->conn);

    }*/

	}//class MyPDO
?>