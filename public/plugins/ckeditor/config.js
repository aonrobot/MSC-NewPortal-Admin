/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

 var roxyFileman = '/newportal/plugins/fileman/index.html';

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.colorButton_colors = '6C7A89,D2D7D3,EEEEEE,95A5A6,ABB7B7,F2F1EF,BFBFBF,E9D460,FDE3A7,F89406,EB9532,E87E04,F4B350,F2784B,EB974E,F5AB35,D35400,F39C12,F9690E,F9BF3B,4ECDC4,A2DED0,87D37C,90C695,26A65B,03C9A9,68C3A3,65C6BB,1BBC9B,1BA39C,66CC99,36D7B7,3FC380,019875,03A678,2ABB9B,00B16A,1E824C,049372,26C281,446CB3,4183D7,59ABE3,81CFE0,52B3D9,C5EFF7,22A7F0,3498DB,2C3E50,19B5FE,336E7B,22313F,6BB9F0,1E8BC3,3A539B,34495E,67809F,2574A9,1F3A93,89C4F4,4B77BE,5C97BF,663399,674172,AEA8D3,913D88,9A12B3,BF55EC,BE90D4,8E44AD,9B59B6,DB0A5B,F64747,F1A9A0,D2527F,E08283,F62459,E26A6A,EC644B,D24D57,F22613,D91E18,96281B,EF4836,D64541,C0392B,CF000F,E74C3C';
	
	config.colorButton_enableMore = false;
	
	config.skin = 'office2013';
	
	config.extraPlugins = 'htmlwriter,button,toolbar,undo,notification,wordcount';

	config.wordcount = {

	    // Whether or not you want to show the Word Count
	    showWordCount: true,

	    // Whether or not you want to show the Char Count
	    showCharCount: true,

	};

	//Fileman

	config.filebrowserBrowseUrl = roxyFileman;

    config.filebrowserImageBrowseUrl = roxyFileman + '?type=image';

    config.removeDialogTabs = 'link:upload;image:upload';

    CKEDITOR.timestamp = '"+Replace(Replace(Replace(Replace(Replace(Replace(CurrDateTime()," ",""),"/",""),"\",""),"-",""),":",""),".","")+"';
};
