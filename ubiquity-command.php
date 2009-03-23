<?php
/*
Plugin Name: Add Ubiquity command
Plugin URI:  http://www.gialloporpora.netsons.org
Description: Simple plugin to embed an Ubiquity command in WP page. To add a command simply associate  the command link to the custom field <b>ubiquity_command</b>. Optionally, you can specify the command name separating it with a comma.
Version: 1.0
Author: gialloporpora
Author URI:  http://www.gialloporpora.netsons.org
*/

function addUbiquityHeader() {
		global  $post;
		$id=$post -> ID;
		// getting meta info
		$meta = get_post_custom($id);	
		$s="";
		$data=split ( ",",$meta[ubiquity_command][0]);
		$command_url=$data[0];
		if (!$data[1]) $command_name="Ubiquity command";
		 else $command_name=$data[1];
		if ($command_url != '' && is_single()) {
			$s.="\t".'<link rel="commands" href="'.$command_url.' " name="'.$command_name.'	" />'."\n";	
			print $s;
		}
}

add_action('wp_head', 'addUbiquityHeader');
?>