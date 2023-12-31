/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.skin = 'moono';
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
        '/',
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
		//{ name: 'editing', groups: ['find', 'selection'] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		//{ name: 'tools' },
		{ name: 'mode' }, // 'document', 'doctools' groups: ['mode']
		{ name: 'others' },
		//{ name: 'about' }
	];

	config.extraPlugins = 'contextmenu,youtube,docsuggest';//link1,
    // Define changes to default configuration here. For example:
	config.language = 'vi';
    // config.uiColor = '#AADC6E';

	config.toolbar_Basic =
    [
        ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'Find', 'Replace', 'Outdent', 'Indent', 'Source'],
        '/',
        ['Styles', 'Format', 'Font', 'FontSize', 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor']

    ];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.enterMode = CKEDITOR.ENTER_P;
};
