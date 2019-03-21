<?php
require '/var/www/dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully\n";
$selectDb = "OpenGun";

function testi($conn){

  mysqli_select_db($conn,"OpenGun");

  if(mysqli_query($conn, "DESCRIBE users")){
    echo "\033[31m User table EXISTS to drop table Type 'YES': WANING THIS WILL DELETE ALL DATA IN THE TABLE:\033[32m Type NO to stop this script:\032";
    echo "\033[0m \n";

    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);

    if(trim($line) == 'no'){
        echo "ABORTING!\n";
        exit;
    } else{
      $query = "drop table users";
      $result = mysqli_query($conn, $query);
      creatTable($conn);
      echo "\n";

}

}else {


creatTable($conn);
  echo "<br>creating table\n";


  $conn->close();

}//top if
}
testi($conn);

function creatTable($conn){


  $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  phone_num VARCHAR(15),
  reg_date TIMESTAMP
  )";
  if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

}


function creatUser($conn){


  $sql = "INSERT INTO users(firstname,lastname,email,password,phone_num)
  VALUES ('Script', 'user', 'user@gmail.com','password','+353861787872'),
  ('Script', 'user', 'user@gmail.com','password','null')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

}
creatUser($conn);





  ?>
