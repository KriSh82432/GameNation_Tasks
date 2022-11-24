<?php
class config
{
    public $hostname;
    public $username;
    public $password;
    public $db_name;
    function __construct() {
        $this->hostname = "";
        $this->username  = "";
        $this->password = "";
        $this->db_name = "";
    }
}
?>