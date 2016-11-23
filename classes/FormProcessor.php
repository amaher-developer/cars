<?php
/**
 * @author yehia
 * @copyright 2010
 */
class FormProcessor{
    protected $successful = array();
    protected $successfulProcessed = array();
    protected $error;
    public static function queryStringWithout($var){
        $pairs = @explode('&', $_SERVER['QUERY_STRING']);
        if($pairs){
            foreach($pairs as $pair){
                $namevalue = explode('=', $pair);
                if($namevalue[0] != $var)
                    $newQS[] = $pair;
            }
        }
        return @implode('&', $newQS);
    }
    public static function queryHTMLStringWithout($var){
        $pairs = @explode('&', $_SERVER['REQUEST_URI']);
        if($pairs){
            foreach($pairs as $pair){
                $namevalue = explode('=', $pair);
                if($namevalue[0] != $var)
                    $newQS[] = $pair;
            }
        }
        return @implode('&', $newQS);
    }
    public function __construct($module){
        $this->error = new Error($module);
    }
    private function accept($key){
        if(!$this->successful[$key]){
            $this->successful[$key] = $_POST[$key];
            $this->successfulProcessed[$key] = $_POST[$key];
        }
    }
    protected function columnsToInsert(){
        $keys = array();
        $vals = array();
        foreach($this->successfulProcessed as $key => $val){
            $keys[] = $key;
            $vals[] = $val;
        }
        $columns = implode(', ',$keys);
        $values = '"'.implode('", "', $vals).'"';
        return '('.$columns.') value ('.$values.')';
    }
    protected function columnsToUpdate(){
        $keys = array();
        foreach($this->successfulProcessed as $key => $val){
            $keys[] = $key.' = "'.$val.'"';
        }
        return implode(', ',$keys);
    }
    public function addBoolean($key, $error = null){
        if($error){
            $text = (int)$_POST[$key];
            if($text != false && $text != true){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
    }
    public function addText($key, $error = null, $min = 1, $max = null){
    	$cleanText = strip_tags($_POST[$key]);
        if($error){
            $text = new Text($cleanText);
            if($text->lengthIsLessThan($min) || ($max != null && $text->lengthIsMoreThan($max))){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        $this->successfulProcessed[$key] = $cleanText;
    }
    public function addAlphanumeric($key, $error = null, $min = 1, $max = null){
    	$cleanText = strip_tags($_POST[$key]);
        if($error){
            $text = new Text($cleanText);
            if($text->lengthIsLessThan($min) || ($max != null && $text->lengthIsMoreThan($max)) || !$text->isAlphanumeric()){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        $this->successfulProcessed[$key] = $cleanText;
    }
    public function addHTML($key, $error = null, $min = 1, $max = null){
        if($error){
            $text = new Text($_POST[$key]);
            if($text->lengthIsLessThan($min) || ($max != null && $text->lengthIsMoreThan($max))){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        $this->successfulProcessed[$key] = addslashes($_POST[$key]);
    }
    public function addArrayInString($key, $separated = ',', $error = null){
    	if(is_array($_POST[$key]))
            $arrayToString = implode($separated, $_POST[$key]);
        if($error){
            if($arrayToString == false){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        $this->successfulProcessed[$key] = $arrayToString;
    }
    public function addEmail($key, $error){
        $text = new Email($_POST[$key]);
        if(!$text->isEmail()){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function availableEmail($key, $error){
        $text = new Email($_POST[$key]);
        if(!$this->emailIsAvailable($text)){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addAvailable($key, $error){
        if(!$this->isAvailable($key)){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addNumber($key, $error = null, $min = null){
        if($error){
            $text = new Float($_POST[$key]);
            if(!$text->isFloat() || ($min != null && $text->isLessThan($min))){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
    }
    public function addURL($key, $error = null){
        $text = new URL($_POST[$key]);
        if(!$text->isURL()){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addURLYoutube($key, $error){
        $text = new URL($_POST[$key]);
        if(!$text->isURL()){
            $this->error->addFailure($key, $error);
        }else{
            $res = parse_url($_POST[$key]);
            if($res['host'] == 'www.youtube.com' && $res['query'])
                $this->accept($key);
            else
                $this->error->addFailure($key, $error);
        } 
    }
    /*
    public function addFilter($key, $form, $error=null){
        $url = $_POST[$key];
        if(preg_match($form, $url, $result))
        else
    }
    */
    public function addEquals($key, $value, $error){
        $text = new Text($_POST[$key]);
        if(!$text->equals($value)){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addConfirm($key, $key2, $error){
        $text = new Text($_POST[$key]);
        if(!$text->equals($_POST[$key2])){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addDate($key, $error){
        $date = new Date($_POST[$key]);
        if(!$date->isDayMonthYear()){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
            $this->successfulProcessed[$key] = $date->getTimestamp();
        }
    }
    public function addImage($key, $folder, $error = null){
        if($_FILES[$key]['tmp_name']){
            $file = $_FILES[$key]['tmp_name'];
        }else{
            $file = $_POST[$key];
        }
        $image = new Image($file);
        $imageName = Random::alphanumeric().'.'.$image->getExtension();
        $save = $image->saveOriginal($folder.'/'.$imageName);
        if($error){
            if(!$save){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save){
            $this->accept($key);
            $this->successfulProcessed[$key] = $imageName;
        }
    }
    public function addUpload($key, $folder, $error = null){
        $file = $_FILES[$key]['tmp_name'];
        $fileName = Random::alphanumeric().'.'.File::getExtension($_FILES[$key]['name']);
        if($file)
            $save = File::copyAndConfirm($file, $folder.'/'.$fileName);
        if($error){
            if(!$save){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save){
            $this->accept($key);
            $this->successfulProcessed[$key] = $fileName;
        }
    }
    public function addUploadArray($key, $i, $folder, $error = null){
        $file = $_FILES[$key]['tmp_name'][$i];
        $fileName = $_FILES[$key]['name'][$i].'.'.File::getExtension($_FILES[$key]['name'][$i]);
        if($file)
            $save = File::copyAndConfirm($file, $folder.'/'.$fileName);
        if($error){
            if(!$save){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save){
            $this->accept($key);
            $this->successfulProcessed[$key] = $fileName;
        }
    }
    public function addType($key, $type, $folder, $error = null){
        $file = $_FILES[$key]['tmp_name'];
        $type = strtolower($type);
        $extension = File::getExtension(strtolower($_FILES[$key]['name']));
        $fileName = Random::alphanumeric().'.'.$extension;
        if($extension == $type)
            $save = File::copyAndConfirm($file, $folder.'/'.$fileName);
        if($error){
            if(!$save){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save){
            $this->accept($key);
            $this->successfulProcessed[$key] = $fileName;
        }
    }
    public function addImageAndThumbnail($key, $folder, $error = null){
        if($_FILES[$key]['tmp_name']){
            $file = $_FILES[$key]['tmp_name'];
        }else{
            $file = $_POST[$key];
        }
        $image = new Image($file);
        $random = Random::alphanumeric();
        $imageName = $random.'.'.$image->getExtension();
        $save = $image->saveOriginal($folder.'/'.$imageName);
        $saveThumbnail = $this->createThumbnail($image, $random, $folder);
        if($error){
            if(!$save || !$saveThumbnail){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save && $saveThumbnail){
            $this->accept($key);
            $this->successfulProcessed[$key] = $imageName;
        }
    }
    public function addImageAndThumbnailArray($key, $i, $folder, $error = null){
        if($_FILES[$key]['tmp_name'][$i]){
            $file = $_FILES[$key]['tmp_name'][$i];
        }else{
            $file = $_POST[$key][$i];
        }
        $image = new Image($file);
        $random = Random::alphanumeric();
        $imageName = $random.'.'.$image->getExtension();
        $save = $image->saveOriginal($folder.'/'.$imageName);
        $saveThumbnail = $this->createThumbnail($image, $random, $folder);
        if($error){
            if(!$save || !$saveThumbnail){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        if($save && $saveThumbnail){
            $this->accept($key);
            $this->successfulProcessed[$key] = $imageName;
        }
    }
    public function addImploded($key, $glue, $error = null){
        if($error){
            if(!$_POST[$key]){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        if($_POST[$key]){
            foreach($_POST[$key] as $val){
                if($val)
                    $passed[] = $val;
            }
        }
        $this->successfulProcessed[$key] = @implode($glue, $passed);
    }
    public function addPredefined($key, $value){
        $_POST[$key] = $value;
        $this->accept($key);
    }
    public function process($noErrorMessage){
        if($this->error->exists()){
            $this->error->copySuccessful($this->successful);
        }else{
            $this->excuteQuery();
            $this->error->noError($noErrorMessage);
        }
    }
    public function addPredefinedText($key, $value){
        $_POST[$key] = $value;
        $cleanText = strip_tags($_POST[$key]);
        if($error){
            $text = new Text($cleanText);
            if($text->lengthIsLessThan($min) || ($max != null && $text->lengthIsMoreThan($max))){
                $this->error->addFailure($key, $error);
                return;
            }
        }
        $this->accept($key);
        $this->successfulProcessed[$key] = $cleanText;
    }
    public function addPredefinedEmail($key, $value, $error){
        $_POST[$key] = $value;
        $text = new Email($_POST[$key]);
        if(!$text->isEmail()){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
    public function addPredefinedURL($key, $value, $error){
        $_POST[$key] = $value;
        $text = new URL($_POST[$key]);
        if(!$text->isURL()){
            $this->error->addFailure($key, $error);
        }else{
            $this->accept($key);
        }
    }
}