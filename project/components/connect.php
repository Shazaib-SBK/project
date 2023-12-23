<?php

$db_host = 'localhost'; // Hostname of your MySQL database server
$db_name = 'hotel_db'; // Name of your database
$db_user_name = 'ubuntu'; // Username to access the database
$db_user_pass = 'ubuntu'; // Password to access the database

try {
   // Connect to MySQL server
   $conn = new PDO("mysql:host=$db_host;", $db_user_name, $db_user_pass);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   // Create the database if it doesn't exist
   $conn->exec("CREATE DATABASE IF NOT EXISTS $db_name");
   
   // Switch to the newly created database
   $conn->exec("USE $db_name");
   
   // Define the path to your SQL file
   $sql_file = './hotel_db.sql'; // Replace with the actual path

   // Check if the SQL file exists
   if (file_exists($sql_file)) {
       // Read and execute the SQL file
       $sql = file_get_contents($sql_file);
       $conn->exec($sql);
       //echo "Database created and SQL file executed successfully";
   } else {
       //echo "SQL file not found";
   }
} catch(PDOException $e) {
   //echo "Connection failed: " . $e->getMessage();
}

   function create_unique_id(){
      $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $rand = array();
      $length = strlen($str) - 1;

      for($i = 0; $i < 20; $i++){
         $n = mt_rand(0, $length);
         $rand[] = $str[$n];
      }
      return implode($rand);
   }

?>