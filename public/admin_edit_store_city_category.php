<?php
require_once('../config.php');
$pagetitle = "Butiker | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

$admId = $_SESSION['id'];
//$cities = array("Växjö", "Karlskrona");
$ui_ids[] = '';

$privilege = $_SESSION['privilege'];
if($privilege == 1){
  $cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall"),true);
  $categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
  //$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
} else {
	header("location: index.php");
}

?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<div class="row">
	<div class="col-md-1"></div>
 	<div class="col-md-2">
  	<div class="list-group">
    <a href="administrator.php" class="list-group-item">Kategorier</a>
  	<a href="admin_edit_store.php" class="list-group-item">Butiker</a>				
    <a href="admin_edit_store_city_category.php" class="list-group-item active">Butiker i specifik stad</a>
  	<a href="edit_user.php" class="list-group-item">Användare</a>
    <a href="admin_suppliers.php" class="list-group-item">Grossister</a>
	</div>
  	</div>
    <div class="col-md-4 col-md-offset-2 nopadding">
    <div><h3>Redigera Butiker</h3></div>
    
  	    <section>
        
            <?php echo categoryinStore($cities, $categories);
            /*$categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
            $selectscript = '';
            foreach($cities  as $city){
              if($city["id"] != 0){
                $storeincity = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getbycity/".$city["id"]),true);
                
                echo "<div><div><h4>".$city["name"]."</h4></div>";
                echo  "<select id=\"city_".$city["id"]."\" name=\"city_".$city["id"]."\" multiple>";
                $categoryinstore = '';    
                $divid = '';
                if(count($storeincity) != 0){
                  foreach ($storeincity as $store) { 
                    if($store["id"] != 0){     
                      $id = $city['id']."_".$store['id'];
                      $divid = "div_".$id;
                      $uiids[] = $divid;
                      $categoryinstoreDiv = "<style>";
                      $categoryinstoreDiv .= "#sortable_".$id."{ list-style-type: none; margin: 0; padding: 0; width: 100%; }";
                      $categoryinstoreDiv .= "#sortable_".$id." li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em;  }";
                      $categoryinstoreDiv .= "#sortable_".$id." li span { position: absolute; margin-left: -1.3em; }";
                      $categoryinstoreDiv .= "</style>";
                      $categoryinstoreDiv .= "<script>";
                      $categoryinstoreDiv .= '$(function() {$("#sortable_'.$id.'").sortable();';
                      $categoryinstoreDiv .= '$("#sortable_'.$id.'").disableSelection();';
                      $categoryinstoreDiv .= "</script>";
                      $categoryinstoreDiv .= "<div id=\"".$divid."\">";
                      $categoryinstoreDiv .= "<ul id=\"sortable_".$city['id']."_".$store['id']."\">";
                      foreach ($categories as $category) {
                        $categoryinstoreDiv .= "<li class=\"ui-state-default\" value =\"".$category['id']."\"><span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>".$category['name']."</li>";//"<option value=\"".$category['id']."\">".$category['name']."</option>";  
                      }
                      $categoryinstoreDiv .= "</ul>";
                      $categoryinstoreDiv .= "<a id=\"a_".$city['id']."_".$store['id']."\"><i class=\"glyphicon glyphicon-ok\"></i></a>";
                      $categoryinstoreDiv .= "</div>";
                      $categoryinstore .= $categoryinstoreDiv;
                      echo "<option value=\"".$city['id']."_".$store['id']."\">".$store['name']."</option>";
                      echo "<script>
                        $(document).ready(function() {
                              
                          $('#div_".$city['id']."_".$store['id']."').css(\"display\", \"none\");

                        });
                    </script>"; 
                      } else {
                        //$categoryinstore .= "_".$store['id']."\" name=\"city_".$city['id']."_city_".$store["id"]."\" multiple>";
                    }
                  }

                }
                
                echo "</select>";
                echo "<div class=\"floatright\">".$categoryinstore."</div></div>";
                $selectscript .= "<script>";
        $selectscript .= "$('#city_".$city['id']."').bind('click', function(){";
          $selectscript .= "var selected = $('#city_".$city['id']."').val()";
          $selectscript .= "var classID = '#div_'+selected;";
          $selectscript .= "var listID = '#sortable_'+selected;";
          $selectscript .= "var aID = '#a_'+selected;";
          $selectscript .="var post = \";";
          if(count($uiid) > 0){
          $selectscript .= "var uiids = [";
          

            for ($i = 0; $i < count($uiids); $i++){
              $selectscript .= '"#'.$uiids[$i].'"';
              if($i < count($uiid)-1){
                $selectscript .= ',';
              }
            }
          $selectscript .= "];";

          } 
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
              //console.log(post);
          $selectscript .=  "});";
          $selectscript .= "window.location = \"run.php?func=changecategoryorder&catarray=\"+post;";
          $selectscript .= "});}); </script>";
              }
   		    }   */ 
            ?>


        </section>

      </div>
</div>
<?php echo categoryinStoreScript($cities) ?>
<script>
        /*$('#city_1').bind('click', function(){
          var selected = $("#city_1").val();  
          alert(selected);
          var classID = '#div_'+selected;
          var listID = '#sortable_'+selected;
          var aID = '#a_'+selected;
          var post = "";
*/
          var uiids = [
            <?php /*for ($i = 0; $i < count($uiid); $i++){
              echo '"#'.$uiid[$i].'"';
              if($i < count($uiid)-1){
                echo ',';
              }
            }*/ ?>
          /*];
          for (var i=0;i<uiids.length;i++){
            var hidden  = $(uiids[i]).is(':hidden');
            console.log(uiids[i]);
            if(!hidden){//$("option:selected").prop("selected") == true){
              $(uiids[i]).css('display', 'none');
               console.log("hiding: "+uiids[i]);
             }
            }
          
          $(classID).show("slow");             
              
          $(aID).click(function(){
            var listItems = $(listID+" li");
            listItems.each(function(idx, li) {
              post += $(li).val()+",";
              console.log(post);
            });
            window.location = "run.php?func=changecategoryorder&catarray="+post;
          });
        });*/
      </script>
    
<?php require_once(ROOT_PATH.'/footer.php'); ?>