<?php

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
$total = 10;

$searchstring = $_GET['search'];
$pages = ceil($total / $rp);
$start_from = ($page-1) * $rp;

$items = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/search/".$searchstring."/".$sortname."/".$sortorder."/".$start_from."/".$rp),true); 

	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
		foreach($items AS $item){
			$entry = array('id'=>$item['id'],
				'cell'=>array(
					'id'=>$item['id'],
					'product'=>$item['name'],
					'price'=>10,
					'categoryname'=>$item['cat_name'],
					'addTobasket'=>'<button>Lägg till</button>'
				),
			);
			$jsonData['rows'][] = $entry;
		} 

echo json_encode($jsonData);
?>