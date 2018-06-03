<?php  
include("config.php");  
include("DbConnect.php");

function generate_chars()  
{  
 $num_chars = 5; //max length of random chars  
 $i = 0;  
 $my_keys = "123456789abcdefghijklmnopqrstuvwxyz"; //keys to be chosen from  
 $keys_length = strlen($my_keys);  
 $url  = "";  
 while($i<$num_chars)  
 {  
  $rand_num = mt_rand(1, $keys_length-1);  
  $url .= $my_keys[$rand_num];  
  $i++;  
 }  
 return $url;  
}  

function isUnique($chars)  
{  
	$db = new DbConnect();
	$q = "SELECT * FROM `urls` WHERE `unique_chars`='".$chars."'";  
	$result = $db->connection()->query($q);

	if ($result->num_rows > 0) {
		return false;
	}  
	else {
		return true;
	}
 
}

function isThere($url)  
{ 
 $db = new DbConnect();
 $q = "SELECT * FROM `urls` WHERE `url`='".$url."'";  
 $result = $db->connection()->query($q);
 
 if($result->num_rows > 0){
	 return true;
 }   
 else{
	return false;  
 }  
} 



function create($a)  
{  
 global $config; //make the $config array in the config.php, global  
 $chars = generate_chars(); //generate random characters  
/* We check the uniqueness of the characters. The following loop 
continues until it generates unique characters */  
 while( !isUnique($chars) )  
 {  
  $chars = generate_chars();  
 }  
  
 $url = trim($a);//trim it to remove whitespace  
 $url = mysql_real_escape_string($a);//sanitize data  
 
 $indikator = 0;
/* Now we check whether the url is already there in the database. */  
 
	 //url is not in the database 
	  $db = new DbConnect();
	  $q = "INSERT INTO `urls` (url, unique_chars) VALUES ('".$url."', '".$chars."')";  
	  $result = $db->connection()->query($q); //insert into the database  
	  $db->close();
	  if($result){
	  //ok, inserted. now get the data  
	   $db1 = new DbConnect();
	   $q = "SELECT * FROM `urls` WHERE `unique_chars`='".$chars."'";  
	   $result1 = $db1->connection()->query($q); 
	   $result1 = $result1->fetch_array(); 
	   $db1->close();
	   $indikator = 1;
	   //echo $config["domain"]."/".$result1["unique_chars"]; //$row[2] is where the random chars are  
	 }
	  else{
	  //problem with the database  
	   //echo "Sorry, some problem with the database. Please try again.";  
	   $indikator = 0;
	 }  

if ($indikator) {	 
 $db2 = new DbConnect();
 $q = "SELECT * FROM `urls` WHERE `unique_chars`='".$chars."'";
 $result = $db2->connection()->query($q);
 
 $result = $result->fetch_array();
 
 return $result['unique_chars'];
}
else {
	return "error";
	
}
 
}









?> 