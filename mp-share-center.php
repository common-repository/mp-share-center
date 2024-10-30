<?php
/*
Plugin Name: MP Share Center
Plugin URI: http://MikesPickzWS.com/mp-share-center
Description: Add a convenient Social Sharing Toolbar above and/or below the post with the MP Share Center. This will add Facebook Like, Twitter Tweet, Google Plus, LinkedIn Share and StumbleUpon Stumble buttons and boxes to your content so readers can easily share your content. You can add a custom "Call to Action" to ask your users to share via the easy options page.
Version: 1.0
Author: MikesPickz Web Solutions, Inc.
Author URI: http://MikesPickzWS.com
License: GPL2
*/

/*  Copyright 2011  MikesPickz Web Solutions, Inc.  (email : Mike@MikesPickzWS.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//Initiate Options
function mp_share_center_init() { 
	register_setting('mp_sc_options', 'mp_share_center_options', 'mp_share_center_options_validate');
}
add_action('admin_init', 'mp_share_center_init');

//Create Settings Page
function mp_share_center_add_page() {
	add_options_page('MP Share Center Options', 'MP Share Center', 'manage_options',  __FILE__, 'mp_share_center_options_page');
}
add_action('admin_menu', 'mp_share_center_add_page');

//Actual Content of Settings Page
function mp_share_center_options_page() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	} ?>
    <div class="wrap">
    <div class="icon32" id="icon-tools"><br /></div>
    <h2>MP Share Center Options</h2>
    <h4>Brought to you by <a href="http://MikesPickzWS.com" target="_blank">MikesPickz Web Solutions, Inc.</a></h4>
    <form method="post" action="options.php">
	<?php settings_fields('mp_sc_options'); ?>
    <?php $options = get_option('mp_share_center_options'); ?>
<table class="form-table">
<tr><td colspan="2"><strong>Where Should the Share Center be Displayed?</strong></td></tr>
<tr valign="top">
<td align="right">Front Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_front]" value="1" <?php checked('1', $options['mp_share_display_front']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Main Blog Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_home]" value="1" <?php checked('1', $options['mp_share_display_home']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Post:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_post]" value="1" <?php checked('1', $options['mp_share_display_post']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_page]" value="1" <?php checked('1', $options['mp_share_display_page']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Archive:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_archive]" value="1" <?php checked('1', $options['mp_share_display_archive']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Search:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_search]" value="1" <?php checked('1', $options['mp_share_display_search']); ?> /></td>
</tr>
<tr><td colspan="2"><small>Which page-types should the Share Center be displayed?</small></td></tr>

<tr valign="top">
<th scope="row"><strong>Share Center Location</strong></th>
<td>Above Post: <input type="checkbox" name="mp_share_center_options[mp_share_location_top]" value="1" <?php checked('1', $options['mp_share_location_top']); ?> /><br />Below Post: <input type="checkbox" name="mp_share_center_options[mp_share_location_below]" value="1" <?php checked('1', $options['mp_share_location_below']); ?> /></td>
</tr>
<tr><td colspan="2"><small>Select if you would like the Share Center to be above the post, below the post or both.</small></td></tr>

<tr valign="top">
<th scope="row"><strong>Share Center Call to Action</strong></th>
<td> <input style="width: 400px;" type="text" name="mp_share_center_options[mp_share_action]" value="<?php echo stripslashes ($options['mp_share_action']); ?>" /></td>
</tr>
<tr><td colspan="2"><small>Text to display above the Share Center (ie: Share and Enjoy). Only displayed below the post.</small></td></tr>

<tr valign="top">
<th scope="row"><strong>Twitter User Name</strong></th>
<td>@<input style="width: 400px;" type="text" name="mp_share_center_options[mp_share_twitter_name]" value="<?php echo stripslashes ($options['mp_share_twitter_name']); ?>" /></td>
</tr>
<tr><td colspan="2"><small>Name to display at the end of Tweets posted with Tweet button</small></td></tr>
</table>
        
    	<p class="submit">
    	<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
    	</p>
    </form>
</div>
<?php
}

//Validate the options before database insertion
function mp_share_center_options_validate($input) {
	if ( ! isset( $input['mp_share_display_front'] ) )
		$input['mp_share_display_front'] = null;
		$input['mp_share_display_front'] = ( $input['mp_share_display_front'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_home'] ) )
		$input['mp_share_display_home'] = null;
		$input['mp_share_display_home'] = ( $input['mp_share_display_home'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_post'] ) )
		$input['mp_share_display_post'] = null;
		$input['mp_share_display_post'] = ( $input['mp_share_display_post'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_page'] ) )
		$input['mp_share_display_page'] = null;
		$input['mp_share_display_page'] = ( $input['mp_share_display_page'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_archive'] ) )
		$input['mp_share_display_archive'] = null;
		$input['mp_share_display_archive'] = ( $input['mp_share_display_archive'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_search'] ) )
		$input['mp_share_display_search'] = null;
		$input['mp_share_display_search'] = ( $input['mp_share_display_search'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_location_top'] ) )
		$input['mp_share_location_top'] = null;
		$input['mp_share_location_top'] = ( $input['mp_share_location_top'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_location_below'] ) )
		$input['mp_share_location_below'] = null;
		$input['mp_share_location_below'] = ( $input['mp_share_location_below'] == 1 ? 1 : 0 );
	$input['mp_share_action'] =  wp_filter_post_kses($input['mp_share_action']);
	$input['mp_share_twitter_name'] =  wp_filter_post_kses($input['mp_share_twitter_name']);

	return $input;
}

//Add Settings Link on Plugins Page
function mp_share_center_add_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
 
	if ($file == $this_plugin){
		$settings_link = '<a href="admin.php?page=mp-share-center/mp-share-center.php">'.__("Settings").'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
add_filter('plugin_action_links', 'mp_share_center_add_settings_link', 10, 2);

//<head> Includes
function mp_share_center_head_includes() { 
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	//The stylesheet to load
	$css = "<link href='http://fonts.googleapis.com/css?family=Permanent+Marker&amp;v1' rel='stylesheet' type='text/css' />";
	//Check what type of page this is
	if (is_admin()) { }
	elseif (is_front_page()) { if ($display_front == 1) { echo $css; } }
	elseif (is_home()) { if ($display_home == 1) { echo $css; } }
	elseif (is_single()) { if ($display_post == 1) { echo $css; } }
	elseif (is_page()) { if ($display_page == 1) { echo $css; } }
	elseif (is_archive()) { if ($display_archive == 1) { echo $css; } }
	elseif (is_search()) { if ($display_search == 1) { echo $css; } }
}
add_action('wp_head', 'mp_share_center_head_includes'); 

//Takes the first image in a post and sets it as the thumbnail for the Facebook Like Button
function mp_share_center_fb_like_thumbnails() {
	global $posts;
	$default = '';
	$content = $posts[0]->post_content; // $posts is an array, fetch the first element
	$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	if ( $output > 0 )
		$thumb = $matches[1][0];
	else
		$thumb = $default;

	echo "<link rel=\"image_src\" href=\"$thumb\" /><!-- Facebook Like Thumbnail -->";
}
add_action( 'wp_head', 'mp_share_center_fb_like_thumbnails' );

//Footer Includes
function mp_share_center_footer_includes() {
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	//The scripts to load
	$twitter = '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><!--Twitter Tweet Button-->';
	$facebook = '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><!--Facebook Like Button-->';
	$google = '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><!--Google +1 Button-->';
	$linkedin = '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><!--LinkedIn Share Button-->';
	//Check what type of page this is
	if (is_admin()) { }
	elseif (is_front_page()) { if ($display_front == 1) { echo $twitter.$facebook.$google.$linkedin; } }
	elseif (is_home()) { if ($display_home == 1) { echo $twitter.$facebook.$google.$linkedin; } }
	elseif (is_single()) { if ($display_post == 1) { echo $twitter.$facebook.$google.$linkedin; } }
	elseif (is_page()) { if ($display_page == 1) { echo $twitter.$facebook.$google.$linkedin; } }
	elseif (is_archive()) { if ($display_archive == 1) { echo $twitter.$facebook.$google.$linkedin; } }
	elseif (is_search()) { if ($display_search == 1) { echo $twitter.$facebook.$google.$linkedin; } }
}
add_action('wp_footer', 'mp_share_center_footer_includes');

//Add the Share Center to the Content
function mp_share_center_insert_content($content) { 
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	$location_top = $options['mp_share_location_top'];
	$location_below = $options['mp_share_location_below'];
	$share = stripslashes ($options['mp_share_action']);
	$twitter = stripslashes ($options['mp_share_twitter_name']);
	//Gather Post Link Information
	$long_link = urlencode(get_permalink($post->ID));
	$short_link = urlencode(wp_get_shortlink(get_the_ID()));
	
	//Buttons for above the post
	$buttons = "<ul style='display:inline;'>";
	$buttons .= "<li style='float: left; list-style:none;'><fb:like href='$long_link' send='false' layout='button_count' width='' show_faces='false' font='arial'></fb:like></li>";
	$buttons .= "<li style='float: left; list-style:none;'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='horizontal' data-via='$twitter'>Tweet</a></li>";
	$buttons .= "<li style='float: left; list-style:none;'><g:plusone size='medium'></g:plusone></li>";
	$buttons .= "<li style='float: left; list-style:none;'><script type='in/share' data-counter='right'></script></li>";
	$buttons .= "<li style='float: left; list-style:none; padding-left: 20px; margin-top:1px;'><script src='http://www.stumbleupon.com/hostedbadge.php?s=1'></script></li>";
	$buttons .= "</ul>";
	$buttons .= "<div style='clear:both;'></div>";
	
	//Boxes for below the post
	$boxes = "<div id='sharethis'><br />";
	$boxes .= "<span style='font-family: \"Permanent Marker\", arial, serif; font-size:32px;'>$share<br /></span>";
	$boxes .= "<ul style='display:inline;'>";
	$boxes .= "<li style='float: left; list-style:none; width:100px;'><fb:like href='$long_link' send='false' layout='box_count' width='' show_faces='false' font='arial'></fb:like></li>";
	$boxes .= "<li style='float: left; list-style:none; width:100px;'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='vertical' data-via='$twitter'>Tweet</a></li>";
	$boxes .= "<li style='float: left; list-style:none; width:100px;'><g:plusone size='tall'></g:plusone></li>";
	$boxes .= "<li style='float: left; list-style:none; width:100px;'><script type='in/share' data-counter='top'></script></li>";
	$boxes .= "<li style='float: left; list-style:none; width:100px;'><script src='http://www.stumbleupon.com/hostedbadge.php?s=5'></script></li>";
	$boxes .= "</ul>";
	$boxes .= "<div style='clear:both;'></div>";
	$boxes .= "</div>";
	
	//Check what type of page this is
	if (is_admin()) { return $content; }
	elseif (is_front_page()) { if ($display_front == 0) { return $content; } }
	elseif (is_home()) { if ($display_home == 0) { return $content; } }
	elseif (is_single()) { if ($display_post == 0) { return $content; } }
	elseif (is_page()) { if ($display_page == 0) { return $content; } }
	elseif (is_archive()) { if ($display_archive == 0) { return $content; } }
	elseif (is_search()) { if ($display_search == 0) { return $content; } }
	
	//If the user has selected to show Share Center, where?
	if ($location_top == 0 && $location_below == 0) { return $content; } 
	elseif ($location_top == 1 && $location_below == 0) { return $buttons.$content; } 
	elseif ($location_top == 0 && $location_below == 1) { return $content.$boxes; } 
	elseif ($location_top == 1 && $location_below == 1) { return $buttons.$content.$boxes; }
	
return $content;
}
add_filter('the_content', 'mp_share_center_insert_content', 25);

//Delete Database fields on deactivation
/*function mp_share_center_remove() {
	delete_option('mp_share_center_options');
}
register_deactivation_hook( __FILE__, 'mp_share_center_remove');*/
?>