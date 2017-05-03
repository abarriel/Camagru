<?php	
// include('connect_db.php');
session_start();
class user{
	private $login;
	private $img;
	private $comments;
	private $likes;
	public  $error;

	public function __construct(array $kwargs){
		if (array_key_exists('login', $kwargs))
			$this->login = $kwargs['login'];
		if (array_key_exists('picture', $kwargs))
			$this->picture = $kwargs['picture'];
		if (array_key_exists('comments', $kwargs))
			$this->comments = $kwargs['comments'];
		if (array_key_exists('likes', $kwargs))
			$this->likes = $kwargs['likes'];
		$this->date = date('Y-m-d H:i:s');
		$this->db_con = connect_db();
	}

	public function addCollage(){
		$stmt = $this->db_con->prepare("INSERT INTO data(login,picture,likes,comments) VALUES (:login, :picture, :likes, :comments)");
		$val = $stmt->execute(array(
			"login" => $this->login,
			"picture" => $this->picture,
			"likes" => $this->likes,
			"comments" => $this->comments
			));
	}

	public function getCollage(){
		$stmt = $this->db_con->prepare("SELECT * FROM data");
		$val = $stmt->execute();
		$imgs = [];
		while ($data = $stmt->fetch())
		{
			$imgs[] = $data['picture'];
			// $ok .= $data['picture'];
			// $ok .= "\n";
		}
		return $imgs;
	}
	public function addLike(){
		$stmt = $this->db_con->prepare("UPDATE data SET likes = likes + 1 WHERE picture=:picture");
		$val = $stmt->execute(array(
			"picture" => $this->picture,
			));
		return ($data['likes']);
	}

	public function unLike(){
		$stmt = $this->db_con->prepare("UPDATE data SET likes = likes - 1 WHERE picture=:picture AND likes >= 0");
		$val = $stmt->execute(array(
			"picture" => $this->picture,
			// "likes" => $data
			));
		return ($data['likes']);
	}

	public function __destruct(){}
}
?>