<?php
/**
 * @author maher
 * @copyright 2012
 */
class Functions{
    
    function calculate_duration($from = null, $to = null){
        if($from && $to){
            $time1 = explode(':', $from);
            $time2 = explode(':', $to);
            
            $duration1 = (($time1[0] * 60)+$time1[1]);
            $duration2 = (($time2[0] * 60)+$time2[1]);
            
            return ($duration2 - $duration1);
        }
    }
    
    function calculate_timeInMin($time = null){
        if($time){
            $time = explode(':', $time);
            $duration = (($time[0] * 60)+$time[1]);
            
            return ($duration);
        }
    }
    
    function calculate_dateTo($from = null, $priceId){
        if($from){
            switch ($priceId){
                case 0:
                    return ($from + (60*60*24*30*1));
                break;
                case 1:
                    return ($from + (60*60*24*30*3));
                break;
                case 2:
                    return ($from + (60*60*24*30*6+86400));
                break;
                default:
                    return ($from + (60*60*24*30*9+345600));
            }
        }
    }
    
    function calculate_priceId($priceId){
        //if($priceId){
            switch ($priceId){
                case 0:
                    return (60*60*24*30*1);
                break;
                case 1:
                    return (60*60*24*30*3);
                break;
                case 2:
                    return (60*60*24*30*6+86400);
                break;
                default:
                    return (60*60*24*30*9+345600);
            }
        //}
    }
    
    public function programDuration($priceId){
        if($priceId == 0){
            return '1 months';
        }else if($priceId == 1){
            return '3 months';
        }else if($priceId == 2){
            return '6 months';
        }else if($priceId == 3){
            return '9 months';
        }
    }
    public function programDurationSmall($priceId){
        if($priceId == 0){
            return '1m';
        }else if($priceId == 1){
            return '3m';
        }else if($priceId == 2){
            return '6m';
        }else if($priceId == 3){
            return '9m';
        }
    }
    
    public function paymentMethod($type = null, $subtype=null){
        // paymentMethod 1 cash
        // paymentMethod 2 and visaType = 0 visa
        // paymentMethod 2 and visaType = 1 mastercard
        // paymentMethod 2 and visaType = 2 amercain express
        // paymentMethod 2 and visaType = 3 depait card
    // paymentMethod 3 bank transfer
        if($type == 1){
            return 'Cash';
        }else if($type == 2){
            
            if($subtype == 1)
                return 'Visa (Master Card)';
            else if($subtype == 2)
                return 'Visa (American Express)';
            else if($subtype == 3)
                return 'Visa (Debit Card)';
            else
                return 'Visa (Visa)';
                
        }else if($type == 3){
            return 'Bank Transfer';
        }
    }
    
    public function moneyFormat($price){
        if($price){
            return number_format($price).'SAR';
        }
    }
    
    public function sendForm($email, $phone, $email_title, $email_message, $sms_message, $codes = null){
    
        
            $email = $email;
            $phone = $phone;
            $email_title = $email_title;  
            $email_message = $email_message;
            $sms_message = $sms_message;
            $policy = $policy;
            
            $codes = $codes;

            if($email && $phone && $email_title && $email_message && $sms_message){
                if($codes){
                    foreach($codes as $key=>$val)
                        $email_message = str_replace($key, $val, $email_message);
                }
                $form = new SendMail();
                $form->addPredefined('email', $email);
                $form->addPredefined('subject', $email_title); 
                $form->addPredefined('message', $email_message);
                $form->process($successMessage);
                
                foreach($codes as $key=>$val)
                    $sms_message = str_replace($key, $val, $sms_message);
                
                echo SendSMS::mysms($phone, $sms_message);
                //return true;
            }//else
                //return false;

    }
    
    
    
    
    public function imageExtentionToJPG($image = null){
        
        if($image){
              $info = pathinfo($image);
              return $info['filename'].'.'.'jpg';
          }
    }
    public static function place($record){
        $record = $record;
        
        $result = '';
        $result.= '<div class="cleaner-h2"></div>
                    
                    <div class="first-col">
                    
                    <a href="place-'.$record['id'].'.html">';
                    if($record['image']){
                        //$image = Functions::imageExtentionToJPG($image);
                        $image = $record['image'];
                        $result.= '<img class="img-dire" src="../dynamic/places/'.$image.'">';
                    }else{ 
                        $result.= '<img class="img-dire" src="../dynamic/categories/'.$record['categoryDImage'].'">';
                    }
                    $result.= '</a>
                    
                    <a href="place-'.$record['id'].'.html"><img class="icon" src="../dynamic/categories/'.$record['categoryLogo'].'"></a>
                    <a href="place-'.$record['id'].'.html"><h3>'.$record['name'].'</h3></a>
                    <p>'.$record['address'].'</p>';
                    
                    if($record['sign'])
                        $result.= '<p class="hidden-xs">'.$record['sign'].'</p>';
                    
                    $result.= '<!--<div class="star-rating">
                    <ul>
                    <li><img src="images/moktam-daili/star.png"></li>
                    <li><img src="images/moktam-daili/star.png"></li>
                    <li><img src="images/moktam-daili/star.png"></li>
                    <li><img src="images/moktam-daili/star-1.png"></li>
                    <li><img src="images/moktam-daili/star-1.png"></li>
                    </ul>
                    </div>--><!--end rating-->
                    
                    <div class="enter">
                    <a href="place-'.$record['id'].'.html"><img src="images/btn.png"></a>
                    </div><!--end enter-->
                    
                    <div class="social-media hidden-xs">
                    
                    ';
                    if($record['facebook'] || $record['url']){
                        $result.='<ul>';
                        if($record['facebook']){ 
                            $result.='<li><a href="'.$record['facebook'].'" target="_blank"><img src="images/social/facebook.png"></a></li>';
                         } 
                        if($record['url']){ 
                            $result.= '<li><a href="'.$record['url'].'" target="_blank"><img src="images/social/facebook.png"></a></li>';
                        }
                        $result.='</ul>'; 
                    }
                    $result.= '
                    
                    </div><!--end social-media-->
                    </div><!--end الاعلان-->';                	
        
        
                        
        
        return $result;   
    }
    
    public static function placeEdit($record){
        
        
        $record = $record;
        $result = '
                <div class="col-lg-4">
                    <div class="amakeny">';
                    
                    $result.= '

                    <a href="edit-place-'.$record['id'].'.html">';
                    if($record['image']){
                        //$image = Functions::imageExtentionToJPG($image);
                        $image = $record['image'];
                        $result.= '<img class="img-dire" src="../dynamic/places/'.$image.'">';
                    }else{ 
                        $result.= '<img class="img-dire" src="images/iStock_doctor with kid.jpg">';
                    }
                    $result.= '</a>
                    <a href="edit-place-'.$record['id'].'.html"><p class="name-icon">'.$record['name'].'</p></a>
                    <a href="edit-place-'.$record['id'].'.html"><h3></h3></a>

                    <div class="enter">
                    <a href="edit-place-'.$record['id'].'.html"><img src="img/btn.png"/></a>
                    </div><!--end enter-->
                    ';
                    $result.= '
                    </div><!--end الاعلان-->
                    </div>';                	
        
        return $result;   
        
        
    }
    
    public static function news($record){
        
        
        $record = $record;
        $result = '
                <div class="col-lg-4">
                    <div class="amakeny">';
                    
                    $result.= '

                    <a href="news-'.$record['id'].'.html">';
                    if($record['image']){
                        //$image = Functions::imageExtentionToJPG($image);
                        $image = $record['image'];
                        $result.= '<img class="img-dire" src="../dynamic/news/'.$image.'">';
                    }else{ 
                        $result.= '<img class="img-dire" src="images/iStock_doctor with kid.jpg">';
                    }
                    $result.= '</a>
                    <a href="news-'.$record['id'].'.html"><p class="name-icon maher-text-length">'.$record['title'].'</p></a>
                    <a href="news-'.$record['id'].'.html"><h3></h3></a>

                    <div class="enter">
                    <a href="news-'.$record['id'].'.html"><img src="img/btn.png"/></a>
                    </div><!--end enter-->
                    ';
                    $result.= '
                    </div><!--end الاعلان-->
                    </div>';                	
        
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
        $times = explode(':', $time);
        if((int)$times[0] <= 12)
            return intval($times[0]).':'.$times[1].'AM';
        else
            return intval($times[0]-12).':'.$times[1].'PM';
    }
}