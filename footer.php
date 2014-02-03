		<div class="row">
        	<div id="footer-margin" class="col-md-12"></div>
            <div id="footer" class="col-md-12">
                <hr />
                Matkassen &copy; 2014
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('a.clickTip').aToolTip({
                    clickIt: true,
                    tipContent: '<table><th>Varor</th><th>Antal</th><td>Tomat</td><td>Morot</td></table>'
                });      
            }); 

            $('.tooltip_display').click(function() {
    var $this = $(this);

    $("#large").html(function() {
        $('.ttip').css({
            left: $this.position() + '20px',
            top: $this.position() + '50px'
        }).show(500)

    }).fadeIn("slow");
});

$('.note').on('click', function() {
    $('.ttip').hide(500);
    $("#background").fadeOut("slow");
    $("#large").fadeOut("slow");

});
$("#large").click(function() {
    $(this).fadeOut();
   
});
        </script>
        <div id="large">
<div class="ttip">
  <div class="contents">Here goes contents...</div>
  <span class="note">(click here to close the box)</span> 
</div>
</div>
	</body>
</html>