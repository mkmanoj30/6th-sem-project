<?php
// 'project' object
class Project{
 
    // database connection and table name
    private $conn;
    private $table_name = "projects";
 
    // object properties
    public $id;
    public $name;
	public $creater_name;
    public $location;
    public $contact_number;
    
    public $email1; // if any to contact
   
    public $members; //required members if any
	public $requirements;
    public $start; // started
    public $ending; // expected deadline
	public $created;
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
	// create new project record
function create(){
 
   $this->created=date('Y-m-d H:i:s');
 
    // insert query
    $query = "INSERT INTO `projects` (
	`name`, `creater_name`, `location`,`contact_number`, `email`, `members`, `requirements`, `start`, `ending`, `created`) 
	VALUES (:name,:creater_name,:location,:contact_number,:email1,:members,:requirements,:start,:ending,:created)";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->creater_name=htmlspecialchars(strip_tags($this->creater_name));
	$this->location=htmlspecialchars(strip_tags($this->location));
	$this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
    $this->email1=htmlspecialchars(strip_tags($this->email1));
    
    $this->members=htmlspecialchars(strip_tags($this->members));
    $this->requirements=htmlspecialchars(strip_tags($this->requirements)); 

  

 
    // bind the values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':creater_name', $this->creater_name);
	$stmt->bindParam(':location', $this->location);
    $stmt->bindParam(':contact_number', $this->contact_number);
    $stmt->bindParam(':email1', $this->email1);
    $stmt->bindParam(':members', $this->members);
    $stmt->bindParam(':requirements', $this->requirements);
    $stmt->bindParam(':start', $this->start);
    $stmt->bindParam(':ending', $this->ending);
    $stmt->bindParam(':created', $this->created);
 
    // execute the query, also check if query was successful
     if($stmt->execute()){
        return true;
    }else{
        $this->showError($stmt);
        return false;
    } 
	
 
}
public function showError($stmt){
    echo "<pre>";
        print_r($stmt->errorInfo());
    echo "</pre>";
}
// read all user records
function readAll($from_record_num, $records_per_page){
 
    // query to read all user records, with limit clause for pagination
    $query = "SELECT
                id,
				name,
				location,
                contact_number,
				email,
				members,
				requirements,
                created
            FROM " . $this->table_name . "
            ORDER BY id DESC
            LIMIT ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind limit clause variables
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values
    return $stmt;
}
// used for paging users
public function countAll(){
 
    // query to select all user records
    $query = "SELECT id FROM " . $this->table_name . "";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // return row count
    return $num;
}
}