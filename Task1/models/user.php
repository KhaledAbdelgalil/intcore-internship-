<?php
	include_once('Database.php');

	class user extends Database{
		

		public static function add($name,$email,$password) {
			$sql = "INSERT INTO users (name, email, password) 
         	 VALUES('$name', '$email', '$password')";
   		 	$statement = Database::$db->prepare($sql);
      		$statement->execute();
	}
//return assiocative array key=>value
public static function check_for_another_user($username,$email)
{
$user_check_sql = "SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1";
  $statement = Database::$db->prepare($user_check_sql);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}

public static function check_for_login($username,$password)
{
	$sql= "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $statement = Database::$db->prepare($sql);
     $statement->execute();
       $user = $statement->fetch(PDO::FETCH_ASSOC);
       return $user;
}
}
?>