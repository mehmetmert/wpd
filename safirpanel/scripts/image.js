jQuery(document).ready(function($){
	// Instantiates the variable that holds the media library frame.
	var meta_image_frame;
	var input;
	var image;
	var removeButton;
	// Runs when the image button is clicked.
	$('body').on("click", ".mediaButton.remove", function(e) {
		input = $(this).closest(".imageButtonContainer").find("input");
		image = $(this).closest(".imageButtonContainer").find("img");
		input.trigger('change').val("");
		image.fadeOut();
		$(this).fadeOut();
	});

	$('body').on("click", ".mediaButton.select", function(e) {
		button = $(this);
		input = $(this).closest(".imageButtonContainer").find("input").first();
		image = $(this).closest(".imageButtonContainer").find("img");
		removeButton = $(this).closest(".imageButtonContainer").find(".mediaButton.remove");
		var hiddenwidth = $(this).closest('.safirpanelItem').next();
		var hiddenheight = hiddenwidth.next();

		// Prevents the default action from occuring.
		e.preventDefault();

		// If the frame already exists, re-open it.
		if ( meta_image_frame ) {
			meta_image_frame.open();
			return;
		}

		// Sets up the media library frame
		meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: meta_image.title,
			button: { text:  meta_image.button },
			library: { type: 'image' }
		});

		// Runs when an image is selected.
		meta_image_frame.on('select', function(){

			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

			// Sends the attachment URL to our custom image input field.
			if(button.hasClass("URL")) {
				input.trigger('change').val(media_attachment.url).change();
			} else {
				input.trigger('change').val(media_attachment.id).change();
			}
			image.attr('src', media_attachment.url).fadeIn();
			hiddenwidth.val(media_attachment.width);
			hiddenheight.val(media_attachment.height);
			removeButton.fadeIn();
		});

		input.change();

		// Opens the media library frame.
		meta_image_frame.open();
	});
});
