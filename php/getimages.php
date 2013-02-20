<?php
	$string =array();
	$rootpath = "images/";
	$items=array('handbags','clothes','shoes','accesories' ,'fitandflare');

	$img=array();
	$img["handbags"] = getItems($rootpath.$items[0]."/");
	$img["clothes"] = getItems($rootpath.$items[1]."/");
	$img["shoes"] = getItems($rootpath.$items[2]."/");
	$img["accesories"] = getItems($rootpath.$items[3]."/");
	$img["fitandflare"] = getItems($rootpath.$items[4]."/");
	//echo json_encode($img, JSON_PRETTY_PRINT);

	function getItems($filePath) {
		$dir = opendir($filePath);
		while ($file = readdir($dir)) {
		   if (eregi("\.png",$file) || eregi("\.jpg",$file) || eregi("\.gif",$file) ) { 
		   	$string[] = $file;
		   }
		}
		$rows = array();
		while (sizeof($string) != 0){
		  $img = array_pop($string);
		  $item = getBase64($filePath.$img);
		  $rows[] = $item;
		}
		//echo json_encode($rows, JSON_PRETTY_PRINT);
		return $rows;
	}
	function getBase64($path) {
		$imagedata = file_get_contents($path);
		$type = "image/jpeg";
		$base64 = 'data:' . $type . ';base64,' . base64_encode($imagedata);
		return $base64;
	}
?>