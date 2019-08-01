(function() {
	tinymce.create('tinymce.plugins.table_of_content', {
		init : function(ed, url) {
			ed.addButton('table_of_content', {
				title : 'Table of Content',
				image : url+'/toclist.png',
				onclick : function() {
					var tag = prompt("Table Of Content Tag's", "Enter one or more html Tag's, if more seperate with comma");
					if (tag != null && tag != 'undefined')
						ed.execCommand('mceInsertContent', false, '[codeHouse-TOC tag="'+tag+'"]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : "Table of Content Shortcode",
				author : 'Omar Faruque',
				authorurl : 'http://aboutdhaka.com/',
				infourl : 'http://aboutdhaka.com/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('table_of_content', tinymce.plugins.table_of_content);
})();