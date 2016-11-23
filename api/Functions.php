<?php

function setUserStatus( $status )
{
    if(is_array($status))
    {
        $message = $status["message"];
        $image_path = $status["image_path"];
        $identifier = $status["identifier"];
    }
    else
    {
        $message = $status;
        $image_path = null;
    }

    $media_id = null;

    # https://dev.twitter.com/rest/reference/get/help/configuration
    $twitter_photo_size_limit = 3145728;

    if($image_path!==null)
    {
        if(file_exists($image_path))
        {
            if(filesize($image_path) < $twitter_photo_size_limit)
            {
                # Backup base_url
                $original_base_url = $this->api->api_base_url;

                # Need to change base_url for uploading media
                $this->api->api_base_url = "https://upload.twitter.com/1.1/";

                # Call Twitter API media/upload.json
                $parameters = array('media' => base64_encode(file_get_contents($image_path)) );
                $response  = $this->api->post( 'media/upload.json', $parameters ); 
                error_log("Twitter upload response : ".print_r($response, true));

                # Restore base_url
                $this->api->api_base_url = $original_base_url;

                # Retrieve media_id from response
                if(isset($response->media_id))
                {
                    $media_id = $response->media_id;
                    error_log("Twitter media_id : ".$media_id);
                }

            }
            else
            {
                error_log("Twitter does not accept files larger than ".$twitter_photo_size_limit.". Check ".$image_path);
            }
        }
        else
        {
            error_log("Can't send file ".$image_path." to Twitter cause does not exist ... ");
        }
    }

    if($media_id!==null)
    {
        if($identifier)
            $parameters = array( 'status' => $message, 'media_ids' => $media_id);
        else
            $parameters = array( 'status' => $message, 'media_ids' => $media_id );
    }
    else
    {
        if($identifier)
            $parameters = array( 'status' => $message); 
        else
            $parameters = array( 'status' => $message);
    }
    $response  = $this->api->post( 'statuses/update.json', $parameters );
    
    // check the last HTTP status code returned
    if ( $this->api->http_code != 200 ){
        throw new Exception( "Update user status failed! {$this->providerId} returned an error. " . $this->errorMessageByStatus( $this->api->http_code ) );
    }
}

?>