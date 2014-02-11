<?php include_once("../config.php");


if(isset($_GET["func"])){

$func = $_GET["func"];	
}
$userid = $_GET["userid"];

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

if($func == "adm_adm_user_update"){
$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/update/{$_REQUEST['id']}/{$_REQUEST['username']}/{$_REQUEST['password']}/{$_REQUEST['privilege']}"),true);
	if($success==1)
	{
		header("Location: edit_user.php");
	}
	else
	{
		echo "error func adm_adm_user_update";
	}
}

if(isset($_POST['itemid'])){
	$itemids = $_POST['itemid'];
	$userid = $_POST['userid'];
	foreach($itemids as $itemid){
		$quantity = $_POST["quantity_".$itemid];
		json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/additem/".$userid."/".$itemid."/".$quantity),true);
		
	}
	header("Location: index.php");	
}
 if(isset($_GET['itemid'])) {
 	$itemid = $_GET['itemid'];
	$userid = $_GET['userid'];
	$quantity = $_GET['quantity'];
	json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/additem/".$userid."/".$itemid."/".$quantity),true);
	header("Location: index.php");	
 }
if(isset($_GET['func']) && $_GET['func'] == "removeitemfrombasket"){
	$itemid = $_GET['itemid'];
	$userid = $_GET['userid'];
 json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/removeitem/".$userid."/".$itemid),true);
}
 



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