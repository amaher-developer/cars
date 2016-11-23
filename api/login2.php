<?php

//include 'Functions.php';


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
elseif( isset( $_REQUEST["provider"] ) )
{
	// the selected provider
	$provider_name = $_REQUEST["provider"];
	try
	{
		// inlcude HybridAuth library
		// change the following paths if necessary
		$config   = dirname(__FILE__) . '/config.php';
        //echo 'ddd';
		require_once( "Hybrid/Auth.php" );
 
		// initialize Hybrid_Auth class with the config file
		$hybridauth = new Hybrid_Auth( $config ); 
 
		// try to authenticate with the selected provider
		$adapter = $hybridauth->authenticate( $provider_name );
        
        print_r($adapter->adapter->api->token);
		// then grab the user profile
		$user_profile = $adapter->getUserProfile();
	}

	// something went wrong?
	catch( Exception $e )
	{
		//header("Location: http://www.example.com/login-error.php");
	}
    
    
     //print_r($_SESSION);
    print_r($user_profile);
	
     
    
    $twitter_status = array(
        "message" => "Hi there! this is just a random update to test some stuff"
        //,"image_path" => "https://pbs.twimg.com/profile_images/2104813353/IMG_0153a.jpg"
        //,"identifier" => "701792000513810432"
    );
    //$res = $adapter->setUserStatus( $twitter_status );
    //$res = $adapter->setUserStatus( $twitter_status);
    //print_r($res);
   
    // check if the current user already have authenticated using this provider before
	//$user_exist = get_user_by_provider_and_id( $provider_name, $user_profile->identifier );
 
	// if the used didn't authenticate using the selected provider before
	//
    // we create a new entry on database.users for him
	
    /*
    if( ! $user_exist )
	{
		create_new_hybridauth_user(
			$user_profile->email,
			$user_profile->firstName,
			$user_profile->lastName,
			$provider_name,
			$user_profile->identifier
		);
	}
    */
	// set the user as connected and redirect him
	$_SESSION["user_connected"] = true;
 
	//header("Location: http://www.example.com/user/home.php");
}


/*
    $config = array(
      "base_url" => "http://ftkarabia.com/twitter/hybridauth2/login.php?provider=facebook",
      "providers" => array (
        "Facebook" => array (
          "enabled" => true,
          "keys"    => array ( "id" => "1692978490944687", "secret" => "1f3c2e0aa39d9c501bc1b3e4be48dc47" ),
          "scope"   => "email, user_about_me, user_birthday, user_hometown", // optional
          "display" => "popup" // optional
    )));
 
    require_once( "Hybrid/Auth.php" );
 
    $hybridauth = new Hybrid_Auth( $config );
 
    $adapter = $hybridauth->authenticate( "Facebook" );
 
    $user_profile = $adapter->getUserProfile();
    
    */
    
    
    ?>