<?php
	function set_feedback($status, $text) {
    	$_SESSION['feedback'] = array('status' => $status, 'text' => $text);
	}

	function get_feedback() {
		$html = "";
		if (isset($_SESSION['feedback'])) {
			$html .= '<div class="alert alert-'.$_SESSION['feedback']['status'].'">';
			$html .= '<button type="button" class="close" data-dismiss="alert">×</button>';
			$html .= $_SESSION['feedback']['text'];
			$html .= '</div>';
			$_SESSION['feedback'] = null;
		}
		return $html;
	}

	function checkbox($class, $name, $value, $checked = null) {
		$html = '<label class="'.$class.'">';
		$html .= '<input type="'.$class.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$checked.'>';
		$html .= '</label>';
		return $html;
	}
	function SortStores($array){
			$stores = array("stores" => array());
			$storesID = array();
			foreach($array as $itemCity){
				//var_dump($itemCity);
			
				if(in_array($itemCity["store"], $storesID, true)){
					
				}else{
					array_push($storesID, $itemCity["store"]);
					array_push($stores["stores"], array("id" => $itemCity["store"], "name" => $itemCity["storeName"]));
				}
				
				
			}
			return $stores;
			
		}
	

  function hidden_input($name, $id) {
    $html = '<input type="hidden" name="'.$name.'" value="'.$id.'">';
    return $html;
  }

  function form_input($type, $name, $label_text, $placeholder_text = null, $valuetext = null) {
    if ($placeholder_text != null) {
      $placeholder_text = ' placeholder="'.$placeholder_text.'"';
    } if ($valuetext != null) {
      $valuetext = ' value="'.$valuetext.'"';
    }

    $html  = form_control_wrapper($name);
    $html .= form_label($name, $label_text);
    $html .= '<div class="controls">';
    $html .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'"  '.$placeholder_text.''.$valuetext.'>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
  }

  function form_control_wrapper($id) {
    return '<div class="control-group" id="'.$id.'">';
  }

  function form_label($for, $text = null){
    if ($text != null) {
      $text = $text;
    }
    return '<label class="control-label" for="'.$for.'">'.$text.' </label>';
  }

  function itemAdded($foodbasket_total, $session, $cat_id, $id){
    $script = '';
    $catimg = '';
    if(isset($id)){
        if($cat_id == 2){
          $catimg = 'img/flying.png';
        } else if ($cat_id == 3){
          $catimg = 'img/chark.png';
        } else if($cat_id == 4){
          $catimg = 'img/snacks.png';
        } else if($cat_id == 5){
          $catimg = 'img/dairy.png';
        } else if($cat_id == 30){
          $catimg = 'img/health.png';
        }
      
      if($foodbasket_total > $session){
        $script = "$(\"#b\").attr('src','".$catimg."');
        $(\"#b\").fadeOut(2000);
        $(\"#carticon\").attr('src','img/fullcart.png');";  
        $_SESSION['foodbasket_total'] = $foodbasket_total;
       } else if($foodbasket_total > 0) {
        $script = "$(\"#b\").hide();
        $(\"#carticon\").attr('src','img/fullcart.png');";  
        $_SESSION['foodbasket_total'] = $foodbasket_total;
        } else {
          $_SESSION['foodbasket_total'] = 0;
          $script = "$(\"#b\").hide();
        $(\"#carticon\").attr('src','img/emptycart.png');";   
        }
      }else{
        $script = "$(\"#b\").hide();
        $(\"#carticon\").attr('src','img/emptycart.png');"; 
      }
    return $script;
  }
  function itemAddedscript($script){
    $returnScript = '<script>';
    $returnScript .= 'function moveRight(){';
    $returnScript .= $script;
    $returnScript .= '}';
    $returnScript .=  '$(document).ready(function() {';
    $returnScript .=  'moveRight()';
    $returnScript .= '});';
    $returnScript .= '</script>';
    return $returnScript;
  }

  function foodbasketPopup($foodbasket_total, $userid, $foodbasket){
    $html = '';
    if(isset($foodbasket_total) && $foodbasket_total > 0){

      $html .= '<table class="table">';
      $html .= '<th>Produkt</th><th>Antal</th><th>';
      $html .= '<a id="basketuser_'.$userid.'">';
      $html .= '<i class="glyphicon glyphicon-trash"></i></a></th>';
      $html .= '<script>';
      $html .= '$(\'#basketuser_'.$userid.'\').click(function(){';
      $html .= 'var answer = confirm(\'Vill du verkligen ta bort hela matkassen?\');';
      $html .= 'if (answer){';
      $html .= 'window.location = "run.php?func=removeentirefrombasket&userid='.$userid.'";';
      $html .= '}else{ console.log(\'cancel\');}});';
      $html .= '</script></thead><tbody>';
      if(isset($foodbasket)){
        foreach ($foodbasket["items"] as $arrayitem) {
          $html .= '<tr><td>'.$arrayitem["name"].'</td><td>'.$arrayitem["quantity"].'</td>';
          $html .= '<td><a id="basketitem_'.$arrayitem["id"].'"><i class="glyphicon glyphicon-trash"></i></a>';
          $html .= '</td></tr>'; 
          $html .= '<script>';
          $html .=  '$(\'#basketitem_'.$arrayitem["id"].'\').click(function(){';
          $html .=  'window.location = "run.php?func=removeitemfrombasket&userid='.$userid.'&itemid='.$arrayitem["id"].'";';
          $html .= '});</script>';       
        } 
      }
     $html .= '</tbody></table>';
  } else {
    $html .= 'Din varukorg är tom';
  }
  return $html;
}
function foodbasketDiv($script, $foodbasket_total){
    $html = '<img id="b" src="" id="b" style="position:absolute; top:1"/>';
    $html .= '<a href="#"  id="searchItem_" >';
    $html .= '<img id="carticon" src=""></a>';
    $html .= '<span class="badge cartbadge">'.$foodbasket_total.'</span>';
    if($script != ''){
      $html .= itemAddedscript($script);  
    }
    
    return $html;
}

/*function categoryinStore($cities, $categories){
  $html = '<div>';
  $selectscript = '';
  $categoryinstore = '';
  foreach($cities  as $city){
    if($city["id"] != 0){
      $storeincity = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getbycity/".$city["id"]),true);

      $html .= "<div><h4>".$city["name"]."</h4></div>";
      $html .= "<select id=\"city_".$city["id"]."\" name=\"city_".$city["id"]."\" class=\"selectmulti\" multiple>";
      $categoryinstore = '';    
      $divid = '';
      if(count($storeincity) != 0){
        foreach ($storeincity as $store) { 
          if($store["id"] != 0){     
            $id = $city['id']."_".$store['id'];
            $divid = "div_".$id;
            //$uiids[] = $divid;
            $categoryinstoreDiv = "<style>";
            $categoryinstoreDiv .= "#sortable_".$id."{ list-style-type: none; margin: 0; padding: 0; width: 100%; }";
            $categoryinstoreDiv .= "#sortable_".$id." li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em;  }";
            $categoryinstoreDiv .= "#sortable_".$id." li span { position: absolute; margin-left: -1.3em; }";
            $categoryinstoreDiv .= "</style>";
            $categoryinstoreDiv .= "<script>";
            $categoryinstoreDiv .= '$(function() {';
            $categoryinstoreDiv .= '$("#sortable_'.$id.'").sortable();';
            $categoryinstoreDiv .= '$("#sortable_'.$id.'").disableSelection();});';
            $categoryinstoreDiv .= "</script>";
            $categoryinstoreDiv .= "<div id=\"".$divid."\">";
            $categoryinstoreDiv .= "<ul id=\"sortable_".$city['id']."_".$store['id']."\">";
            foreach ($categories as $category) {
              $categoryinstoreDiv .= "<li class=\"ui-state-default\" value =\"".$category['id']."\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>".$category['name']."</li>";
            }
            $categoryinstoreDiv .= "</ul>";
            $categoryinstoreDiv .= "<a id=\"a_".$city['id']."_".$store['id']."\"><i class=\"glyphicon glyphicon-ok\"></i></a>";
            $categoryinstoreDiv .= "</div>";
            $categoryinstore .= $categoryinstoreDiv;
            $html .= "<option value=\"".$city['id']."_".$store['id']."\">".$store['name']."</option>";
            $html .= "<script>
            $(document).ready(function() {
                
            $('#div_".$city['id']."_".$store['id']."').css(\"display\", \"none\");

            });
            </script>"; 
          }
        } 
      }
    }

    $html .= "</select>";
    $html .= "<div class=\"floatright\">".$categoryinstore."</div>";
  }
  return $html;
}    
function categoryinStoreScript($cities){
    $ids[] = "";
    $selectscript = "";
    foreach($cities  as $city){
      if($city["id"] != 0){
        $storeincity = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getbycity/".$city["id"]),true);  
        if(count($storeincity) != 0){
          foreach ($storeincity as $store) { 
            $ids[] = $city['id']."_".$store['id'];
          }
        }
      }
    }
    foreach($cities  as $city){
      if($city["id"] != 0){
        $selectscript .= "<script>";
        $selectscript .= "$('#city_".$city['id']."').bind('click', function(){";
        $selectscript .= "var selected = $('#city_".$city['id']."').val();";
        $selectscript .= "var classID = '#div_'+selected;";
        $selectscript .= "var listID = '#sortable_'+selected;";
        $selectscript .= "var aID = '#a_'+selected;";
        $selectscript .="var post = \"\";";
        $selectscript .= "var uiids = [";
        for ($i = 0; $i < count($ids); $i++){
          $selectscript .= '"#div_'.$ids[$i].'"';
          if($i < count($ids)-1){
            $selectscript .= ',';
          }
        }
        $selectscript .= "];";
        $selectscript .= "for (var i=0;i<uiids.length;i++){";
      $selectscript .= "var hidden  = $(uiids[i]).is(':hidden');";
      $selectscript .= "console.log(uiids[i]);";
      $selectscript .= "if(!hidden){";
      $selectscript .= "$(uiids[i]).css('display', 'none');";
      $selectscript .= "console.log(\"hiding: \"+uiids[i]);";
      $selectscript .= "}}";

      $selectscript .= "$(classID).show(\"slow\");";

      $selectscript .= "$(aID).click(function(){";
      $selectscript .= "var listItems = $(listID+\" li\");";
      $selectscript .= "listItems.each(function(idx, li) {";
      $selectscript .= "post += $(li).val()+\",\";";
      
      $selectscript .=  "});";
      $selectscript .= "window.location = \"run.php?func=changecategoryorder&catarray=\"+post;";
      $selectscript .= "});}); </script>";
      
    }
  }return $selectscript;
}*/


function categoryinStore($storeid, $categories, $catinstore = false){
  $html = '';
  $categoryinstore = '';
  $categoryinstore = '';    
  $divid = '';
  $categoryinstoreDiv = "<style>";
  $categoryinstoreDiv .= "#sortable_".$storeid."{ list-style-type: none; margin: 0; padding: 0; width: 100%; }";
  $categoryinstoreDiv .= "#sortable_".$storeid." li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em;  }";
  $categoryinstoreDiv .= "#sortable_".$storeid." li span { position: absolute; margin-left: -1.3em; }";
  $categoryinstoreDiv .= "#sortable_".$storeid." li:hover { color: #ffff00; background-color: #003366; }";
  $categoryinstoreDiv .= "</style>";
  $categoryinstoreDiv .= "<script>";
  $categoryinstoreDiv .= '$(function() {';
  $categoryinstoreDiv .= '$("#sortable_'.$storeid.'").sortable();';
  $categoryinstoreDiv .= '$("#sortable_'.$storeid.'").disableSelection();});';
  $categoryinstoreDiv .= "</script>";
  $categoryinstoreDiv .= "<ul id=\"sortable_".$storeid."\">";
  
  foreach ($categories as $category) {
    if($catinstore == true){
    $categoryinstoreDiv .= "<li class=\"ui-state-default\" value =\"".$category['category_id']."\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>".$category['name']."</li>";  
    } else {
      $categoryinstoreDiv .= "<li class=\"ui-state-default\" value =\"".$category['id']."\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>".$category['name']."</li>";  
    }
  }
  
  $categoryinstoreDiv .= "</ul>";
  $categoryinstoreDiv .= "<a id=\"a_".$storeid."\"><i class=\"glyphicon glyphicon-ok\"></i></a>";
  $categoryinstoreDiv .= "<a id=\"adel_".$storeid."\"><i class=\"glyphicon glyphicon-remove\"></i></a>";
  
  $categoryinstore .= $categoryinstoreDiv;
  $html .= $categoryinstore;  
  
  return $html;
  
} 

function categoryinStoreScript($categories){
  $selectscript = "<script>";
    foreach($categories  as $category){
      $selectscript .= '$(function() {';
      $selectscript .= "var selected = ".$category['id'].";";
      $selectscript .= "var classID = '#div_'+selected;";
      $selectscript .= "var listID = '#sortable_'+selected;";
      $selectscript .= "var aID = '#a_'+selected;";

      $selectscript .= "$(aID).click(function(){";
        $selectscript .= "var listItems = $(listID+\" li\");";
        $selectscript .= "listItems.each(function(idx, li) {";
          $selectscript .= "post += $(li).val()+\",\";";
        $selectscript .=  "});";
      $selectscript .= "});";
      $selectscript .= "window.location = \"run.php?func=changecategoryorder&catarray=\"+post;";
      $selectscript .= "});});";
      
    
  }
  $selectscript .= "</script>";
  return $selectscript;
}

  

 
  
  

?>