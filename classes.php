<?php
class User {
	public $userid;
	public $username;
	
	function __construct($userid, $username) {
		$this->userid = $userid;
		$this->username = $username;
	}

}

class Admin extends User {
	
}

//SLET???:
class Location {
	public $room;
	
	function __construct($room) {
		$this->room = $room;
	}
}

abstract class Reservation {
	
	public static function setReservation($starttime, $endtime, $quantity, $contentlistid, $user) {
		$qry = "INSERT INTO reservations (starttime,endtime,quantity,userid,contentlistid)
		VALUES ($starttime, $endtime, $quatity," . $user->userid . ", $contentlistid)";
		$res = mysql_query($qry);
	}
	
	//hent reservationer for bruger
	public static function getReservation($user) {
		//NB:p.t. står contentlist.shelflineid da column ikke renamed
		$qry = "SELECT resid,reservations.quantity,room,starttime,endtime FROM reservations
		INNER JOIN users ON reservations.userid=users.userid
		INNER JOIN contentlist ON reservations.contentlistid=contentlist.contentlistid
		INNER JOIN locations ON contentlist.locationid=locations.locationid
		INNER JOIN items ON contentlist.itemid=items.itemid
		WHERE username='" . $user->username . "'";
		
		//indsæt evt. getassoc loop, som omdanner til array
		
		$res = mysql_query($qry);
		return $res;
	}
	
	//hent reservationer for ting i tidsrum
	public static function getReservation($itemname, $starttime, $endtime) {
		//xxxxxxxxxxx
		$res = mysql_query($qry);
		return $res;
	}
	
	public static function deleteReservation($resid) {
		$qry = "DELETE FROM reservations WHERE resid=" . $resid;
		mysql_query($qry);
	}
	
	//method overloading on deleteReservation()?
	
}


class Item {
	public $name, $quantity, $location, $reusable;
	public $rows;
	
	function __construct($name, $quantity, $location, $reusable) {
		$this->name = $name;
		$this->quantity = $quantity;
		$this->location = $location;
		$this->resuable = $resuable;
		
		$qry = "SELECT items.name, contentlist.quantity, locations.room
		FROM items
		INNER JOIN contentlist ON items.itemid = contentlist.contentlistid
		INNER JOIN locations ON contentlist.locationid = locations.locationid
		WHERE items.name='" . $this->name . "'";
		$this->rows = mysql_query($qry);
	}
	
	public function isReusable() {
		return $resuseable;
	}
}


//DROP?
abstract class RowHandler {
	public static function row($res) {
		while ($data = mysql_fetch_assoc($foresp)) {
			//xxxx
		}
		return null;
	}
}


?>