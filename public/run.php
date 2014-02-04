<?php include_once("../config.php");


$func = $_GET["func"];
$userid = $_GET["userid"];
$quantity = $_GET["quantity"];
$itemid = $_GET["itemid"];

if($func == "adm_adm_delete"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/remove/{$_REQUEST['id']}"),true);
	if($success == 1){
		header("Location: /administrator.php");
	}else{
		echo "Något gick fel!";
	}
}

if($func == "adm_adm_update"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/update/".$_REQUEST['id']."/".urlencode($_REQUEST['name'])),true);
	if($success == 1){
		header("Location: /administrator.php");
	}else{
		echo "Något gick fel!";	
	}
}

if($func == "adm_adm_add"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/add/".urlencode($_REQUEST['name'])),true);
	if($success == 1){
		header("Location: /administrator.php");	
	}else{
		echo "Något gick fel!";
	}
}

if($func == "adm_supp_delete"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/remove/".$_REQUEST['id']),true);
	if($success == 1){
		header("Location: /supplier.php");	
	}else{
		echo "Något gick fel!";
	}
}
if($func == "adm_supp_update"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/update/".$_REQUEST['id']."/".urlencode($_REQUEST['name'])."/".$_REQUEST['cat_id']),true);
	if($success == 1){
		header("Location: /supplier.php");	
	}else{
		echo "Något gick fel!";
	}
}
if($func == "adm_supp_new"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/add/".urlencode($_REQUEST['name'])."/".$_REQUEST['cat_id']."/".$_REQUEST['supplierID']),true);
	if($success == 1){
		header("Location: /supplier.php");	
	}else{
		echo "Något gick fel!";
	}
}

if($func == "adm_manager_update"){
json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/products/update/{$_REQUEST['id']}/{$_REQUEST['price']}/{$_REQUEST['active']}"),true);
}

<<<<<<< HEAD
if($func == "add_to_basket"){
	json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/additem/".$userid."/".$itemid."/".$quantity),true);
}

if(strpos($func,"manager"))
=======
/*if(strpos($func,"manager"))
>>>>>>> 2cac7b570ae415946891db784d46ddde1fcacb06
{
	header("Location: /manager.php");
}

else if(strpos($func,"adm_adm"))
{
	header("Location: /administrator.php");
}

else if(strpos($func,"supplier"))
{
	header("Location: /supplier.php");
}
else
{
	header("Location: /index.php");
}
*/
ob_flush();

?>