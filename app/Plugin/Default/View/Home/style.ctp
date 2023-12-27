<?php
// pr($settings);
echo WWW_ROOT;
$theme_settings = $settings['theme_setting'];
$arr = json_decode($theme_settings, true);

if(isset($arr['s1']))
{
	$d = $arr['s1'];

	if($d['background'] != '')
		echo 'button.dropdownMenuButtonsearch, .main-menu { background: '. $d['background'] .' !important; }' . "\n";

	if($d['background_2'] != '')
		echo '.main-menu .mn-dropdown button.dropdownMenuButtonmm { background: '. $d['background_2'] .' !important; }' . "\n";
}
?>

