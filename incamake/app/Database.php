<?php

class Database{
    
    public $isConnected;
    
    protected $database;
    //connecting to the database at first run of program with __construct
    public function __construct($host = DB_HOST,$user =DB_USER,$password = DB_PASS,$database =DB_NAME,$options = []){
        $this->isConnected = true;

        try{
            
            $this->database = new PDO("mysql:host={$host};dbname={$database}",$user,$password,$options);
            
            $this->database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        }catch(PDOException $e){
        
            throw new exception($e->getMessage());
        }
    }
    //disconnecting to the database
    public function Disconnect(){
        
        $this->isConnected = false;
        
        $this->database = null;
        
    }
    //getting all information of requested query
    public function GetRows($query,$params = []){
        try{
            
            $stmt = $this->database->prepare($query);
            
            $stmt->execute($params);
            
            return  $stmt->fetchAll();
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }
    //getting one row
    public function GetRow($query,$params = []){
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            
            return $stmt->fetch();
            
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }
    //inserting data into database of given query
    public function InsertData($query,$params = []){
        try{
            
            $stmt = $this->database->prepare($query);
            
            $stmt->execute($params);
            return  true;
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }
    //updating data into database of given query
    public function UpdateData($query,$params = []){
        try{
            
            $stmt = $this->database->prepare($query);
            
            $stmt->execute($params);
            return  true;
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }

    //checking for row compare
    public function Check($query,$params = []){
        try{
            $stmt  = $this->database->prepare($query);
            $stmt->execute($params);
            
            if($stmt->fetchColumn()){
                
                return true;
            }else{
                
                return false;
            }
        }catch(PDOException $e){
            throw new exception($e->getMessage());
        }
    }
    //getting total columns from the database
    public function GetSum($query,$params = []){
        
        try{
            
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            
            return $stmt->fetchColumn();
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }
        
    public function DeleteData($query,$params = []){
        
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            
            return true;
        }catch(PDOException $e){
            
            throw new exception($e->getMessage());
        }
    }
}
//defining Database() Class instance
$db  = new Database();

?>