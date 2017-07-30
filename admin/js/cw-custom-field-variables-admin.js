(function( $ ) {
	'use strict';

	$(document).ready( function(e) {
		var title, editor_title, label, insert, close;
		title = cwcustomFieldVariables.title;
		editor_title = cwcustomFieldVariables.editor_title;
		label = cwcustomFieldVariables.label;
		insert = cwcustomFieldVariables.insert;
		close = cwcustomFieldVariables.close;
		tinymce.create('tinymce.plugins.CWCustomFieldVariable', {
			init : function(editor, url) {
				editor.addButton('custom-field-variable', {
						title : title,
						cmd : 'insert-custom-field-variable',
				});

				editor.addCommand('insert-custom-field-variable', function() {
				var postID = $('#post_ID').val();
				$.ajax({
					url: ajaxurl,
					type: 'POST',
					data: { 
						'action': 'cw_get_custom_fields',
						'id': postID,
						},
				})
				.done(function( response ) {
					response = JSON.parse(response);
						editor.windowManager.open({
							title: editor_title,
							body: [{
									type   : 'listbox',
									name   : 'cw_select_custom_field',
									label  : label,
									values : response,
							},],
							buttons: [{
									text: insert,
									onclick: "submit"
							}, {
									text: close,
									onclick: "close"
							}],
							width: 500,
							height: 500,
							onsubmit: function(e) {
								if( e.data.cw_select_custom_field == 0 ) {
									return false;
								}
								var selection = '{%' + e.data.cw_select_custom_field + '%}';
								window.tinymce.execCommand('mceInsertContent', false ,selection);
							}
						});
					});
				});
			},
		});
		
		tinymce.PluginManager.add( 'cw_custom_field_variable', tinymce.plugins.CWCustomFieldVariable );
	});

})( jQuery );
