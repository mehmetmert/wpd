<?php if(!defined('ABSPATH')) exit; ?>
<div class="crewGallery">
	<?php
	$pageID = get_the_ID();
	if(is_array($attachmentIDs)) {
		foreach ( $attachmentIDs as $attachmentID ) {
			include(get_template_directory() . "/parts/crew.php");
		}
	}
	?>
</div>
