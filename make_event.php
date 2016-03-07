<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST['title']) && isset($_POST['year'])) {
	$id=generateRandomString(10);
    $data = "{\n";
	$data = $data.'"id" : "'.$id.'",'."\n";
	$data = $data . '"title" : "'.$_POST['title'] . '",' . "\n";
	$data = $data . '"startdate": "'.$_POST['year'].'-07-01 12:00",'."\n";
	$data = $data . '"enddate": "'.$_POST['year'].'-07-01 12:00",'."\n";
	$data = $data . '"description" : "'.$_POST['description'] . '</br></br> <i>[#id: '.$id.']</i>",' . "\n";
	$data = $data . '"icon": "'.$_POST['letter'].'_'.$_POST['color'] .'.png'. '",'. "\n";
    $data = $data . '"low_threshold": "1",'. "\n";
    $data = $data . '"high_threshold": "60",'. "\n";
    $data = $data . '"importance": "45",'. "\n";
    $data = $data . '"ypix": "0",'. "\n";
    $data = $data . '"slug":""'. "\n";
	$data = $data .  '}';
	$ret = file_put_contents('./events/'.$id	.'.txt', $data."\n", FILE_APPEND | LOCK_EX);

    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
		echo "Event id: $id";
    }
}
else {
   die('no post data to process');
}