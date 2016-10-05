<?php
class conn {
	//Create Connection
	public function connectDatabase(){
		$connect = mysqli_connect('localhost', 'root', '', 'db_final1');
		//Check Connection
		if(!$connect){
			die("Connection failed: " . mysqli_connect_error());
		}
		else {
			return $connect;
		}		
	}
}
?>
