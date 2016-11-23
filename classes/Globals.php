<?php
class Globals {
    static public $databaseServer = 'localhost';
    static public $databaseUserName = 'root';
    static public $databasePassword = '';
    static public $databaseName = 'cars';
    static public $siteName = '';
    static public $siteNameEn = '';
    static public $siteURL = 'http://localhost:8080/cars/';
    static public $siteDomain = 'cars.com';
    static public $siteEmail = '';
    static public $homeTitle = 'الرئيسية';
    static public $facebookAppID = '439353452911191';
    static public $facebookAppSecret = '10aebea7eee17de6fbb610d2de4af15d';
    static public $ticketStatus = array(
        'لم يتم فتح البطاقة من جهة الادارة بعد',
        'تم فتح البطاقة من جهة الادارة و جاري اعداد الرد',
        'تم الرد على البطاقة من جهة الادارة',
        'تم اغلاق البطاقة'
    );
    static public $keywords;
    static public $description;
    static public $zones = array('300 × 250', '600 × 250');
    static public $zones_width = array(300, 600);
    static public $zones_height = array(250, 250);
    static public $noPic = 'images/demo/property-thumbnail.jpg';
    static public $noPicAgent = 'images/agent_avatar.png';
    static public $noSidePic = 'images/demo/widget-thumbnail.jpg';
    
    // settings 
    static public $startDate = 1;
    static public $endDate = 2;
    static public $feeLateId = 1;
    
    
    
    static private $folder = '';
    static private $photos = '/dynamic';
    static private $images = '/images';
    static private $categoryPhotos = '/categories';
    static private $productPhotos = '/products';
    static private $storePhotos = '/stores';
    static private $brandPhotos = '/brands';
    static private $temp = '/temp';
    static private $controllers = 'controllers/';
    static private $views = 'views/';
    static public function noPic($image){
        return 'images/adv_default/'.$image;
    }
    static public function noSidePic($image){
        return 'images/adv_default/side_'.$image;
    }
    static public function HTMLRoot(){
        return Globals::$folder;
    }
    static public function HTMLPhotos(){
        return Globals::HTMLRoot().Globals::$photos;
    }
    static public function HTMLImages(){
        return Globals::HTMLRoot().Globals::$images;
    }
    static public function HTMLCategoryPhotos(){
        return Globals::HTMLPhotos().Globals::$categoryPhotos;
    }
    static public function HTMLProductPhotos(){
        return Globals::HTMLPhotos().Globals::$productPhotos;
    }
    static public function HTMLBrandPhotos(){
        return Globals::HTMLPhotos().Globals::$brandPhotos;
    }
    static public function HTMLStorePhotos(){
        return Globals::HTMLPhotos().Globals::$storePhotos;
    }
    static public function HTMLTemp(){
        return Globals::HTMLPhotos().Globals::$temp;
    }
    static public function PHPRoot(){
        return $_SERVER['DOCUMENT_ROOT'].Globals::$folder;
    }
  	static public function controllers(){
  		return Globals::$controllers;
  	}
  	static public function views(){
  		return Globals::$views;
  	}
    static public function PHPPhotos(){
        return Globals::PHPRoot().Globals::$photos;
    }
    static public function PHPImages(){
        return Globals::PHPRoot().Globals::$image;
    } 
	static public function PHPCategoryPhotos(){
        return Globals::PHPPhotos().Globals::$categoryPhotos;
    }
    static public function PHPProductPhotos(){
        return Globals::PHPPhotos().Globals::$productPhotos;
    }
    static public function PHPBrandPhotos(){
        return Globals::PHPPhotos().Globals::$brandPhotos;
    }
    static public function PHPStorePhotos(){
        return Globals::PHPPhotos().Globals::$storePhotos;
    }
    static public function PHPTemp(){
        return Globals::PHPPhotos().Globals::$temp;
    }
    static public function isAdmin(){
        return ($_SESSION['admin']);
    }
}
?>
