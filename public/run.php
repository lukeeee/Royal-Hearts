<?php include_once("../config.php");


if(isset($_GET["func"])){
$func = $_GET["func"];	
}

if($func == "adm_adm_delete"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/remove/{$_REQUEST['id']}"),true);
	if($success == 1){
		header("Location: administrator.php");
	}else if($success == 2){
		header("Location: admin_error.php");	
	}else{
		echo "Något gick fel!";
		var_dump($success);
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
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/update/".$_REQUEST['prod_id']."/".urlencode($_REQUEST['name'])."/".$_REQUEST['cat_id']),true);
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
if($func == "adm_adm_new_store"){
	$db = new Db();
	if($_POST['storename'] == null || $_POST['username'] == null || $_POST['password'] == null || $_POST['password2'] == null) {
		set_feedback("danger", "Du måste fylla i alla fälten."); 
		header('location: new_store.php');
	} elseif($db->getUsername($_POST['username']) != null) {
		set_feedback("danger", "Användarnamn finns redan."); 
		header('location: new_store.php');
	} elseif($_POST['password'] != $_POST['password2']) {
		set_feedback("danger", "Dina lösenord matchar inte."); 
		header('location: new_store.php');
	} else {
		$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/new/{$_REQUEST['username']}/{$_REQUEST['password']}/3"), true);
		if($success > 0){
		$store_success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/new/{$_REQUEST['storename']}/{$success}"), true);
			if($store_success >0){
				$story_city = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/addcity/{$store_success}/{$_REQUEST['city_id']}"), true);
				if($story_city == 1){
					header("Location: administrator.php");	
				}else{
					echo "error store_city";
				}
				
			}else{
				echo "error store_success";	
			}
		}else{
			echo " error new user";	
		}
	}
}

if($func == "adm_adm_update_store"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/update/{$_REQUEST['storeID']}/{$_REQUEST['name']}/{$_REQUEST['cityID']}"),true);
	if($success==1)
	{
		header("Location: admin_edit_store.php");
	}
	else
	{
		echo "error update store";
	}
}

if($func == "adm_adm_new_supp"){
	$db = new Db();
	if($_POST['suppname'] == null || $_POST['username'] == null || $_POST['password'] == null || $_POST['password2'] == null) {
		set_feedback("danger", "Du måste fylla i alla fälten."); 
		header('location: new_supplier.php');
	} elseif($db->getUsername($_POST['username']) != null) {
		set_feedback("danger", "Användarnamn finns redan."); 
		header('location: new_supplier.php');
	} elseif($_POST['password'] != $_POST['password2']) {
		set_feedback("danger", "Dina lösenord matchar inte."); 
		header('location: new_supplier.php');
	} else {
		$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/new/{$_REQUEST['username']}/{$_REQUEST['password']}/2"), true);
		if($success > 0){
		$supplier_success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/supplier/new/".urlencode($_REQUEST['suppname'])."/{$success}"), true);
			if($supplier_success == 1){
				header("Location: admin_suppliers.php");
			}else{
				echo "error supplier_success";	
			}
		}
	}
}
if($func == "adm_adm_supp_update"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/supplier/update/{$_REQUEST['id']}/{$_REQUEST['name']}"), true);
	if($success == 1){
		header("Location: admin_suppliers.php");
	}else{
		echo "error supplier update";	
	}
	
}
if($func == "adm_adm_supp_delete"){
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/supplier/remove/{$_REQUEST['id']}"),true);
	if($success == 1){
		header("Location: admin_suppliers.php");
	}else{
		echo "error delete supplier";
	}

}

if($func == "adm_adm_user_new"){
$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/new/{$_REQUEST['username']}/{$_REQUEST['password']}/{$_REQUEST['privilege']}"),true);
	if($success>0)
	{
		header("Location: edit_user.php");
	}
	else
	{
		echo "error func adm_adm_user_new";
	}
}

if($func == "manager_update_products"){
	$array = array();
	$success = 0;
	$prices = $_REQUEST["price"];
	$ids = $_REQUEST["itemid"];
	//create arrays for the products with price and id
	for($i = 0; $i < count($_REQUEST['price']);$i++){
		array_push($array, array("product" => array("price" => 0, "id" => 0)));
	}
	
	for($i = 0; $i < count($array);$i++){
		$array[$i]["product"]["price"] = $prices[$i];
	}
		
	for($i = 0; $i < count($array);$i++){
		$array[$i]["product"]["id"] = $ids[$i];
	}
	//loop throught he products and check which ones have a corresponding checked box
	for($i = 0; $i < (count($array)-1);$i++){
		if(isset($_REQUEST["checkboxes"])){
			$array["checked"] = $_REQUEST['checkboxes'];
		}
		if(isset($array["checked"])){
				$for_sale = 0;
				foreach($array["checked"] as $checked){
					if($checked == $array[$i]["product"]["id"]){
						
						$for_sale = 1;
						
					}
				}
				
			$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/manager/update/{$_REQUEST['city_storeID']}/".$array[$i]["product"]["price"]."/".$array[$i]["product"]["id"]."/".$for_sale),true);
			
		}else{
			$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/manager/update/{$_REQUEST['city_storeID']}/".$array[$i]["product"]["price"]."/".$array[$i]["product"]["id"]."/0"),true);
		}
	}
	
	if($success>0)
	{
		header("Location: manager.php");
	}
	else
	{
		echo "error";
		var_dump($array[0]["product"]["price"]);
		var_dump($array[0]["product"]["id"]);
		var_dump($array);
		var_dump($success);
	}
}

if($func == "addtobasket"){
		$itemids = $_POST['itemid'];
		$userid = $_POST['userid'];
		foreach($itemids as $itemid){
			$quantity = $_POST["quantity_".$itemid];
			json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/additem/".$userid."/".$itemid."/".$quantity),true);	
			$_SESSION['cat_id'] = $_POST["item_".$itemid."_catid"];
		}
		header("Location: products.php");	
	}

 if($func == 'additemtobasket') {
 	$itemid = $_GET['itemid'];
	$userid = $_GET['userid'];
	$quantity = $_GET['quantity'];
	$_SESSION['cat_id'] = $_GET['cat_id'];
	json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/additem/".$userid."/".$itemid."/".$quantity),true);
	header("Location: products.php");	
 }
if($func ==  'removeitemfrombasket'){
	$itemid = $_GET['itemid'];
	$userid = $_GET['userid'];
 	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/removeitem/".$userid."/".$itemid),true);
 	if($success > 0){
 		
 		header("Location: products.php");		
 	}
} if($func == 'removeentirefrombasket'){
	$userid = $_GET['userid'];
	$success = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/delete/".$userid),true);
	if($success > 0){
 		header("Location: products.php");		
 	}
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