<?php	
include('connect_db.php');
session_start();
class account{
	private $login;
	private $password;
	private $email;
	private $clef;
	private $date;
	private $db_con;
	public  $error;

	public function __construct(array $kwargs){
		if (array_key_exists('login', $kwargs))
			$this->login = $kwargs['login'];
		if (array_key_exists('password', $kwargs))
			$this->password = $kwargs['password'];
		if (array_key_exists('email', $kwargs))
			$this->email = $kwargs['email'];
		$this->date = date('Y-m-d H:i:s');
		$this->db_con = connect_db();
	}

	public function ifLoginTaken(){
		$stmt = $this->db_con->prepare("SELECT * FROM user_db WHERE login=:login");
		$stmt->execute(array(
			":login" => $this->login
			));
		$count = $stmt->rowCount();
		if ($count != 0)
		{
			$_SESSION['error'] = 2;
			header("Location: ../index.php");
			return 1;
		}
		return 0;
	}

	public function ifEmailTaken(){
		$stmt = $this->db_con->prepare("SELECT * FROM user_db WHERE email=:email");
		$stmt->execute(array(
			":email" => $this->email
			));
		$count = $stmt->rowCount();
		if ($count != 0)
			return 1;
		return 0;
	}

	public function ifGoodCle($cle, $email)
	{
		$stmt = $this->db_con->prepare("SELECT cle,email FROM user_db WHERE email=:email");
		$stmt->execute(array(
			":email" => $this->email
			));
		$fetched = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($fetched['cle'] === $cle)
			return 0;
		return 1;
	}

	public function resetPassword($email, $cle, $password)
	{
		$this->email = $email;
		if (!$this->ifEmailTaken())
			return 1;
		if ($this->ifGoodCle($cle,$email))
			return 2;
		$stmt = $this->db_con->prepare("UPDATE user_db SET password=:password WHERE email=:email");
		$stmt->execute(array(
			":password" => $password, 
			":email" => $email)
		);
		return 0;
	}

	public function ifGoodPassword($passwd, $login){
		$stmt = $this->db_con->prepare("SELECT  password, login FROM user_db WHERE login=:login");
		$stmt->execute(array(
			":login" => $login
			));
		$fetched = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($fetched['password'] === $passwd)
			return 0;
		return 1;
	}

	public function add(){
		try
		{
			if ($this->ifLoginTaken() || $this->ifEmailTaken())
				return 1;
			$stmt = $this->db_con->prepare("INSERT INTO user_db(login,email,password,creation_date) VALUES (:login, :email, :password, :creation_date)");
			$val = $stmt->execute(array(
				":login" => $this->login, 
				":email" => $this->email, 
				":password" =>$this->password,
				":creation_date"=>$this->date
				));
			if ($val)
			{
				$_SESSION['loggued_but_no_valid'] = $this->login;
				return 0;
			}
			else
				echo "Query could not execute !";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function Connect(){
		$stmt = $this->db_con->prepare("SELECT email, valid, password, login FROM user_db WHERE login=:login");
		$stmt->execute(array(
			":login" => $this->login
			));
		$count = $stmt->rowCount();
		if ($count == 0)
			return 1;
		$fetched = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!$fetched['valid'])
			return 2;
		if ($fetched['password'] !== $this->password)
			return 3;
		$_SESSION['loggued_on_user'] = $fetched['login'];
		return 0;
	}

	public function sendMail(){
		$cle = md5(microtime(TRUE)*100000);
		$stmt = $this->db_con->prepare("UPDATE user_db SET cle=:cle WHERE login=:login");
		$stmt->execute(array(
			":cle" => $cle, 
			":login" => $this->login
			));
		$sujet = "Activer votre compte - Camagru" ;
		$entete = "From: no_reply@camagru.com" ;
		$message = 'Bienvenue sur Camagru '.$this->login.'!

		Pour activer votre compte, veuillez cliquer sur le lien ci dessous
		ou copier/coller dans votre navigateur internet.

		http://localhost:8080/camagru/back/activation.php?login='.urlencode($this->login).'&cle='.urlencode($cle).'
		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';
		mail($this->email, $sujet, $message, $entete) ;
	}

	public function Activation($cle, $login){
		$stmt = $this->db_con->prepare("SELECT cle,valid FROM user_db WHERE login=:login");
		$stmt->execute(array(
			":login"=> $login
			));
		$count = $stmt->rowcount();
		if ($count == 0)
			return 1;
		$fetched = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($fetched['valid'])
			return 2;
		if ($fetched['cle'] == $cle)
		{
			$stmt = $this->db_con->prepare("UPDATE user_db SET valid=:valid WHERE login=:login");
			$stmt->execute(array(
				":valid" => true, 
				":login" => $login)
			);
			$_SESSION['loggued_on_user'] = $login;
			return 0;
		}
		return 3;
	}
	public function changeMail($mail, $login){
		$this->email = $mail;
		if ($this->ifEmailTaken())
			return 1;
		$stmt = $this->db_con->prepare("UPDATE user_db SET email=:email WHERE login=:login");
		$stmt->execute(array(
			":email" => $mail, 
			":login" => $login)
		);
		return 0;
	}

	public function changePassword($old, $new, $login){
		$old_pw = hash('sha256', $old);
		if($this->ifGoodPassword($old_pw, $login))
			return 1;
		$new_pw = hash('sha256', $new);
		$stmt = $this->db_con->prepare("UPDATE user_db SET password=:password WHERE login=:login");
		$stmt->execute(array(
			":password" => $new_pw, 
			":login" => $login)
		);
		return 0;
	}

	public function deleteAccount($login)
	{
		$stmt = $this->db_con->prepare("DELETE FROM user_db WHERE login=:login");
		$stmt->execute(array(
			":login" => $login
			));
	}

	public function newPassword($email)
	{
		$this->email = $email;
		if (!$this->ifEmailTaken())
			return 1;
		$stmt = $this->db_con->prepare("SELECT cle, email FROM user_db WHERE email=:email");
		$stmt->execute(array(
			":email" => $email
			));
			$fetched = $stmt->fetch(PDO::FETCH_ASSOC);
		$cle = $fetched['cle'];
		if (!isset($cle))
			return 2;
		$sujet = "Reset your password- Camagru" ;
		$entete = "From: no_reply@camagru.com" ;
		$message = 'You can reset your password!

		Pour reset your password please use this link.

		http://localhost:8080/camagru/index.php?login='.urlencode($email).'&cle='.urlencode($cle).'
		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';
		mail($this->email, $sujet, $message, $entete);
		return 0;
	}
	public function __destruct(){}
	public function getLogin(){return $this->login;}
	public function getEmail(){return $this->email;}
}
?>