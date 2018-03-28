<?php
	function passcode(){
		$day = date("d");$month = date("m");$year = date("y");
		$p=0;$d=1;$m=1;$y=1;
		$d = intval($day); $m = intval($month); $y = intval($year);
		$p = ($m * $m) + ($d * 7) + ($m + $d) + ($y * $d);
		$passcode = sprintf( "%'04d",substr($p,-4));
		return $passcode;
	}
?>