<?php
//
// jQuery File Tree PHP Connector
//
// Version 1.01
//
// Cory S.N. LaViska
// A Beautiful Site (http://abeautifulsite.net/)
// 24 March 2008
//
// History:
//
// 1.01 - updated to work with foreign characters in directory/file names (12 April 2008)
// 1.00 - released (24 March 2008)
//
// Output a list of files for jQuery File Tree
//

function utf8_urldecode($str) {
	return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
}

include './ChromePhp.php';

$dir = $_POST['dir'];

$dir = utf8_urldecode($dir);

if (file_exists('wfio://' . $root . $dir)) {
	$files = scandir('wfio://' . $root . $dir);

	natcasesort($files);
	if (count($files) > 2) {
		/* The 2 accounts for . and .. */
		echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
		// All dirs
		foreach ($files as $file) {

			$file = urldecode($file);

			if (file_exists('wfio://' . $root . $dir . $file) && $file != '.' && $file != '..' && is_dir('wfio://' . $root . $dir . $file)) {
				echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . $dir . $file . "/\">" . $file . "</a></li>";
			}
		}
		// All files
		foreach ($files as $file) {
			//ChromePhp::log($file);
			if (file_exists('wfio://' . $root . $dir . $file) && $file != '.' && $file != '..' && !is_dir('wfio://' . $root . $dir . $file)) {
				$ext = preg_replace('/^.*\./', '', $file);
				$dot_pos = strrpos($file, '.');
				$file_exten = substr($file, $dot_pos);
				if ($file_exten == '.pdf') {
					echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . '/newportal/plugins/pdfjs/web/viewer.html?file=' . $dir . $file . "\">" . $file . "</a></li>";
				} else {
					echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $dir . $file . "\">" . $file . "</a></li>";
				}

			}
		}
		echo "</ul>";
	}
}

?>