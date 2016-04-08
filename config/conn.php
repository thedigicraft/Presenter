<?php

############################################################
## Database Connections 
############################################################

	## Main Database.

try {
  $db['host'] = 'localhost';
  $db['name'] = 'presenter';
  $db['user'] = 'presenter';
  $db['pass'] = 'smallpox1';
  $dbc = new PDO("mysql:host=$db[host];dbname=$db[name]", "$db[user]", "$db[pass]");
  
}
catch(PDOException $e) {
    echo $e->getMessage();
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    
}
?>