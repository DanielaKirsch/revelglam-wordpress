// VARIABLES

// set up a single object namespace for the bigflannel thumbgrid app
var rgadmin = {};
rgadmin.media;

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
	rgadmin.media = wp.media;
	var revelglamImagesFrame = function(parent) {
		return {
			createStates: function() {
				parent.prototype.createStates.apply(this,arguments);
				this.states.add([
					new rgadmin.media.controller.revelglamImages({
						id: 'revelglam-images',
						title: 'RevelGlam',
						content: 'revelglam-images-browse',
					}),
				]);
			},
		}
	};
	rgadmin.media.view.MediaFrame.Post = rgadmin.media.view.MediaFrame.Post.extend(
		revelglamImagesFrame(rgadmin.media.view.MediaFrame.Post)
	);
	rgadmin.media.view.revelglamModeSelect = rgadmin.media.View.extend({
		tagName: 'div',
		className: 'revelglam-choose-mode',
		template: rgadmin.media.template('revelglam-choose-mode'),
	});
	rgadmin.media.controller.revelglamImages = rgadmin.media.controller.State.extend({
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
			content.view = new rgadmin.media.view.revelglamModeSelect({
				controller: this.frame,
				model: this,
			});
		},
	});
}

rgadmin.addRevelGlamClicked = function(e) {
	console.log('rgadmin.addRevelGlamClicked');
	e.preventDefault();
	if(!rgadmin.media.frames.revelglam) {
		rgadmin.media.frames.revelglam = wp.media.editor.open(wpActiveEditor, {
			state: 'revelglam-images',
			frame: 'post'
		});	      
	} else {
		rgadmin.media.frames.revelglam.open(wpActiveEditor);
	}
}
