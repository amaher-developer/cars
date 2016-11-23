<?php

class Router{

    private $title;
    private $connection;
    public $records;
    
    public function __construct($module){
        
        $this->connection = Database::getConnection();
        $this->module = $module;
        
    }
    public function render(){
        if(!Globals::isAdmin()){
            $this->module = 'login';
        }
        $formSubmitted = ($_SERVER['REQUEST_METHOD'] == 'POST' || $_GET['delete']);
        if($_GET['returnTo'])
            $returnTo = $_GET['returnTo'];
        else
            $returnTo = $_SERVER['QUERY_STRING'];
        $modules = array(
            'login',
            'openclosed',
            'default',
            'admins',
            'adminAdd',
            'adminEdit',
            'adminMail',
            'adminGroups',
            'adminGroupAdd',
            'adminGroupEdit',
            'reports',
            'sendMail',
            'config',
            'places',
            'placeEdit',
            'placeAdd',
            'categories',
            'categoryEdit',
            'categoryAdd',
            'ads',
            'advAdd',
            'advEdit',
            'news',
            'newsAdd',
            'newsEdit',
            'contacts'
        );
        if(!in_array($this->module, $modules))
            $this->module = 'default';
        include Globals::controllers().'/'.$this->module.'.php';
        if(!$formSubmitted){
            $here = urlencode($_SERVER['QUERY_STRING']);
            $error = new Error($this->module);
            if($error->exists()){
                $errors = $error->getErrors();
                //  Show only one vague error to 
                //  NOT help hackers guess the right email or password
                if($this->module == 'login'){
                   @array_Splice($errors, 1);
                }
                foreach($error->getSuccessful() as $key => $val)
                    $default[$key] = $val;
            }elseif($error->getNoError()){
                $success = $error->getNoError();
            }
            $error->destruct();
        }
        $title = $this->title;
        $module = Globals::views().'/'.$this->module.'.php';
        $num = $_GET['num'];
        if($formSubmitted){
            ?><meta http-equiv="refresh" content="0; url='index.php?<?php echo $returnTo?>" /><?php
        }else
            include Globals::views().'/index.php';
    }
}