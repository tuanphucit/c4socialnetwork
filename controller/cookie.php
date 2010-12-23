<?php
class cookie{
	public function __construct($userID){
		 setcookie("iduser",$userID, time()+3600);
	}
	//Khi register thi khoi tao cookie. Sau do moi khi can dung thi goi $id=$_COOKIE["iduser"];
}