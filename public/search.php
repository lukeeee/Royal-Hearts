<?php
	require_once('../config.php');
	$pagetitle = "Sök | Matkassen.se";
	$searchstring = '';
	if(isset($_POST['search'])){
		$searchstring = $_POST['search'];
	}
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

 <link rel="stylesheet" type="text/css" href="css/flexigrid.pack.css" />
 <link rel="stylesheet" href="css/flexigridstyle.css" />
<script type="text/javascript" src="js/flexigrid.pack.js"></script>

<div class="row">
	<div class="col-md-6 col-md-offset-3">

	<form method="post" action="search.php">
	<div class="input-group">
      <input id="search" name="search" type="text" class="form-control" placeholder="Sök..." value="<?php echo $searchstring ?>">
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </span>
    </div>
	</form>

	<table class="flexme1">
</table>
</div>
</div> 
<?php if(isset($_POST['search'])) : ?>

<script>
	        	$(".flexme1").flexigrid({
	                url : "post-json.php?search=<?php echo $searchstring ?>",
	                dataType: 'json',
		colModel : [
		{display:  'ID', name : 'id', width : 50, sortable : true, align: 'left'},
		{display:  'Produkt', name : 'product', width : 200, sortable : true, align: 'left'},
			{display: 'Pris', name : 'price', width : 50, sortable : true, align: 'left'},
			{display: 'Kategori', name : 'categoryname', width : 200, sortable : true, align: 'left'},
			{display: '', name : 'addTobasket', width : 200, sortable : true, align: 'left'}
			], 	
		
		sortname: "product",
		sortorder: "asc",
		usepager: true,
		title: '',
		useRp: true,
		rp: 10,
		showTableToggleBtn: true,
		width: 650,
		height: 300
	            });      

	           $('#tirethreads option').each(function () {
        if (($(this).attr('value')) === "BDR-W+") {
            $(this).attr('selected', 'selected');
        }
        //setDefault("BDR-W+");
    });

</script>
<?php endif ?>

<?php require_once(ROOT_PATH.'/footer.php'); ?>