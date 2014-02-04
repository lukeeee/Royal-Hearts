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

?>