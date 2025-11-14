<?php if(!defined('ABSPATH')) exit; ?>
<div class="itemContainer">
	<div class="item">
		<div class="thumb">
			<a href="<?php the_permalink() ?>"><?php safirthumb(); ?></a>
		</div>
		<div class="detail">
			<div class="inside">
				<div class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
				<div class="summary"><?php safirtext(50) ?></div>
			</div>
		</div>
	</div>
</div>
