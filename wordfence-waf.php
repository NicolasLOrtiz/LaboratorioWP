<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

// This file was the current value of auto_prepend_file during the Wordfence WAF installation (Tue, 29 Sep 2020 21:41:29 +0000)
if (file_exists('C:/Users/Xcalius/AppData/Local/Programs/Local/resources/extraResources/local-bootstrap.php')) {
	include_once 'C:/Users/Xcalius/AppData/Local/Programs/Local/resources/extraResources/local-bootstrap.php';
}
if (file_exists('C:\\Users\\Xcalius\\Local Sites\\helloworld2\\app\\public\\wp-content\\plugins\\wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", 'C:\\Users\\Xcalius\\Local Sites\\helloworld2\\app\\public/wp-content/wflogs/');
	include_once 'C:\\Users\\Xcalius\\Local Sites\\helloworld2\\app\\public\\wp-content\\plugins\\wordfence/waf/bootstrap.php';
}
?>