<?php if(!defined('ABSPATH')) exit; ?>
<?php
function safir_metabox_data() {
	$metaboxes = [
		"picHeader" => [
			"type" => "image",
			"text" => 'Arkaplanlı Başlık için Görsel Adresi',
		],
	];
	$metaboxes = apply_filters( 'safirGetMetaboxes', $metaboxes );
	return $metaboxes;
}

function safir_add_meta_box() { 
	add_meta_box(
		'custom_post_metabox',
		'Diğer Ayarlar',
		'safir_display_meta_box',
		null,
		'normal',
		'core'
	);
}
add_action( 'add_meta_boxes', 'safir_add_meta_box' );
	
function safir_display_meta_box( $post ) {
	wp_nonce_field( plugin_basename(__FILE__), 'safir_nonce_field' );
	$metaboxes = safir_metabox_data();
	foreach($metaboxes as $metabox => $data) {
		$currentValue = "";
		switch($data['type']) {
			case "image" :
				$currentValue = get_post_meta( $post->ID, $metabox, true );
				?>
				<p><?php echo $data['text'] ?></p>
				<div class="imageButtonContainer">
					<input type="text" name="<?php echo $metabox ?>" value="<?php echo $currentValue ?>" />
					<a class="button mediaButton select URL">Resim Seç</a>
					<img src="<?php echo $currentValue?>">
				</div>
				<?php
			break;
		}
	}
}
	
function safir_save_meta_box_data( $post_id ) {
	if ( safir_user_can_save( $post_id, 'safir_nonce_field' ) ) {
		$metaboxes = safir_metabox_data();
		foreach($metaboxes as $metabox => $data) {
			if ( isset( $_POST[$metabox] ) && 0 < strlen( trim( $_POST[$metabox] ) ) ) {
				$value = stripslashes( strip_tags( $_POST[$metabox] ) );
				if($value == "") {
					delete_post_meta( $post_id, $metabox, $value );
				} else {
					update_post_meta( $post_id, $metabox, $value );
				}
			}	
		}
	}
}
add_action( 'save_post', 'safir_save_meta_box_data' );
			
function safir_user_can_save( $post_id, $nonce ) {
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ $nonce ] ) && wp_verify_nonce( $_POST [ $nonce ], plugin_basename( __FILE__ ) ) );
	return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;	 
}
			
// Category Meta

add_action ( 'edit_category_form_fields', 'safir_edit_category_image');
function safir_edit_category_image( $tag ) {
	$t_id = $tag->term_id;
	$cat_image1 = get_option( "category_".$t_id ."_image1" );
	$cat_image2 = get_option( "category_".$t_id ."_image2" );
	?>

	<tr class="form-field">
		<th scope="row">
			<label for="cat_image">Kategori Resim Adresi 1</label>
		</th>
		<td>
			<div class="imageButtonContainer">
				<input name="cat_image1" id="cat_image1" type="text" value="<?php echo $cat_image1 ? $cat_image1 : ''; ?>">
				<a class="button mediaButton select URL">Resim Seç</a>
				<img style="display:block; max-width: 100%; padding:10px; margin-top:10px; background:#ddd" src="<?php echo $cat_image1 ? $cat_image1 : ''; ?>">
				<p class="description">Resimli kategoriler bileşeni için bir resim adresi giriniz. (Resimli Kategoriler bileşenini kullanmıyorsanız boş bırakabilirsiniz.)</p>
			</div>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row">
			<label for="cat_image">Kategori Resim Adresi 2</label>
		</th>
		<td>
			<div class="imageButtonContainer">
				<input name="cat_image2" id="cat_image2" type="text" value="<?php echo $cat_image2 ? $cat_image2 : ''; ?>">
				<a class="button mediaButton select URL">Resim Seç</a>
				<img style="display:block; max-width: 100%; padding:10px; margin-top:10px; background:#ddd" src="<?php echo $cat_image2 ? $cat_image2 : ''; ?>">
				<p class="description">Kategori sayfasındaki resimli başlık için bir resim adresi giriniz. (Boş bırakırsanız safirpanelde belirttiğiniz varsayılan görsel kullanılacaktır.)</p>
			</div>
		</td>
	</tr>
	<?php
}
add_action ( 'edited_category', 'safir_save_category_image');

function safir_save_category_image( $term_id ) {
	$t_id = $term_id;
	$cat_image1 = get_option( "category_" . $t_id . "_image1");
	$cat_image2 = get_option( "category_" . $t_id . "_image2");
	if (isset($_POST['cat_image1'])){
		$cat_image1 = $_POST['cat_image1'];
		update_option( "category_" . $t_id . "_image1", $cat_image1 );
	}
	if (isset($_POST['cat_image2'])){
		$cat_image2 = $_POST['cat_image2'];
		update_option( "category_" . $t_id . "_image2", $cat_image2 );
	}
}



// Attachment Metas

function be_attachment_field_credit( $form_fields, $post ) {
	$form_fields['position'] = array(
		'label' => 'Ünvan',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'position', true ),
	);
	$form_fields['facebook'] = array(
		'label' => 'Facebook',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'facebook', true ),
	);
	$form_fields['instagram'] = array(
		'label' => 'Instagram',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'instagram', true ),
	);
	$form_fields['twitter'] = array(
		'label' => 'Twitter',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'twitter', true ),
	);
	$form_fields['linkedin'] = array(
		'label' => 'Linkedin',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'linkedin', true ),
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

function be_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['position'] ) )
		update_post_meta( $post['ID'], 'position', $attachment['position'] );
	if( isset( $attachment['facebook'] ) )
		update_post_meta( $post['ID'], 'facebook', $attachment['facebook'] );
	if( isset( $attachment['instagram'] ) )
		update_post_meta( $post['ID'], 'instagram', $attachment['instagram'] );
	if( isset( $attachment['twitter'] ) )
		update_post_meta( $post['ID'], 'twitter', $attachment['twitter'] );
	if( isset( $attachment['linkedin'] ) )
		update_post_meta( $post['ID'], 'linkedin', $attachment['linkedin'] );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );
