<?php
class Database{
	public $host = dbHost;
	public $user = dbUser;
	public $pass = dbPass;
	public $dbname = dbName;
	
	
	public $con;
	public $error;
	
	public function __construct()
	{
		$this->connectDB();
	}	
	
	private function connectDB()
	{
		$this->con = new mysqli($this->host,$this->user,$this->pass,$this->dbname );
		if (!$this->con)
		{
			$this->error = "connection failed".this->con->connect_error;
			return false;
		}
	}
	// select or read database
	public function select($query)
	{
		$result = $this->con->query($query) or die ($this->con->error.__LINE__);
		if($result->num_rows > 0)
		{
			return $result;
		}
		else 
		{
			return false;
		}
	}
	// insert database
	public function insert($query)
	{
		$insert_row = $this->con->query($query) or die($this->con->error.__LINE__);
		if($insert_row)
		{
			header("Location:index.php?msg=".urlencode("Data inserted successfully."));
			exit();
		}
		else
		{
			die("Error: (".$this->con->errno.")".$this->con->error);
		}
	}
	// update database
	public function update($query)
	{
		$update_row = $this->con->query($query) or die($this->con->error.__LINE__);
		if($update_row)
		{
			header("Location:index.php?msg=".urlencode("Data updated successfully."));
			exit();
		}
		else
		{
			die("Error: (".$this->con->errno.")".$this->con->error);
		}
	}
	// delete database
	public function delete($query)
	{
		$delete_row = $this->con->query($query) or die($this->con->error.__LINE__);
		if($delete_row)
		{
			header("Location:index.php?msg=".urlencode("Data deleted successfully."));
			exit();
		}
		else
		{
			die("Error: (".$this->con->errno.")".$this->con->error);
		}
	}
}
?>