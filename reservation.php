<?php
class Reservation {
	public $user;
	public $resid, $starttime, $endtime, $quantity, $contentlistid;
	
	function __construct($user, $resid, $starttme, $endtime, $quantity, $contentlistid) {
		$this->user = $user;
		$this->resid = $resid;
		$this->starttime = $starttime;
		$this->endtime = $endtime;
		$this->quantity = $quantity;
		$this->contentlistid = $contentlistid;
	}
	
	public static function setReservation($starttime, $endtime, $quantity, $contentlistid, $user) {
		$qry = "INSERT INTO reservations (starttime,endtime,quantity,userid,contentlistid)
		VALUES ($starttime, $endtime, $quatity," . $user->userid . ", $contentlistid)";
		$res = mysql_query($qry);
	}
	
	//hent reservationer for bruger
	public static function getReservationUser($user) {
		$qry = "SELECT resid,reservations.quantity,room,starttime,endtime FROM reservations
		INNER JOIN users ON reservations.userid=users.userid
		INNER JOIN contentlist ON reservations.contentlistid=contentlist.contentlistid
		INNER JOIN locations ON contentlist.locationid=locations.locationid
		INNER JOIN items ON contentlist.itemid=items.itemid
		WHERE username='" . $user->username . "'";
		$res = mysql_query($qry);
		
		while ($data = mysql_fetch_assoc($res)) {
			$reservationList[] = new Reservation($user, $data['resid'], $data['starttime'], $data['endtime'], $data['qunatity'], $data['contentlistid']);
		}
		return $reservationList;
	}
	
	//hent reservationer for ting i tidsrum
	public static function getReservationTime($itemname, $location) {
		//xxxxxxxxxxx
		$res = mysql_query($qry);
		while ($data = mysql_fetch_assoc($res)) {
			$reservationList[] = new Reservation($user, $data['resid'], $data['starttime'], $data['endtime'], $data['qunatity'], $data['contentlistid']);
		}
		return $reservationList;
	}
	
	public static function deleteReservation($resid) {
		$qry = "DELETE FROM reservations WHERE resid=" . $resid;
		mysql_query($qry);
	}
}


?>