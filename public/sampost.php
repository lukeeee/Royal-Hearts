<?php include_once("../config.php");



$array = $_POST['itemid'];
foreach($array as $arrayitem){
	echo $arrayitem.'<->'.$_POST['quantity_'.$arrayitem].'-->';
	echo $_POST['userid'];
}
//var_dump($array);
?>