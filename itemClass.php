<?php

class Item {
	public $id;
	public $name, $quantity, $location, $reusable; 
	
	function __construct($id) {
		
		$qry = "SELECT items.name, items.reusable, contentlist.quantity, locations.room
		FROM items
		INNER JOIN contentlist ON items.itemid = contentlist.contentlistid
		INNER JOIN locations ON contentlist.locationid = locations.locationid
		WHERE items.itemid='" . $id . "'";
		$results = mysql_query($qry);
		$resultsarr = mysql_fetch_assoc($results);
		
		$this->name = $resultsarr["name"];
		$this->quantity = $resultsarr["quantity"];
		$this->location = $resultsarr["room"];
		$this->resuable = $resultsarr["reusable"];
	}
}
?>
