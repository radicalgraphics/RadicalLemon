<div class="links" role="custom-dropdown">
	<ul>
		<?php foreach ($navigation as $link): ?>
			<li class="<?php echo $link->url; ?>">
				<a class="<?php echo $link->url."-link" ;?><?php if ($link->url == uri_string() ) { echo " active"; } ?>"  href="<?php echo base_url().$link->url; ?>"><?php echo $link->link_name; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>