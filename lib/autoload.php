<?php 
$directories = ['config','core','controllers','models'];
foreach ($directories as $key => $value) {
	if(is_dir($value)){
		foreach (scandir($value) as $file) {
		    if ( in_array($file, ['.','..'])) continue;
		    require_once $value.'/'.$file;
		}
	}
}