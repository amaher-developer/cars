<?php
/**
 * @author maher
 * @copyright 2012
 */
class AgentEdit extends FormProcessor{
    private $id;
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'agentEdit';
        parent::__construct($module);
    }
    protected function excuteQuery(){
        
        $cityId = $this->successfulProcessed['cityId'];
        $email = $this->successfulProcessed['email'];
        $password = $this->successfulProcessed['password'];
        $account_type = $this->successfulProcessed['account_type'];
        $company_name = $this->successfulProcessed['company_name'];
        $company_address = $this->successfulProcessed['company_address'];
        $company_catId = $this->successfulProcessed['company_catId'];
        $company_tel = $this->successfulProcessed['company_tel'];
        $company_mobile = $this->successfulProcessed['company_mobile'];
        $company_url = $this->successfulProcessed['company_url'];
        $company_facebook = $this->successfulProcessed['company_facebook'];
        $company_twitter = $this->successfulProcessed['company_twitter'];
        $company_logo = $this->successfulProcessed['company_logo'];
        if($password)
            $addQuery2 = 'password = "'.$password.'",';
        $image = $this->successfulProcessed['image'];
        
        if($image){
            $addQuery = 'image = "'.$image.'",';
            
            $get = mysql_fetch_assoc(Database::query('select id, image from users where id = "'.$this->id.'" limit 1'));
            if($get['image']){
                unlink('dynamic/agents/'.$get['image']);
                unlink('dynamic/agents/thumb_'.$get['image']);
            }
            //copy('dynamic/agents/temp/'.$this->successfulProcessed['image'], 'dynamic/agents/'.$this->successfulProcessed['image']);
            //unlink('dynamic/agents/temp/'.$this->successfulProcessed['image']);
        }
        Database::query('update users set 
                            company_name = "'.$company_name.'",
                            cityId = "'.$cityId.'",
                            company_address = "'.$company_address.'",
                            company_mobile = "'.$company_mobile.'",
                            company_url = "'.$company_url.'",
                            company_facebook = "'.$company_facebook.'",
                            company_twitter = "'.$company_twitter.'",
                            company_catId = "'.$company_catId.'",
                            account_type = "'.$account_type.'",
                            '.$addQuery.'
                            '.$addQuery2.'
                            company_tel = "'.$company_tel.'"
                         where id = '.$this->id.'');
    }
    protected function createThumbnail($imageObject, $imageName, $folder){
        $saveThumbnail = $imageObject->saveWidthHeightRatio(
                $folder.'/thumb_'.$imageName.'.jpg',
                125,
                125  
        );

        return ($saveThumbnail);
    }
}
?>