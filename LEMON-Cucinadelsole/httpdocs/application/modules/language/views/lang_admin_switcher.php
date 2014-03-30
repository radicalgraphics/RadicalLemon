<?php if ($this->uri->segment(1) == "edit"): ?>
		<div>
				<dl id="sample" class="dropdown">
					<dt><a><span><?php global  $IN ;  echo $lang = ($IN->cookie('user_lang') == 'nl' ?  "Dutch" :  "English");?></span></a></dt>
					<dd>
						<ul>
							<li><a href="<?php echo base_url()."nl/".uri_string(); ?>">Dutch</a></li>
							<li><a href="<?php echo base_url()."en/".uri_string(); ?>">English</a></li>
						</ul>
					</dd>
				</dl>
		</div>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function() {  
   $(".dropdown dt a").click(function() {
        $(".dropdown dd ul").toggle();
    });
 
    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
    });
			
    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (! $clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });
});
</script> 