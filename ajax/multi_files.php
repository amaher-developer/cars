<?php

include '../prepare.php';

$failed = false;
$images = Array();
$upload_dir = "../dynamic/images/";
$rand = rand(1111, 9999);
if ($_SERVER['CONTENT_LENGTH'] < 8380000) {
    if (isset($_FILES['upload_files']) && $_FILES['upload_files']['error'] != 0) {

        foreach($_FILES['upload_files']['tmp_name'] as $key=>$value) {

            $file = $_FILES['upload_files']['name'][$key];
            // allow only image upload
            if(preg_match('#image#',$_FILES['upload_files']['type'][$key])) {
                if(!move_uploaded_file($value, $upload_dir.$rand.$file)) {
                    $failed = true;
                } else {
                    $images[] = "dynamic/images/".$rand.$file;
                    $arr_images[] = $rand.$file;

                    if(!isset($_SESSION['upload_images'])){
                        $_SESSION['upload_images'] = $arr_images;
                    }else{
                        if(!in_array($rand.$file, $_SESSION['upload_images'])){
                            $_SESSION['upload_images'] = array_merge($_SESSION['upload_images'], array($rand.$file));
                        }
                    }
                    //$_SESSION['upload_images'] = $arr_images;
                }
            } else {
                $images = array("error"=>"Sorry, only images are allowed to upload");
            }
        }
    }
} else {
    $images = array("error"=>"Sorry, Upload size exceed allowed upload size of 8MB");
}
if($failed == true) {
    $images = array("error"=>"Server Error<br/>Reported to Admin");
}
?>

<html>
<body>
<script type="text/javascript">
    window.parent.Uploader.done('<?php echo json_encode($images); ?>');
</script>
</body>
</html>


