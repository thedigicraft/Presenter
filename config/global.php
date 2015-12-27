<?php

// Constants


$uri = $_SERVER['REQUEST_URI'];
$len = strlen($uri);
$uri = substr($uri, 1, $len);
$gkey = 'AIzaSyBDY9sQnOVZX-I0TCDNGQ4mSbj3U8ByksU';

DEFINE('H', 'http://'.$_SERVER['HTTP_HOST'].'/dev/Presenter/'); // Host
DEFINE('URI', $uri.'/'); // Host
DEFINE('GKEY', 'AIzaSyBDY9sQnOVZX-I0TCDNGQ4mSbj3U8ByksU'); // Google Key
DEFINE('BKEY', 'BxmA0605NC57MAlwdgNMh85uGZ61SaSPuvl6LAWJ'); // Biblesearch Key
DEFINE('UP', 'uploads/');  // Uploads Folder
DEFINE('AMZ_TAG', 'thedigcra-20');  // Amazon Affiliate ID

//DEFINE('GKEY', 'AIzaSyATSv9hdcASYiIhCudPoTcUNY_7F54qyFQ'); // Google API Key

?>