<?php 
$settings = $this->get_settings_for_display();

if ( empty( $settings['title'] ) ) {
	return;
}

$title = $settings['title'];

if(is_child_theme()){
	//$filePath = get_stylesheet_directory_uri().'/'.$title;
	//                            return child-theme folder name
	$filePath = get_theme_root().'/'.get_option('stylesheet').'/'.$title;
}else{
	$filePath = get_template_directory().'/'.$title;
}

if( file_exists($filePath) ){
	include($filePath);
}else{
	$filePathShort = explode("wp-content", $filePath);
	echo "<strong>(404) File not found:</strong><br>"."/wp-content".$filePathShort[1];
}
?>