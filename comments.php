<?php if(!defined('ABSPATH')) exit; ?>
<div id="comments" class="<?php if(is_user_logged_in()) : echo ' logged-in'; endif;?>">

	<div class="safirBox safirForm">

		<?php if ( post_password_required() ) : ?>
			<p><?php _e('Bu yazı şifre korumalıdır!', 'pusula') ?></p>
		<?php return; endif; ?>


		<?php if ( have_comments() ) : ?>
			<div class="mainHeading">
				<?php safirIcon("yorum") ?>
				<h2 class="title"><?php _e('ZİYARETÇİ YORUMLARI', 'pusula') ?> - <?php printf( _n( '%s YORUM', '%s YORUM',  get_comments_number(), 'pusula' ), number_format_i18n( get_comments_number() ) ); ?></h2>
			</div>		

			<ol class="commentlist">
			<?php wp_list_comments('type=comment&reply_text=' . __("CEVAPLA", "pusula") . '&avatar_size=70&style=ol'); ?>
			</ol>
		<?php else : ?>
			<div class="mainHeading withslogan">
				<?php safirIcon("yorum") ?>
				<div class="text">
					<h2 class="title"><?php _e('ZİYARETÇİ YORUMLARI', 'pusula'); ?></h2>
					<div class="slogan"><?php _e('Ziyaretçilerimiz tarafından yapılan yorumlar', 'pusula'); ?></div>
				</div>
			</div>		
			<p class="nocomments"><?php _e('Henüz yorum yapılmamış. İlk yorumu aşağıdaki form aracılığıyla siz yapabilirsiniz', 'pusula'); ?>.</p>
		<?php endif; ?>

		<?php
		$fields =  array(
		'author' => '<div class="inputs"><p class="item"><span class="adsoyad"><input placeholder="' . __('İsminiz', 'pusula') . '" type="text" id="author" name="author" size="80" value="' . esc_attr( $commenter['comment_author']) . '" /></span></p>',
		'email' => '<p class="item"><span class="email"><input placeholder="' . __('Mail adresiniz', 'pusula') . '" type="text" id="email" name="email" size="80" value="' . esc_attr( $commenter['comment_author_email']) . '" /></span></p></div>',
		);
		$comments_args = array(
		'fields'=>$fields,
		// change the title of send button 
		'title_reply'=>'',
		// remove "Text or HTML to be displayed after the set of comment fields"
		'comment_notes_after' => '',
		// redefine your own textarea (the comment body)
		'comment_field' => '<p><span class="yorum"><textarea name="comment" id="comment" cols="60" rows="10" placeholder="'. __("Yorumunuz", "pusula") . '"></textarea></span></p>',
		'comment_notes_before' => '',
		'title_reply_to' => __('Yorumu Cevapla', 'pusula'),
		'cancel_reply_link' => '[ ' . __('Yoruma cevap yazmaktan vazgeç', 'pusula') . ' ]',
		'label_submit' => __('GÖNDER', 'pusula')
		);

		?>
	</div>	

	<div class="safirBox safirForm">
		<div class="mainHeading withslogan">
			<?php safirIcon("yorumyaz") ?>
			<div class="text">
				<h2 class="title"><?php _e("BİR YORUM YAZIN", "pusula"); ?></h2>
				<div class="slogan"><?php _e("Bu konu hakkındaki görüşünüzü belirtmek ister misiniz?", "pusula"); ?></div>
			</div>		
		</div>		
		<?php comment_form($comments_args); ?>
	</div>
	
</div>

