<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exercise</title>
</head>
<body>
	<?php

	//Check chuỗi
	function checkValidString($str)
		{
		    $Book = strpos($str, 'book');
		    $Restaurant = strpos($str, 'restaurant');

		    if (($Book !== false && $Restaurant === false) || ($Book === false && $Restaurant !== false)) {
		        return true;
		    }
		    return false;
		}

		$File1 = './file1.txt';
		$File2 = './file2.txt';
		//Check file
		if (file_exists($File1) && file_exists($File2)) {
		    $fp1 = @fopen($File1, 'r');
		    $fp2 = @fopen($File2, 'r');

		    if ($fp1 && $fp2) {
		        //Đọc tin
		        $File1 = fread($fp1, filesize($File1));
		        $File2 = fread($fp2, filesize($File2));

		        //Check val file1
		        echo 'Chuỗi file1.txt: <br>';
		        if(checkValidString($File1)) {
		            $check1 = substr_count($File1, '.');
		            echo 'True. ' . $check1 . ' câu';
		        }
		        else{
		            echo 'Không hợp lệ';
		        }

		        echo "<br><br>";

		        //Check val
		        echo 'Chuỗi file2.txt: <br>';
		        if (checkValidString($File2)) {
		            $check2 = substr_count($File2, '.');
		            echo 'False. ' . $check2 . ' câu';
		        }
		        else{
		            echo 'Không hợp lệ';
		        }
		        fclose($fp1);
		        fclose($fp2);
		    }
		    else{
		        echo 'Không mở được file';
		    }
		}
		else {
		    echo 'File không tồn tại';
		}
	?>
</body>
</html>
