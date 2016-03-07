<?php
$i = 0; 
    $dir = 'events/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $i++;
        }
    }


$files = glob("./events/*.txt");
$out = fopen("idahoea.json", "w");
$intro='['. "\n";
$intro=$intro.'{'. "\n";
    $intro=$intro.'"id": "idahoTimeline",'. "\n";
    $intro=$intro.'"title": "Testing a timeline",'. "\n";
    $intro=$intro.'"focus_date": "1981-07-01 12:00",'. "\n";
    $intro=$intro.'"initial_zoom": "45",'. "\n";
	$intro=$intro.'"color": "#82530d",'. "\n";
	$intro=$intro.'"size_importance": "true",'. "\n";
    $intro=$intro.'"events":'. "\n";
    $intro=$intro.'['. "\n";
    fwrite($out, $intro);
$j = 0; 
foreach ($files as $file) {
	if ($j>0){
	fwrite($out, ','."\n");
	}
	$j++;
    fwrite($out, file_get_contents($file));
}
fwrite($out, "\n".']'."\n".'}'."\n"."]");
fclose($out);
?>