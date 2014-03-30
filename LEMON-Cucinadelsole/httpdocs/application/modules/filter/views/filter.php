<div class="filter-calendar">
    <div class="calendar-title">Upcoming events!</div>
    <div class="clearer"></div>
        <?php foreach($slider_content as $date ): ?>
            <?php if ($date->date): ?>
                <div class="filter-container">
                        <div class="calendar-date">
                            <a href="<?php echo current_url().'?s='.$date->order_active; ?>"><?php echo $date->date; ?></a>
                        </div>
                        <div class="calendar-content"> 
                            <a href="<?php echo current_url().'?s='.$date->order_active; ?>"><?php echo $date->title; ?></a>
                        </div>
                </div> 
                <div class="clearer"></div>  
            <?php endif; ?>   
        <?php endforeach; ?>
</div>

<script type="text/javascript">
 $(document).ready( function(){
    $("#calendar-icon").click(function() { 	
		$("#overlay").fadeIn();
		$("#calendar").fadeIn();
	});
	$("#overlay").click(function() { 
		$("#calendar").hide();
		$(this).fadeOut();
	});	
});	  
</script> 
    