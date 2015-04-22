/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
//FCKConfig.Plugins.Add( 'syntaxhighlight2', 'en') ;

CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'MyToolbar';
	config.toolbar_MyToolbar =
	[
		{ name: 'document', items : [ 'button-pre', '-', 'Source' ] },
		{ name: 'styles', items : [ 'Styles','Format' ] },
		
		{ name: 'insert', items : [ 'Image' ] },
		
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'tools', items : [ 'Maximize','-','About' ] }
	];
	//config.startupOutlineBlocks = true;
	config.extraPlugins = "button-pre,tab";
	
	config.tabIndex = 1;
	config.tabSpaces = 4;
	config.height = 500;
};

