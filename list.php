<?php if(!defined('ABSPATH')) exit; ?>
<?php
$listing = xoption('listButtonDefault');
switch ($listing) {
	case 'standard':
	?>
	<div class="listing standard">
		<?php
		global $counter;
		if(have_posts()) : while (have_posts()) : the_post();
			get_template_part('posts/post-standard');
		endwhile;
		else :
		echo('<p style="margin:0 10px 30px;">' . __("İçerik bulunamadı", "pusula") . '.</p>');
		endif;
		?>
	</div>
	<?php break;
	
	case 'double':
	?>
	<div class="listing double">
		<?php
		global $counter;
		if(have_posts()) : while (have_posts()) : the_post();
			get_template_part('posts/post-double');
		endwhile;
		else :
		echo('<p style="margin:0 10px 30px;">' . __("İçerik bulunamadı", "pusula") . '.</p>');
		endif;
		?>
	</div>
	<?php break;

}?>


