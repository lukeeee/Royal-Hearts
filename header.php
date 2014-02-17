<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $pagetitle; ?></title>
        <link href="css/bootstrap.css" rel="stylesheet">
		<LINK REL="SHORTCUT ICON" HREF="img/cart.png">
		<link type="text/css" href="css/atooltip.css" rel="stylesheet"  media="screen" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
    	<script src="js/bootstrap.min.js"></script>
        
		
		
<script type="text/javascript" src="js/jquery.qtip-1.0.0-rc3.min.js"></script>
        <style type="text/css">
			body {
                background:url(img/gradient.png);
                background-size:100%;
				background-repeat:no-repeat;
				background-size:cover;
			}

			.inputsam{
				width: 10%;
			}

			.cartbadge{
				font-size: 1em;
			  	
			}

			.carticon{
				font-size: 2em;
				margin-left: 1em;
				margin-top: 1em;
			  	
			}
			.topright {
				font-size: 1em;
				width: 15%;
			  	position:absolute;
			  	margin-top: 5em;
			  	margin-right: 5em;

			  	max-height: 5em;
			   	top:0;
			   	right:0;
			   	z-index: 1;
			}
			#header {
				display:block;
				margin:2em 0 4em 0;
				text-align:center;
			}
			#title {
				font-size:5em;
                text-align: center;
			}
			#title a, a:active {
				color: #333;
				text-decoration:none;
			}
			hr {
				border: 0;
				clear:both;
				display:block;
				width: 80%;               
				background-color:#333;
				height: 1px;
			}	

			#footer {
				text-align:center;
				padding-bottom:1em;
			}
			#footer-margin {
				padding-top:5em;
			}
			#user-span {
				font-style:italic;
			}
			.ttip {
				position: absolute;
				min-width: 10px;
				min-height: 10px;
				color: #fff;
				padding: 20px;
				-webkit-box-shadow: 0 1px 2px #303030;
				-moz-box-shadow: 0 1px 2px #303030;
				box-shadow: 0 1px 2px #303030;
				border-radius: 8px 8px 8px 8px;
				-moz-border-radius: 8px 8px 8px 8px;
				-webkit-border-radius: 8px 8px 8px 8px;
				-o-border-radius: 8px 8px 8px 8px;
				background-image:-moz-linear-gradient(top, #F45000, #FF8000);
				background-image: -webkit-gradient(linear, left top, left bottom, from(#F45000), to(#FF8000));
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#F45000', endColorstr='#FF8000', GradientType=0);
				background-color:#000;
				display: none
			}
			.contents {
				font-size: 15px;
				font-weight:bold
			}
			.note {
				font-size: 13px;
				text-align:center;
				display:block;
				width: 100%
			}
			#background{
				display: none;
				position: absolute;
				height: 100%;
				width: 100%;
				top: 0;
				left: 0;
				background: #000000;
				z-index: 1;
			}
			#large {
				display: none;
				position: absolute;
				background: #FFFFFF;
				padding: 0px;
				z-index: 10;
				min-height: 0px;
				min-width: 0px;
				color: #336699;
			}
			.centered {
			  top:10%;
			  left:8%;
			  margin-top: 1%;
			  vertical-align: center;
			  text-align: center;
			}
			.adm {
				margin:2px;
			}
		</style>
    </head>
    <header>
	<div class="alert-div"><?php echo get_feedback(); ?></div>
    <div class="row">
        <div class="col-md-7 col-md-offset-4">
            <p class="text-right"><?php if (isset($_SESSION['is_logged_in'])) { echo 'Inloggad som <span id="user-span">'.$_SESSION['username'].'</span>.'; } else { echo 'Ej inloggad.'; } ?> </p>
        </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <div id="title"><a href="index.php">MATKASSEN.SE</a></div>
      </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
           <div id="header">        
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group btn-group-lg btn-group-justified">
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Varor") !== false) { echo "active"; } else { echo ""; } ?>" role="button" href="products.php">Varor</a>
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Sök") !== false) { echo "active"; } else { echo ""; } ?>" role="button" href="search.php">Sök</a>
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Om") !== false) { echo "active"; } else { echo ""; } ?>" role="button" href="about.php">Om</a>
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Logga") !== false) { echo "active"; } else { echo ""; } ?>" role="button" <?php if (isset($_SESSION['is_logged_in'])) { echo 'href="logout.php">Logga ut'; } else { echo 'href="login.php">Logga in'; } ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </header>
    <body>
<?php
 $foodbasket = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/".$_SESSION['id']),true); 
 $foodbasket_total = count($foodbasket['items']);
 ?>    
    <div class="topright">        	 
	    <a href="#"  id="searchItem_" >
	    <i class="glyphicon glyphicon-shopping-cart carticon"></i></a>
	    	<span class="badge cartbadge"><?php echo $foodbasket_total ?></span>
    </div>	
    <div id="content_">
	    <?php if($foodbasket_total > 0) : ?>
	    <table class="table">
				  	<th>Produkt</th><th>Antal</th><th><a id="basketuser_<?php echo $_SESSION['id'] ?>"><i class="glyphicon glyphicon-trash"></i></a></th>
				  	 <script>
        $('#basketuser_<?php echo $_SESSION['id'] ?>').click(function(){
							var answer = confirm('Vill du verkligen ta bort hela matkassen?');
							if (answer)
							{
							  	window.location = "run.php?removeentirefrombasket=yes&userid=<?php echo $_SESSION['id'] ?>";
							}else{
							  console.log('cancel');
							}
					});
        </script>
				  </thead>
				  <tbody>
		<?php foreach ($foodbasket["items"] as $arrayitem) {
	  			echo '<tr><td>'.$arrayitem["name"].'</td><td>'.$arrayitem["quantity"].'</td><td><a id="basketitem_'.$arrayitem["id"].'"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
	  			echo '<script>
						$(\'#basketitem_'.$arrayitem["id"].'\').click(function(){
							/*var answer = confirm(\'Vill du verkligen ta bort '.$arrayitem["name"].'?\');
							if (answer)
							{*/
							  	window.location = "run.php?removeitemfrombasket=yes&userid='.$_SESSION['id'].'&itemid='.$arrayitem["id"].'";

							//}else{
							  //console.log(\'cancel\');
							//}
						console.log("run.php?removeitemfrombasket=yes&userid='.$_SESSION['id'].'&itemid='.$arrayitem["id"].'");
					  	
					});
					</script>';
	  		  }
		 ?>
				  </tbody>
		</table>
	<?php else : ?>
		Din varukorg är tom
	<?php endif ?>
	</div>
	            <script>
            $(document).ready(function() {
              var div1Html = $('#content_').html();
              console.log(div1Html);
                $("#searchItem_").popover({
                    html: true,
                    animation: true,
                    content: div1Html,
                    placement: "bottom"
                });
                $('#content_').hide();

            });
        </script>
        