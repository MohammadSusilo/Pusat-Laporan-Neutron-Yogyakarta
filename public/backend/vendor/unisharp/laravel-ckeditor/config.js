/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,notification,button,toolbar,clipboard,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,copyformatting,div,resize,elementspath,enterkey,entities,popup,filetools,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,tableselection,undo,lineutils,widgetselection,widget,notificationaggregator,wsc';
	config.skin = 'moono-lisa';
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	// config.filebrowserBrowseUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
    // config.filebrowserImageBrowseUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
    // config.filebrowserFlashBrowseUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
    // config.filebrowserUploadUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
    // config.filebrowserImageUploadUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	// config.filebrowserFlashUploadUrl = 'vendor/unisharp/laravel-ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
	// config.filebrowserUploadMethod = 'form';

	config.filebrowserBrowseUrl = 'http://localhost/SiaNeutron/newblog/public/vendor/unisharp/laravel-ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=';
	config.filebrowserImageBrowseUrl = 'http://localhost/SiaNeutron/newblog/public/vendor/unisharp/laravel-ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=';
	config.filebrowserUploadUrl = 'http://localhost/SiaNeutron/newblog/public/vendor/unisharp/laravel-ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr='; 
	config.filebrowserImageBrowseLinkUrl = "http://localhost/SiaNeutron/newblog/public/vendor/unisharp/laravel-ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=";
};
