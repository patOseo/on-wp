<?php

add_filter('manage_post_posts_columns', function($columns) {
	return array_merge($columns, ['blog_type' => __('Blog Type', 'textdomain')]);
});
 
add_action('manage_post_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'blog_type') {
		$blog_type = get_post_meta($post_id, 'blog_type', true);
		if ($blog_type) {
			echo '<span>'; echo ucfirst($blog_type); echo '</span>';
		}
	}
}, 10, 2);



/**
 * Add custom fields to the quick edit box
 * 
 * quick_edit_custom_box allows to add HTML in Quick Edit
 */
if (!function_exists('wpar_add_quick_edit')) {
    // $column_name stores only the custom fields
    function wpar_add_quick_edit($column_name, $post_type)
    {

        if (!($column_name === 'blog_type')) return;

        // # Note
        // The class names that use with fieldset tag, 
        // it can be inline-edit-col-left, inline-edit-col-center and inline-edit-col-right.
        // 
        // # Trick: You can use the inspection tool from your browser to see what classes the admin page uses in the quick edit box.
?>

        <?php
        switch ($column_name) {
            case 'blog_type':

                // We keeps all our custom fields inside the <fieldset>
                // # a first column then print out the fieldset tag here.
                echo '<fieldset class="inline-edit-col-right" style="border: 1px solid #dddddd;">
                        <legend style="font-weight: bold; margin-left: 10px;">Blog Type:</legend>
                        <div class="inline-edit-col">';


                // # note that, wp_nonce_field() must add it here at the first custom column. DO NOT add outside the switch().
                // Otherwise wp_nonce_field() will render every time that quick_edit_custom_box action hook is called for each column.
                wp_nonce_field('wpar_q_edit_nonce', 'wpar_nonce');
                echo '<label class="alignleft" style="width: 100%;">
                        <div class="input-text-wrap"><label for="announcement"><input id="announcement" type="radio" name="' . $column_name . '" value="announcement">Announcement</label></div>
                        <div class="input-text-wrap"><label for="blog"><input id="blog" type="radio" name="' . $column_name . '" value="blog">Blog</label></div>
                        <div class="input-text-wrap"><label for="news"><input id="news" type="radio" name="' . $column_name . '" value="news">News</label></div>
                        <div class="input-text-wrap"><label for="webinar"><input id="webinar" type="radio" name="' . $column_name . '" value="webinar">Webinar</label></div>
                      </label>';
                echo '<br><br>';
                // # a last column then print out the end tags of fieldset here.      
                echo '</div></fieldset>';
                break;
            default:
                break;
        }
    }

    // https://codex.wordpress.org/Plugin_API/Action_Reference/quick_edit_custom_box
    add_action('quick_edit_custom_box',  'wpar_add_quick_edit', 10, 2);

}



/**
 * Save the custom field value from the quick edit box 
 */
if (!function_exists(('wpar_quick_edit_save'))) {
    function wpar_quick_edit_save($post_id)
    {
        // # For quick edits use $_POST for storing the data.

        // If it is autosave, we don't do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;


        // check user capabilities
        if (
            !current_user_can('edit_post', $post_id)
        ) {
            return;
        }

        // check nonce
        if (
            !wp_verify_nonce($_POST['wpar_nonce'], 'wpar_q_edit_nonce')
        ) {
            return;
        }

        // update the website
        if (
            isset($_POST['blog_type'])
        ) {
            update_post_meta($post_id, 'blog_type', $_POST['blog_type']);
        }
    }

    // https://developer.wordpress.org/reference/hooks/save_post_post-post_type/
    add_action('save_post_mms_project_cpt', 'wpar_quick_edit_save');
}