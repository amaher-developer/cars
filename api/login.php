<?php


// if page requested by submitting login form
if( isset( $_REQUEST["email"] ) && isset( $_REQUEST["password"] ) )
{
	$user_exist = get_user_by_email_and_password( $_REQUEST["email"], $_REQUEST["password"] );
	// user exist?
	if( $user_exist )
	{
		// set the user as connected and redirect him to a home page or something
		$_SESSION["user_connected"] = true;
		header("Location: http://www.example.com/user/home.php");
	}
	// wrong email or password?
	else
	{
		// redirect him to an error page
		header("Location: http://www.example.com/login-error.php");
	}
}
// else, if login page request by clicking a provider button
else if( isset( $_REQUEST["provider"] ) )
{
	// the selected provider
	$provider_name = $_REQUEST["provider"];
	try
	{
		// inlcude HybridAuth library
		// change the following paths if necessary
		$config   = dirname(__FILE__) . '/config.php';
		require_once( "Hybrid/Auth.php" );
		// initialize Hybrid_Auth class with the config file
		$hybridauth = new Hybrid_Auth( $config ); 
		// try to authenticate with the selected provider
		$adapter = $hybridauth->authenticate( $provider_name );
        //print_r($adapter->adapter->api->token);
		// then grab the user profile
		$user_profile = $adapter->getUserProfile();
        //echo $user_profile->identifier;
        
         //print_r($user_profile);
        // check if userid exist or not
        
        
        include '../prepare.php';
        $error = 0;
        
        $usertwitterid = $user_profile->identifier;
        $username = trim($user_profile->firstName.' '.$user_profile->lastName);
        $useraccesstoken = $adapter->adapter->api->token->secret;
        $userphoto = $user_profile->photoURL;
        $userurl = $user_profile->profileURL;
        $userdescription = $user_profile->description;
        
        
        
        $fetch = new Query('select * from users');
        $fetch->addCondition('usertwitterid = "'.$user_profile->identifier.'"');
        $fetch->prepare();
        $user = $fetch->getSingleRecord();
        
        if($user){
            if($adapter->adapter->api->token->key && $adapter->adapter->api->token->secret){
                Database::query('update users set 
                                        username = "'.trim($user_profile->firstName.' '.$user_profile->lastName).'", 
                                        useraccesstoken = "'.$adapter->adapter->api->token->key.'", 
                                        usertokensecret = "'.$adapter->adapter->api->token->secret.'",
                                        userphoto = "'.$user_profile->photoURL.'", 
                                        userurl = "'.$user_profile->profileURL.'",
                                        userdescription = "'.$user_profile->description.'",
                                        usergender = "'.$user_profile->gender.'"
                                        where userid = "'.$user['userid'].'"');
                $_SESSION['twitterlogin'] = 2;
                $_SESSION['usertwitterid'] = $usertwitterid;
                header("Location: ".Globals::$siteURL);
            }
        }else{
            Database::query('insert into users (usertwitterid, username, useraccesstoken, usertokensecret, userphoto, userurl, userdescription, usercityid, usercity, usercountry, usergender, userdoaatweet, useractivate)
                                         value ("'.$user_profile->identifier.'", "'.trim($user_profile->firstName.' '.$user_profile->lastName).'", "'.$adapter->adapter->api->token->key.'", "'.$adapter->adapter->api->token->secret.'", "'.$user_profile->photoURL.'", "'.$user_profile->profileURL.'", "'.$user_profile->description.'", "21", "الرياض", "ksa", "'.$user_profile->gender.'", "1", "1")');
            $_SESSION['twitterlogin'] = 1;
            $_SESSION['usertwitterid'] = $usertwitterid;
            header("Location: ".Globals::$siteURL.'settings');
        }
        
        
        
	}
	// something went wrong?
	catch( Exception $e )
	{
        
        $error = 1;
        $_SESSION['twitterlogin'] = 3;
        
	}
    if($_SESSION['twitterlogin'] == 3){
        include '../prepare.php';
        $_SESSION['twitterlogin'] = 3;
        header("Location: ".Globals::$siteURL);
    }
}

    ?>