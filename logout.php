<?php

	session_start();
	// destroy session
	if(session_destroy()){
		// redirect user the to the home login page
		header("Location:login.php");
	}
