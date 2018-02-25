// VARIABLES

// set up a single object namespace for the bigflannel thumbgrid app
var rgadmin = {};

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
	rgadmin.initMediaFrame();
 	jQuery('.revelglam-activate').click(rgadmin.addRevelGlamClicked);
}

rgadmin.initMediaFrame = function() {
	console.log('rgadmin.initMediaFrame');
	var media = wp.media;
	var revelglamImagesFrame = function(parent) {
		return {
			createStates: function() {
				parent.prototype.createStates.apply(this,arguments);
				this.states.add([
					new media.controller.revelglamImages({
						id: 'revelglam-images',
						title: 'RevelGlam',
						content: 'revelglam-images-browse',
					}),
				]);
			},
		}
	};
	media.view.MediaFrame.Post = media.view.MediaFrame.Post.extend(
		revelglamImagesFrame(media.view.MediaFrame.Post)
	);
	media.view.revelglamModeSelect = media.View.extend({
		tagName: 'div',
		className: 'revelglam-choose-mode',
		template: media.template('revelglam-choose-mode'),
	});
	media.controller.revelglamImages = media.controller.State.extend({
		handlers: {
			'content:create:revelglam-mode-select': 'createModeSelect',
		},
		initialize: function() {
		},
		turnBindings: function(method) {
			var frame = this.frame;
			_.each(this.handlers, function(handler, event) {
				this.frame[method](event, this[handler], this);
			}, this);
		},
		activate: function() {
			this.turnBindings('on');
			this.setMode();
		},
		setMode: function() {
			this.set('content', 'revelglam-mode-select');
		},
		createModeSelect: function(content) {
			content.view = new media.view.revelglamModeSelect({
				controller: this.frame,
				model: this,
			});
		},
	});
}

rgadmin.addRevelGlamClicked = function(e) {
	console.log('rgadmin.addRevelGlamClicked');
	e.preventDefault();
	var media = wp.media;
	console.log(media);
	
	if(!media.frames.revelglam) {
		media.frames.revelglam = wp.media.editor.open(wpActiveEditor, {
			state: 'revelglam-images',
			frame: 'post'
		});
	} else {
		media.frames.revelglam.open(wpActiveEditor);
	}
}
