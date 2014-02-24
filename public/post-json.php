<?php
	require_once('../config.php');

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';


$searchstring = $_GET['search'];
$arraycount = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/searchall/".$searchstring));
$total = count($arraycount);
$pages = ceil($total / $rp);
$start_from = ($page-1) * $rp;

$items = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/search/".$searchstring."/".$sortname."/".$sortorder."/".$start_from."/".$rp),true); 

 	header("Content-type: application/json");
	$jsonData = array('page'=>$page,'total'=>$total,'rows'=>array());
		foreach($items AS $item){
			$entry = array('id'=>$item['id'],
				'cell'=>array(
					'id'=>$item['id'],
					'name'=>$item['name'],
					'price'=>"10",
					'category_name'=>$item['cat_name'],
					'addTobasket'=>'<input id="quantity_'.$item["id"].'" type="text" class="inputsam" name="quantity_'.$item["id"].'" value="1"></input> <a href="#" id="item_'.$item["id"].'"><i class="glyphicon glyphicon-plus"></i></a>
					<script>
						$(\'#item_'.$item["id"].'\').click(function(){
						var text = $(\'#quantity_'.$item["id"].'\').val();
						
					  	window.location = "run.php?func=additemtobasket&itemid='.$item["id"].'&userid='.$_SESSION['id'].'&catid='.$item["categoryID"].'&quantity="+text;
					});
					</script>'
				),
			);
			$jsonData['rows'][] = $entry;
		} 
echo json_encode($jsonData);
?>