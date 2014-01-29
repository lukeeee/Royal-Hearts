<?php include_once("../config.php");


$func = $_GET["func"];



if($func == "adm_adm_delete"){
json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/remove/{$_REQUEST['id']}"),true);
}

if($func == "adm_adm_update"){
json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/update/{$_REQUEST['id']}/{$_REQUEST['name']}"),true);
}

if($func == "adm_adm_add"){
json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/add/{$_REQUEST['name']}"),true);
}


header("Location: /administrator.php");
ob_flush();

?>