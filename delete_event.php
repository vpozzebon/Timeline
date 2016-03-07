<?php


if(isset($_POST['file1']) ) {
unlink('./events/'.$_POST['file1'].'.txt');

}
?>