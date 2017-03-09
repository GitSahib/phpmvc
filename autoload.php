<?php 
$directories = ['config','core','controllers','models','lib'];
foreach ($directories as $key => $value) {
	if(is_dir($value)){
		foreach (scandir($value) as $file) {
		    if ( in_array($file, ['.','..'])) continue;
		    require_once $value.'/'.$file;
		}
	}
}