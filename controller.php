<?php

require_once 'PCLeadInfo.php';
require_once 'PCLeads.php';
require_once 'config.php';
require_once 'model.php';

class Controller{
    public $configObj = new config();
    public $modelObj = new Model();
    public $PCLeadsObj = new PCLeads();
    
    public function handler(){
        $action = isset($_GET['act']);
        switch ($action) {
            case 'add':
                $this->Add($this->modelObj, $this->PCLeadsObj);
                break;
            
            case 'read':
                $this->Read($this->modelObj, $this->PCLeadsObj);
                break;

            case 'update':
                $this->Update($this->modelObj, $this->PCLeadsObj);
                break;
            
            case 'delete':
                $this->Delete($this->modelObj, $this->PCLeadsObj);
                break;

            default:
                $this->List();
                break;
        }
    }

    public function Add($modelObj, $PCLeadsObj){
        $this->$modelObj($this->$PCLeadsObj);
    }

    public function Read($modelObj, $PCLeadsObj){
        $this->$modelObj($this->$PCLeadsObj);
    }

    public function Update($modelObj, $PCLeadsObj){
        $this->$modelObj($this->$PCLeadsObj);
    }

    public function Delete($modelObj, $PCLeadsObj){
        $this->$modelObj($this->$PCLeadsObj);
    }

    public function List(){
        echo '1. Add\n2. Read\n3. Update\n4. Delete';
    }
}