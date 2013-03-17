<?php
	include_once('../config.ini');
	$page = $_GET["page"];
	$query = "SELECT * from $tname";

		

	$result = pg_query($db, $query);
	$rows=array();
	while($row = pg_fetch_assoc($result)) {
		$rows[] = $row;
	}

	if($page=="main"){
		$rows = array_values(array_filter($rows,"mainpage"));
		// $item = search($rows,"subcategory","lace");
		// array_diff($rows, $item);
		// array_push($rows, $item[0]);
	}
	else if ($page=="category") {
		$upperlimit = $_GET["ulimit"];
		$lowerlimit = $_GET["llimit"];
		$subcategory = $_GET["sub"]; 
		$category = $_GET["cat"];
		
		if($subcategory == "Fit and Flare") $upperlimit = $upperlimit + 4;

		$difference = $upperlimit-$lowerlimit;
		$currentcount = 0;
		$rows = array_values(array_filter($rows,"subcategory"));
	}

	
	echo json_encode($rows);

	function mainpage($var) {
		//print_r($var);
		//print_r($var["itemid"]);
		//if($var["subcategory"]=="lace") return false;
		if($var["itemid"]==1) return true;
		else return false;
	}
	function subcategory($var) {
		global $currentcount, $difference, $upperlimit, $lowerlimit, $subcategory, $category;

		if($var["category"] == $category && $var["subcategory"] == $subcategory && $var["itemid"] <= $upperlimit && $var["itemid"] >= $lowerlimit) {
			$currentcount++;
			return true;
		} else
			return false;
	}
	function search($array, $key, $value)
	{
	    $results = array();

	    if (is_array($array))
	    {
	        if (isset($array[$key]) && $array[$key] == $value)
	            $results[] = $array;

	        foreach ($array as $subarray)
	            $results = array_merge($results, search($subarray, $key, $value));
	    }

	    return $results;
	}
?>