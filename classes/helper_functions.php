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
        } 
      }
     $html .= '</tbody></table>';
  } else {
    $html .= 'Din varukorg är tom';
  }
  return $html;
}
function foodbasketDiv($script, $foodbasket_total){
    $html .= '<img id="b" src="" id="b" style="position:absolute; top:1"/>';
    $html .= '<a href="#"  id="searchItem_" >';
    $html .= '<img id="carticon" src=""></a>';
    $html .= '<span class="badge cartbadge">'.$foodbasket_total.'</span>';
    if($script != ''){
      $html .= itemAddedscript($script);  
    }
    
    return $html;
}
 
  
  

?>