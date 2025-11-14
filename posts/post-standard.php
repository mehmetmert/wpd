<?php if(!defined('ABSPATH')) exit; ?>
<div class="itemContainer">
	<div class="item">
		<div class="thumb">
			<a href="<?php the_permalink() ?>"><?php safirthumb(); ?></a>
		</div>
		<div class="titleContainer"><div class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div></div>
		<div class="detail"><?php safirtext(20) ?></div>
	</div>
</div>