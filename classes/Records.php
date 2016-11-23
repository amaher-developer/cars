<?php
/**
 * @author maher
 * @copyright 2012
 */
class Records{
    
    public function programDuration($priceId = null){
        if($priceId == 1){
            return '3 months';
        }else if($priceId == 2){
            return '6 months';
        }else if($priceId == 3){
            return '9 months';
        }
    }
    
    public function imageExtentionToJPG($image = null){
        if($image){
              $info = pathinfo($image);
              return $info['filename'].'.'.'jpg';
          }
    }
    public static function record($id, $path, $image, $link = null, $title = null, $content = null, $views = null, $i = null, $records = null, $count = null){
        $result = '';
        $records_num = count($records);
        if($i == $records_num){$last = 'extra_last extra_last_p';}
        
                        	
                        
        $result.= '<li>';
        if($image){
            //$image = Records::imageExtentionToJPG($image);
            $result.= '<a href="'.$link.'"><img src="dynamic/'.$path.$image.'" width="300" height="162" alt="'.$title.'" class="alignleft"></a>';
        }else{ 
            $result.= '<a href="'.$link.'"><img src="'.Globals::$noPic.'" width="300" height="162" title="'.$title.'" alt="'.$title.'" class="alignleft"></a>';
        }
        $result.= '<h6 class="regular"><a href="'.$link.'">'.$title.'</a></h6>';
        $result.= '<span class="meta">26 May, 2013.   //   <a href="#">World News.</a>   //   <a href="#">No Coments.</a></span>';
        $result.= '<p>'.$content.'</p>';
        
        /*
        if($_GET['p'] == 'icategories'){
            $pname = '<a href="'.$link.'" class="comments">'.$count.' عدد الصور</a>';
        }else if($_GET['p'] == 'vcategories'){
            $pname = '<a href="'.$link.'" class="comments">'.$count.' عدد الفيديوهات</a>';
        }else if($_GET['p'] == 'sections'){
            $pname = '<a href="'.$link.'" class="comments">'.$count.' عدد المعلومات</a>';
        }else if($_GET['p'] == 'informations' || $_GET['p'] == 'default' || !$_GET['p']){
            $pname = '<a href="'.$link.'" class="comments">'.$views.' عدد المشاهدات</a>';
        }else{
            $pname = '<a href="'.$link.'" class="comments">'.$count.' عدد الأقسام</a>';
        }
        */
        $result.= '</li>'; 
        return $result;   
    }
    
    public static function recordOfImage($id, $path, $image, $content = null, $views = null, $date = null, $i = null, $records = null){
        $result = '
                    <img src="'.$path.'thumb_'.$image.'" style="display: inline-block;width: 192px;height: 128px;" rel="group1" data-glisse-big="'.$path.$image.'" class="tl" title="'.$content.'" alt="'.$content.'" />
                    <p title="'.$content.'" style="text-overflow: ellipsis;
                    white-space: nowrap;
                    width: 14em;
                    overflow: hidden;direction:rtl;">'.$content.'</p>
                    ';
        
        return $result;
    }
    
    public static function recordOfVideo($id, $path, $video, $content = null, $views = null, $date = null, $i = null, $records = null){
        $url = $video;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $videoId = $my_array_of_vars['v'];    
        
        // set feed URL
        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/'.$videoId.'?v=1';
        
        // read feed into SimpleXML object
        $sxml = simplexml_load_file($feedURL);
        
        // this get the video title
        $videoTitle = $sxml->title;
        $videoContent = $sxml->content;
        $videoPublished = $sxml->published;
        
        $result = '<div style="float:right;padding-left:10px;">
                   <a style="padding-bottom: 10px;" href="video/'.$videoId.'">
                   <img src="http://img.youtube.com/vi/'.$videoId.'/mqdefault.jpg" height="100" width="178" alt="'.$videoTitle.'" title="'.$videoTitle.'" />
                   </a>
                   <p title="'.$videoTitle.'" style="text-overflow: ellipsis;
                    white-space: nowrap;
                    width: 10em;
                    overflow: hidden;direction:rtl;">'.$videoTitle.'</p></div>';
        
        return $result;
    }
    
    public static function recordOfSideVideo($id, $path, $video, $content = null, $views = null, $date = null, $i = null, $records = null){
        $url = $video;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $videoId = $my_array_of_vars['v'];    
        
        $result = '<div class="img_box popular first">
                        <figure><a class="lightbox-video" href="'.$video.'" data-gal="prettyPhoto"><img src="http://img.youtube.com/vi/'.$videoId.'/1.jpg" width="117" height="68" alt=""></a></figure>
                        <div><a href="'.$video.'">'.$content.'</a></div>
                	</div>';
        return $result;
    }
    
    public static function recordOfSideImage($id, $path, $image, $content = null, $views = null, $date = null, $i = null, $records = null){
        $url = $video;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $videoId = $my_array_of_vars['v'];    
        
        $result = '<div class="img_box popular first">
                        <figure><a class="lightbox-video" href="'.$image.'" data-gal="prettyPhoto"><img src="dynamic/photos/'.$image.'" width="117" height="68" alt=""></a></figure>
                        <div><a href="'.$image.'">'.$content.'</a></div>
                	</div>';
        return $result;
    }
    
    public function recordOnMap($id, $image, $title){
        return '<br/><div><a href="estate-'.$id.'.html" title="'.$title.'"><img src="'.$image.'" width="210" height="137" alt="'.$title.'" title="'.$title.'" /></a><h6 style="white-space:nowrap;width:210px;overflow:hidden;text-overflow:ellipsis;"><br/><a href="estate-'.$id.'.html" style="color:#444444;font-size:14px;"><span>'.$title.'</a></h6><p><a href="estate-'.$id.'.html">تفاصيل...</a></p>';
    }
    public function searchById($id, $array) {
       if(is_array($array) && $id){
           foreach ($array as $key => $val) {
               if ($val['id'] == $id) {
                   return $val;
               }
           }
       }
       return null;
    }
    public function searchByNameEn($name, $array) {
       if(is_array($array) && $name){
           foreach ($array as $key => $val) {
               if ($val['name_en'] == $name) {
                   return $val;
               }
           }
       }
       return null;
    }
    public function strToURL($val) {
       if($val){
           return str_replace(' ', '-', strtolower(trim($val)));
       }
       return null;
    }
    public function array_random($list, $num = null) { 
      if (!is_array($list)) return $list; 
    
      $keys = array_keys($list); 
      
      if($num){
        $keys = array_rand($keys, $num);
      }else{
        shuffle($keys); 
      }
      
      $random = array(); 
      foreach ($keys as $key) { 
        $random[$key] = $list[$key]; 
      }
      return $random; 
    }
    public function crop_text($content, $num = null){
        if($num)
            $result = implode(' ', array_slice(explode(' ', $content), 0, $num));
        return $result;
    } 
    public function time_form($time = null){
        if((int)$time <= 12)
            return ((int)$time).' AM';
        else
            return ((int)$time-12).' PM';
    }
}