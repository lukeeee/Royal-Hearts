<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $pagetitle; ?></title>
        <link href="css/bootstrap.css" rel="stylesheet">
	
		<!-- aToolTip css -->
		<link type="text/css" href="css/atooltip.css" rel="stylesheet"  media="screen" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
    	<script src="js/bootstrap.min.js"></script>
        
		<!-- aToolTip js -->
		<script type="text/javascript" src="js/jquery.atooltip.js"></script>

        <style type="text/css">
			body {
                background:url(img/gradient.png);
                background-size:100%;
			}
			.topright {
				font-size: 0.8em;
				width: 15%;
			  	position:absolute;
			  	margin-top: 5em;
			  	margin-right: 5em;
			   	top:0;
			   	right:0;
			   	z-index: 1;
			   	opacity:0.8;
				filter:alpha(opacity=80); /* For IE8 and earlier */
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
			#cat-list, a {
				color:#333;
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
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Om") !== false) { echo "active"; } else { echo ""; } ?>" role="button" href="about.php">Om</a>
                        <a class="btn btn-default <?php if(strpos($pagetitle, "Logga") !== false) { echo "active"; } else { echo ""; } ?>" role="button" <?php if (isset($_SESSION['is_logged_in'])) { echo 'href="logout.php">Logga ut'; } else { echo 'href="login.php">Logga in'; } ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </header>
    <body>
    
    <div class="topright">        	 
    <i class="glyphicon glyphicon-shopping-cart tooltip_display"></i>
	 		<!--<a href="#" class="clickTip exampleTip" >On Click Tooltip</a> -->
	 	       <div id="large">
<div class="ttip">
<?php $foodbasket = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/1"),true); 
 ?>

  <div class="contents">
	  <table class="table">
		  	<th>Produkt</th><th>Antal</th>
		  </thead>
		  <tbody>
<?php foreach ($foodbasket as $foodbasketitem) {
			  	if(is_array($foodbasketitem)){			  		
			  		foreach ($foodbasketitem as $arrayitem) {
			  		//echo $item;
			  			echo '<tr><td>'.$arrayitem["name"].'</td><td>'.$arrayitem["quantity"].'</td></tr>';
			  		}
			  	}
		  	} ?>
		  </tbody>
	  </table>
  </div>
  <span class="note">(click here to close the box)</span> 
</div>
</div>
<div id="background"></div>

    </div>	
    
        
    
