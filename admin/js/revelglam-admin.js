// VARIABLES
// set up a single object namespace for the bigflannel thumbgrid app
var rgadmin = {};

// Variable to hold our media applicaton.
rgadmin.mediaApplication;

// data

// status

// counters
var h;
var i;
var j;

// options

// INITIALIZE

jQuery(document).ready(function() {
	console.log('document ready');
	rgadmin.init();
});


// FUNCTIONS

rgadmin.init = function() {
	console.log('rgadmin.init');
 	jQuery('.revelglam-activate').click(rgadmin.addRevelGlamClicked);
}

rgadmin.addRevelGlamClicked = function(e) {
	console.log('rgadmin.addRevelGlamClicked');
	e.preventDefault();
	var media = wp.media();
	console.log(media);
	
	
	
	// If the media frame already exists, reopen it and return.
	if (rgadmin.mediaApplication) {
    	rgadmin.mediaApplication.open();
    	return;
    }
    
    // Set the tabs array to empty to avoid our menu workflow from being polluted by other plugins.
    wp.media.view.settings.tabs = [];
	
	
	media.open();
	
	
//	media.open();
	
	
//	if (this.window === undefined) {
//		this.window = media({
//			title: 'Add Revel Glam image and links',
//			library: {type: 'image'},
//			multiple: false,
//			button: {text: 'Insert'}
//		});
//		var self = this;
//		this.window.on('select', function() {
//			var first = self.window.state().get('selection').first().toJSON();
//			wp.media.editor.insert('[myshortcode id="' + first.id + '"]');
//		});
//	}
//	this.window.open();
//	return false;
	
	
	
	
}
