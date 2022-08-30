<?php
	if (!isset($_SESSION) == true) {
        header("location: View/index.php?status=1");
    }else{
    	header("location: login.php?status=0");
    }

?>