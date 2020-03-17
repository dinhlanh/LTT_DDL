<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ex01</title>
</head>
<body>
	<h3>Đặng Đình Lanh</h3>
	<?php

		function val($string){
			if(strpos($string,"book") && strpos($string ,"restaurant ")==null) return 1;
			if(strpos($string,"restaurant") && strpos($string ,"book ")==null) return 1;
			return 0;
		}
		$val = 'book or restaurant';
		if(val($val)==1) echo "True";
		else echo "False";

		//test
		?>
</body>
</html>

