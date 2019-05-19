<?php
session_start();

$db = mysqli_connect ( "", "", "" );
	  mysqli_set_charset( $db, 'utf8' );
	  mysqli_select_db( $db, "" ) or die ( "無法開啟MySQL伺服器連結！" );

