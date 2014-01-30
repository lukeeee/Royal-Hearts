<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $pagetitle; ?></title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
			body {

                background:url(img/gradient.png);
                background-size:100%;
				
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
		</style>
    </head>
    <header>
	<div class="alert-div"><?php echo get_feedback(); ?></div>
    <div class="row">
        <div class="col-md-7 col-md-offset-4">
            <p class="text-right"><?php if (isset($_SESSION['is_logged_in'])) { echo 'Inloggad som <span id="user-span">'.$_SESSION['user_username'].'</span>.'; } else { echo 'Ej inloggad.'; } ?> </p>
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