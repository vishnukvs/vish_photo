<?php
// app/config/facebook.php

// Facebook app Config 



return 
array( 
      // "base_url" the url that point to HybridAuth Endpoint (where index.php and config.php are found) 
	"base_url" => "http://photo.app/social/auth", 

	"providers" => array ( 
            // facebook
            "Facebook" => array ( // 'id' is your facebook application id
            	"enabled" => true,
            	"keys" => array ( "id" => "1534100980180833", "secret" => "4ae0bc29a8f69ab3b66e98330f4a9d25" ),
               "scope" => "email, user_about_me, user_birthday, user_hometown" // optional
               )
            )
	);
	