<?php

/*
Plugin Name: Easy Store Locator
Description: This plugin allows to fetch the instagram feeds in your wordpress site. Just add the shortcode [easyinstagramfeed] in the normal wordpress page inorder to get the feeds.
Version: 0.1
Author: priyanshu.mittal,a.ankit
Author URI: http://webriti.com
License: GPLv2 or later
Text Domain: esl
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly




define( 'ESL__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ESL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action('admin_menu', 'esl_menu_pages');
add_action('admin_enqueue_scripts','esl_plugin_scripts');

//call shortcode file
require_once(ESL__PLUGIN_DIR.'/easystorelocator-shortcode.php');

function esl_plugin_scripts($hook){ 
    if($hook!='toplevel_page_easy-instagram-feed'){return;}
    
    // otherwise enqueu all the scripts required
    //wp_enqueue_script('eif_insta_admin',EIF__PLUGIN_URL.'lib/js/easy-feed-admin.js',array('jquery'));
   // wp_enqueue_style('eif_style',EIF__PLUGIN_URL.'lib/eif_style.css');
    
}

function esl_menu_pages(){
    
    
    add_menu_page(__('Easy Store Locator','esl'), __('Easy Store Locator','esl'), 'manage_options', 'easy-store-locator', 'esl_menu_output' );
    //add_submenu_page('my-menu', 'Settings', 'Whatever You Want', 'manage_options', 'my-menu' );
    //add_submenu_page('my-menu', 'Submenu Page Title2', 'Whatever You Want2', 'manage_options', 'my-menu2' );
}

function esl_menu_output () {
     $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general';
?>

 <h2 class="nav-tab-wrapper">
    <a href="?page=easy-store-locator&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>"><?php _e('General'); ?></a>
</h2>


<?php if ( $active_tab == 'general' ) { 
    require_once(ESL__PLUGIN_DIR.'lib/optionpanel/general-settings.php');?>
    <ol>
        <li>Step 1: To get the embed code <a href="http://easystorelocator.com/signup" target="_blank">SignUp Here</a></li>
        <li>Step 2: Configure  the store locations and click the Get Code tab. The pop up window will open set the height and width of the iframe and click the generate button,
        this will provide you the code. Copy this code and paste it in the textbox above.</li>
        <li>Step 3: Finally add the shortcode<strong>  [easystorelocator]  </strong> to display various locaiton on the wordpress pages/posts.</li>
        
    </ol>
<?php }//end of general tab



}

?>