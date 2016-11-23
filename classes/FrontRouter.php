<?php

class FrontRouter {

    private $title ;
    private $tree = array();
    private $keywords = array();
    private $description;
    private $module;
    private $subModule;
    private $connection;
    
    public function __construct($module, $subModule){
        //
        
        //$this->connection = Database::getConnection();
        
        
        $this->module = $module;
        $this->subModule = $subModule;  
    }
    public function render(){
    
        
        $isHomepage = false;
        $siteURL = Globals::$siteURL;
        $siteEmail = Globals::$siteEmail;
        
        $siteName = Globals::$siteName;
        $homeTitle = Globals::$homeTitle;
        
        $this->tree[] = array('url' => $siteURL, 'name' => $homeTitle);

    	$returnTo = $_GET['returnTo'];
        
        $modules = array(
            'account',
            'index',
            'default',
            'register',
            'login',
            'forgotPassword',
            'placeAdd',
            'placeEdit',
            'places',
            'placesInCategory',
            'place',
            'search',
            'news',
            'newsContent',
            'contact',
            'page'
        );
        if(WEBSITE_OPEN == false){
            $websiteIsClosed = CLOSED_MESSAGE;
            //include 'views/closed.php';
        }
        if(!in_array($this->module, $modules)){
            $this->module = 'default';
            $isHomepage = true;
        }
        
        $formSubmitted = ($_SERVER['REQUEST_METHOD'] == 'POST' && !$noSubmit);
        include Globals::controllers().'index.php';
        include Globals::controllers().$this->module.'.php';
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
                if($error->getSuccessful()){
                    foreach($error->getSuccessful() as $key => $val)
                        $default[$key] = $val;
                }
            }else{
                $success = $error->getNoError();
            }
            $error->destruct();
            unset($_SESSION['captcha']);
        }
        
        $mainKeywords = array('أنشطة المقطم', 'خدمات المقطم', 'خدمات', 'دليل المقطم');
          
        if($this->title)
            $printTitle = str_replace(' ', ', ', trim($this->title)).', ';
        
        if(Globals::$keywords)
            $this->keywords = Globals::$keywords.', '.implode(', ', $mainKeywords);
        else
            $this->keywords = $printTitle.implode(', ', $mainKeywords);
        if($this->title){
            $title = $this->title.' - '.$siteName;
            $comma = ',';
        }else{
            $title = $siteName;
            $comma = '';
        }
        if(Globals::$description)
            $this->description = trim(Globals::$description);
        else{
            $this->description = trim($this->title.$comma.' دليل المقطم هو موقع الكترونى يشمل كافه خدمات وانشطه واخبار المقطم مجانا');
        }
        $tree = $this->tree;
        $keywords = $this->keywords;
        $description = $this->description;
        $module = Globals::views().'/'.$this->module.'.php';
        if($formSubmitted){
            ?>
		<meta http-equiv="refresh" content="0; url=<?php echo $returnTo?>" /><?php
        }else
            include Globals::views().'index.php';
    }
}