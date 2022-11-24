<?php

require_once 'config.php';

class Model{
    public $condb = new config;
    public $conn;
    public function OpenDb(){
			$this->conn = new mysqli($this->condb->hostname, $this->condb->username, $this->condb->password, $this->condb->db_name);
			if ($this->condb->connect_error) 
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}
	}

    public function AddRecord($obj){
            try{
                $this->OpenDb();
				$query=$this->conn->prepare("INSERT INTO PCLeads (Name, PhoneNumber, EmailID, LeadFor, LeadRefStr) VALUES (?, ?, ?, ?, ?, ?)");
				$query->bind_param("sssss",$obj->name, $obj->phoneNum, $obj->email, $obj->laedFor, $obj->leadRefStr);
				$query->execute();
				$query->close();
				$this->CloseDb();
            }
            catch (Exception $e) 
            {
                $this->CloseDb();	
                throw $e;
            }
    }

    public function ReadRecord($obj){
        try{
            $this->OpenDb();
			$query=$this->conn->prepare("SELECT * FROM PCLeads WHERE id=?");
			$query->bind_param("i", $obj->id);
			$query->execute();					
			$query->close();
			$this->CloseDb();
        }
        catch (Exception $e) 
        {
            $this->CloseDb();	
            throw $e;
        }
    }

    public function UpdateRecord($obj){
        try{
            $this->OpenDb();
			$query=$this->conn->prepare("UPDATE PCLeads SET Name=?, PhoneNumber=?, EmailID=?, LeadFor=?, LeadRefStr=? WHERE id=?");
			$query->bind_param("sssssi", $obj->name, $obj->phoneNum, $obj->email, $obj->laedFor, $obj->leadRefStr, $obj->id);
			$query->execute();					
			$query->close();
			$this->CloseDb();
        }
        catch (Exception $e) 
        {
            $this->CloseDb();	
            throw $e;
        }
    }

    public function DeleteRecord($obj){
        try{
            $this->OpenDb();
			$query=$this->conn->prepare("DELETE FROM PCLeads WHERE id=?");
			$query->bind_param("i", $obj->id);
			$query->execute();					
			$query->close();
			$this->CloseDb();
        }
        catch (Exception $e) 
        {
            $this->CloseDb();	
            throw $e;
        }
    }
    
    public function CloseDb(){
        $this->conn->close();
    }
}
