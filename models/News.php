<?php 

class News{
	
	public static function getNewsItemById($id){
		$id = intval($id);
		
		if($id){
			/*$host = 'localhost';
			$dbname = 'mvc';
			$user = 'root';
			$password = '';
			$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/

			$db = Db::getConnection();

			$result = $db->query('SELECT * from news WHERE id=' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}
		
	}
	public static function getNewsList(){
		/*$host = 'localhost';
		$dbname = 'mvc';
		$user = 'root';
		$password = '';
		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		*/
		$db = Db::getConnection();

		$newsList = array();

		$result = $db->query('SELECT id, title, description from news ORDER BY date DESC LIMIT 5');

		$i = 0;

		while($row = $result->fetch()){
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['description'] = $row['description'];
			$i++;
		}

		return $newsList;


	}
}