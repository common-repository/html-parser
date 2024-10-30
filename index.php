<?php
/**
 * @package HTML Parser
 */
/*
Plugin Name: HTML Parser
Plugin URI: http://wordpress.org/plugins/html-parser/
Description: A simple Plugin for Parsing your <strong>HTML Code</strong>. For example: '&lt;html&gt;' will get converted into ' &amp;lt;html&amp;gt; '
Version: 1.0
Author: Rishabh Shah
Author URI: http://profiles.wordpress.org/rishabh_19/
License: GPLv2 or later
*/

add_action( 'admin_menu', 'register_my_htmlparser' );

function register_my_htmlparser(){
    add_menu_page( 'My HTML Parser', 'HTML Parser', 'manage_options', 'htmlparserpage', 'parser', plugins_url( 'html-parser/icon.png' ), 99 ); 
}

function parser(){
	?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var raw_code;
				jQuery('#convert').on('click',function(){
					raw_code = jQuery('#raw').val();
					raw_code = raw_code.replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/'/g,'&#039').replace(/"/g,'&quot');
					jQuery('#converted').text(raw_code);
				});
			});
		</script>

		<div id="wpbody">
			<div class="wrap">
				<h2>HTML Parser</h2><br>
				
				<label> Write Your Code Here :</label><br>
				<textarea id="raw" rows="5" cols="100"></textarea><br><br>
				<button id="convert">Convert</button>
				<br><br>
				<label>Converted Code :</label><br>
				<textarea id="converted" rows="5" cols="100"></textarea>
				
			<div class="clear"></div>
		</div>
	<?php
}

add_shortcode('parse','parser');
?>