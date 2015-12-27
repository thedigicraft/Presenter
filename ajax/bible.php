<?php
$q = $_GET['q'];
$q = str_replace(' ', '+', $q);
DEFINE('BKEY', 'BxmA0605NC57MAlwdgNMh85uGZ61SaSPuvl6LAWJ'); // Biblesearch Key
$token = BKEY;
//$url = 'https://bibles.org/v2/verses/eng-KJVA:Matthew.22.1.js';
$url = 'https://bibles.org/v2/passages.js?q[]='.$q.'&version=eng-KJVA';

//$url = 'https://bibles.org/v2/versions/eng-KJVA/books.js';
//$url = 'https://bibles.org/v2/versions.js?language=eng-US';
// Set up cURL
$ch = curl_init();
// Set the URL
curl_setopt($ch, CURLOPT_URL, $url);
// don't verify SSL certificate
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// Return the contents of the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Follow redirects
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// Set up authentication
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$token:X");

// Do the request
$response = curl_exec($ch);
curl_close($ch);
$array = json_decode($response, 1);
$text = $array['response']['search']['result']['passages'][0]['text'];
$text = strip_tags($text);

?>
<textarea class="form-control" style="height:400px;"><?=$text?></textarea>
