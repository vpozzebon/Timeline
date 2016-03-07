<html>
<head>
<div id="header">
<?php 
    // integer starts at 0 before counting
    $i = 0; 
    $dir = 'events/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $i++;
        }
    }
    // prints out how many were in the directory
    echo "There are $i events";
?>
</div>
</head>
<body>
    <form action="make_event.php" method="POST">
    Event title:
	</br>
	<input name="title" type="text" />
	</br>
	</br>
	Year: 
	</br>
    <input name="year" type="text" />
	</br>
	</br>
	Description:
	</br>
	<input name="description" type="textarea" />
	</br>
	</br>
	Letter:
	
	<input name="letter" type="textarea" />
	</br>
	Color:
	
	<input name="color" type="textarea" />
	</br>
	</br>
	Importance: (a number from 0 to 200)
	</br>
	<input name="importance" type="textarea" />
	</br>
	</br>
	
    <input type="submit" name="submit" value="Save Data">
	</form>
</body>
</html>