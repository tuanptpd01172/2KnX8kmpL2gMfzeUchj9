/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        

//config.filebrowserImageBrowseUrl =    '/funiture2/app/webroot/js/kcfinder/';
//
//config.filebrowserFlashBrowseUrl =    '/funiture2/app/webroot/js/kcfinder/ckfinder.html?type=Flash';
//
//config.filebrowserUploadUrl =         '/funiture2/app/webroot/js/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
//
//config.filebrowserImageUploadUrl =    '/funiture2/app/webroot/js/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
//
//config.filebrowserFlashUploadUrl =    '/funiture2/app/webroot/js/kcfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
 config.filebrowserBrowseUrl =     '/public/vendor/ckfinder2/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/public/vendor/ckfinder2/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '/public/vendor/ckfinder2/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl =      '/public/vendor/ckfinder2/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/public/vendor/ckfinder2/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/public/vendor/ckfinder2/core/connector/php/connector.php?command=QuickUpload&type=Flash';     
	
};
