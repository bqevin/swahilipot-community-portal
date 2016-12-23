<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(email,password) 
		                                               VALUES(:umail, :upass)");

			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}

	public function update($name,$gender,$cartegory,$bio,$address,$website,$tel,$email)
	{
		try
		{			
			$stmt = $this->conn->prepare("UPDATE users SET name=:name, gender=:gender, cartegory=:cartegory, bio=:bio, address=:address, website=:website, tel=:tel WHERE email=:email ");
												  
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":gender", $gender);
			$stmt->bindparam(":cartegory", $cartegory);
			$stmt->bindparam(":bio", $bio);
			$stmt->bindparam(":address", $address);
			$stmt->bindparam(":website", $website);
			$stmt->bindparam(":tel", $tel);
			$stmt->bindparam(":email", $email);
			
	
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	// public function update_pass($oldpass,$newpass){
	// 	try{
	// 		$stmt=this->conn->prepare("UPDATE users SET password=:$newpass where password=:$oldpass");

	// 		$stmt->bindparam(":oldpass", $oldpass);
	// 		$stmt->bindparam(":newpass", $newpass);

	// 		$stmt->execute();
	// 		return $stmt;
	// 	}
	// 	catch(PDOException $e){
	// 		echo $e->getMessage;
	// 	}
	// }
	
	public function doLogin($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:umail ");
			$stmt->execute(array(':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>