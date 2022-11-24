<?php
class config
{
    public $hostname;
    public $username;
    public $password;
    public $db_name;
    function __construct() {
        //Enter your MySQL Database credentials
        $this->hostname = "";
        $this->username  = "";
        $this->password = "";
        $this->db_name = "";
    }
}
?>