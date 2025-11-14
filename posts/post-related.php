<?php if(!defined('ABSPATH')) exit; ?>
<div class="itemContainer">
	<div class="item">
		<a href="<?php the_permalink() ?>">
			<div class="thumb">
				<?php safirthumb(); ?>
			</div>
			<div class="titleContainer">
				<div class="inner">
					<div class="title">
						<?php the_title() ?>
					</div>
				</div>
			</div>
			<div class="more"><?php themeIcon("rightarrow") ?></div>
		</a>
	</div>
</div>