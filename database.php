<?php
<<<<<<< HEAD
class Database {
	private static $dbName = 'bookdb';
	private static $dbHost = 'localhost';
	private static $dbUsername = 'root';
	private static $dbUserPassword = 'apple610';
	private static $cont = null;
	
	public function __construct() {
		die ( 'Init function is not allowed' );
	}
	
	public static function connect() {
		// One connection through whole application
		if (null == self::$cont) {
			try {
				self::$cont = new PDO ( "mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword );
			} catch ( PDOException $e ) {
				die ( $e->getMessage () );
			}
		}
		return self::$cont;
	}
	public static function disconnect() {
		self::$cont = null;
	}
}
=======
	class Database
	{
		private static $dbName = 'address_book';
		private static $dbHost = 'localhost';
		private static $dbUsername = 'root';
		private static $dbUserPassword = 'apple610';
		
		private static $cont = null;
		
		public function __construct() 
		{
      	die('Init function is not allowed');
    	}
		public static function connect()
    	{
       // One connection through whole application
      	if ( null == self::$cont )
       	{     
        		try
        		{
          		self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        		}
        		catch(PDOException $e)
        		{
          		die($e->getMessage()); 
        		}
       	}
       	return self::$cont;
    	}
     
    	public static function disconnect()
    	{
        	self::$cont = null;
    	}

	}
>>>>>>> a711c95126ba14ca06504d34e4dd8e02b884afd1
?>

