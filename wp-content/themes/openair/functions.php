<?php
global $openair_options;
  
if (function_exists('register_sidebar')) {
    register_sidebar(array('name'=>'sidebar_one',
        'before_widget' => '<div class="top"></div><div class="middle">',
        'after_widget' => '</div><div class="bottom"></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));
    register_sidebar(array('name'=>'sidebar_two',
        'before_widget' => '<div class="top"></div><div class="middle">',
        'after_widget' => '</div><div class="bottom"></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));
}
	
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) $file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}

remove_action('wp_head', 'wp_generator');

function csv_tags() {
    $posttags = get_the_tags();
    foreach((array)$posttags as $tag) {
        $csv_tags .= $tag->name . ',';
    }
    echo '<meta name="keywords" content="'.$csv_tags.'" />';
}


$theme_data      = get_theme('OpenAir');
$openair_version = $theme_data['Version'];
$openair_options = get_option('openair_options');


$old_options = $openair_options;
if (!$openair_options['sidebar_pos']) $openair_options['sidebar_pos'] = 'right';
if (!$openair_options['no_of_columns']) $openair_options['no_of_columns'] = 'two';
if (!$openair_options['column_pos']) $openair_options['column_pos'] = 'left';
if (!$openair_options['avatar_pos']) $openair_options['avatar_pos'] = 'right';


if ($old_options != $openair_options)
	update_option('openair_options', $openair_options);


/* Adding the admin menu in; */
add_action('admin_menu', 'openair_add_theme_page');
add_action('admin_head', 'openair_theme_page_head');


/* Adding the t heme page to the admin panel; */
function openair_add_theme_page() { 
	add_theme_page(__('OpenAir Options'), 'OpenAir Options', 'edit_themes', basename(__FILE__), 'openair_theme_page');
}


/* Adding style in for the theme page header; */
function openair_theme_page_head() {
?>
<style type="text/css">
#openair_options_form {
  width: 620px;
  padding: 0 10px;
}
table.form-table {
  width: 600px;
  text-align: left;
}
#openair_options_form fieldset {
  border: 1px solid #ccc;
  background-color: #fff;
  padding: 5px 5px 10px 5px;
  margin: 0 5px 25px 5px;
}
#openair_options_form legend {
  padding: 2px 10px;
  margin: 0 0 0 25px;
  background-color: #fff;
  position: relative;
  font-size: 16px;
  font-weight: bold;
  top: -15px;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-right: 1px solid #ccc;
}
#openair_options_form td {
  padding: 0 0 10px 0; margin: 0;
}
#openair_options_form h3 {
  padding: 0; margin: 0;
}
#openair_options_form p {
  width: 100%;
  padding: 0; margin: 0;
}
</style>
<?php
}

function openair_theme_page() {
    global $openair_options;
	
	if (isset($_GET['dismiss'])) {
		$openair_actions = get_option('openair_actions');
		$openair_actions[$_GET['dismiss']] = 0;
		update_option('openair_actions', $openair_actions);
	}
	
	if (isset($_POST['updated'])) {
		foreach (array
					(
					'sidebar_pos',
					'no_of_columns',
					'column_pos',
					'avatar_pos',
					) as $field) {
			$openair_options[$field] = $_POST[$field];
		}
			
		update_option('openair_options', $openair_options);
			
		echo '<div class="updated fade"><p>Options updated.</p></div>';
	}
?>
<div class='wrap'>
	<h2><?php _e('Customize Openair Theme'); ?></h2>
		
	<br />
	
	<p>
	    This is version <?php $oa = get_theme('OpenAir'); echo $oa['Version']; ?> of <a href="http://www.theenglishguy.co.uk/openair-theme/" rel="tag" title="Show your support, please make a donation">Openair</a> - are you using the latest version? If you enjoy this theme, please consider making a donation from my <a href="http://www.theenglishguy.co.uk/" title="The English Guy Web Design">homepage</a>. Thank you!
	</p>

	<form method="post" id="openair_options_form" name="openair_options_form" action="<?php echo attribute_escape($_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="updated" value="1" />
		
        <fieldset>
          <legend>Columns</legend>
		<table class="form-table">
        	<tr valign="top">
            	<td width="150"><h3>No. of Columns</h3></td>
                <td colspan="4">
                  <p>Do you want this theme to display two or three columns?</p>
                </td>
            </tr>
            <tr valign="top">
            	<td width="150">&nbsp;</td>
				<td width="125"><?php _e('Two Columns'); ?>&nbsp;<input type="radio" name="no_of_columns" value="two" <?php echo ($openair_options['no_of_columns'] == 'two' ? 'checked="checked"' : ''); ?> /></td>
				<td width="125"><?php _e('Three Columns'); ?>&nbsp;<input type="radio" name="no_of_columns" value="three" <?php echo ($openair_options['no_of_columns'] == 'three' ? 'checked="checked"' : ''); ?> /></td>
                <td colspan="2">&nbsp;</td>
            </tr>
        
<?php if ($openair_options['no_of_columns'] == 'two') { ?>
            <tr valign="top">
                <td width="150" valign="top"><h3>Sidebar Left/Right</h3></td>
                <td colspan="4" valign="top">
                  <p>
                  The default value is to have the sidebar on the right side. You can select the side here though, to <em>right</em> or <em>left</em>.
                  </p>
                </td>
            </tr>
			<tr valign="top">
                <td width="150">&nbsp;</td>
				<td width="125"><?php _e('Left'); ?>&nbsp;<input type="radio" name="sidebar_pos" value="left" <?php echo ($openair_options['sidebar_pos'] != 'right' ? 'checked="checked"' : ''); ?> /></td>
				<td width="125"><?php _e('Right'); ?>&nbsp;<input type="radio" name="sidebar_pos" value="right" <?php echo ($openair_options['sidebar_pos'] == 'right' ? 'checked="checked"' : ''); ?> /></td>
                <td colspan="2">&nbsp;</td>
			</tr>
            
<?php } else { ?>

            <tr valign="top">
                <td width="150" valign="top"><h3>Column Positions</h3></td>
                <td colspan="4" valign="top">
                  <p>
                  This is where you can set where you want the three columns to appear. The options are to have two left sidebars and content on the right, sidebars on each side of the content, or two right sidebars and content on the left.
                  </p>
                </td>
            </tr>
            <tr valign="top">
            	<td width="150">&nbsp;</td>
				<td width="125"><?php _e('Two left sidebars'); ?>&nbsp;<input type="radio" name="column_pos" value="left" <?php echo ($openair_options['column_pos'] == 'left' ? 'checked="checked"' : ''); ?> /></td>
				<td width="125"><?php _e('Side sidebars'); ?>&nbsp;<input type="radio" name="column_pos" value="center" <?php echo ($openair_options['column_pos'] == 'center' ? 'checked="checked"' : ''); ?> /></td>
				<td width="125"><?php _e('Two right sidebars'); ?>&nbsp;<input type="radio" name="column_pos" value="right" <?php echo ($openair_options['column_pos'] == 'right' ? 'checked="checked"' : ''); ?> /></td>
                <td>&nbsp;</td>
            </tr>
<?php } ?>

		</table>
        </fieldset>
        
        <fieldset>
           <legend>Avatar</legend>
		<table class="form-table">
           <tr valign="top">
                <td width="150" valign="top"><h3>Avatar Position</h3></td>
                <td colspan="4" valign="top">
                  <p>
                  This is where you can set where you want the avatar to appear inside comments. Normally this is to the right side, but you can set it to the left here if you want.
                  </p>
                </td>
            </tr>
            <tr valign="top">
            	<td width="150">&nbsp;</td>
				<td width="150"><?php _e('Avatar to the left'); ?>&nbsp;<input type="radio" name="avatar_pos" value="left" <?php echo ($openair_options['avatar_pos'] == 'left' ? 'checked="checked"' : ''); ?> /></td>
				<td width="150"><?php _e('Avatar to the right'); ?>&nbsp;<input type="radio" name="avatar_pos" value="right" <?php echo ($openair_options['avatar_pos'] == 'right' ? 'checked="checked"' : ''); ?> /></td>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
        </fieldset>        
        
		<fieldset>
        	<legend>Update the Theme</legend>
		<table class="form-table">
			<tr valign="top">
				<td colspan="5">
					<p style="text-align:center;">
					Click to update the theme.
					</p>
					
					<input type="hidden" name="action" value="update" />
		
					<p class="submit" style="text-align:center;">
						<input type="submit" name="submitform" value="<?php echo attribute_escape(__('Update Theme')); ?>" />
					</p>
				</td>
			</tr>
		</table>
		</fieldset>
	</form>
</div>
<?php
}
?>