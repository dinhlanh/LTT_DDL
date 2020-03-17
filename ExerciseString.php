<?php

class ExerciseString {
    // check1, check2
    public $check1;
    public $check2;

    public function readFile(string $path)
    {
        if(file_exists($path)) {
            $fopen = fopen($path, 'r');

            if($fopen) {
                $data = fread($fopen, filesize($path));
                fclose($fopen);
                return $data;
            }
            
            echo 'chưa mở file';
            return false;
        }

        echo 'File không tồn tại';
        return false;
    }

    //ghi nội dung vào file
    function writeFile(string $data)
    {
        $path = './result_file.txt';
        if (file_exists($path)) {
            $fopen = @fopen($path, 'w+');

            if ($fopen) {
                fwrite($fopen, $data);
                fclose($fopen);
            } else {
                echo 'Không thể mở file';
            }
        } else {
            echo 'File không tồn tại';
        }
    }

    //check chuỗi
    function checkValidString(string $string)
    {
        $string = strtolower($string);
        $checkBook = strpos($string, 'book');
        $checkRestaurant = strpos($string, 'restaurant');

        if(($checkBook !== false && $checkRestaurant === false) || ($checkBook === false && $checkRestaurant !== false)) {
            return true;
        }

        return false;
    }

}

$dt = new ExerciseString;

$dt->checkbook = $dt->checkValidString($dt->readFile('./file1.txt'));
$dt->checkrestaurant = $dt->checkValidString($dt->readFile('./file2.txt'));

$data = '';
if ($dt->checkbook) {
    $data = 'Book là chuỗi hợp lệ, có ' . substr_count(file_get_contents('./file1.txt'), '.') . ' câu. ';    
}else{
    $data = 'Book là chuỗi không hợp lệ. ';
}

if($dt->checkrestaurant) {
    $data .= 'Restaurant là chuỗi hợp lệ.  ' . substr_count(file_get_contents('./file2.txt'), '.') . ' câu.';    
}else{
    $data .= 'Restaurant là chuỗi không hợp lệ.';
}

$dt->writeFile($data);