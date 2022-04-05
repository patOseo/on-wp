<?php

$current_uid = get_current_user_id();

// Remove unwanted Dashboard menus
function remove_menus () {
    if(!current_user_can('administrator')) {
        global $menu;
        $restricted = array(__('Dashboard'));
        $restricted = array(__('Dashboard'), __('SEO'), __('Profile'), __('Appearance'), __('Tools'), __('Settings'), __('Comments'), __('Plugins'));
        end($menu);
        while(prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0]!= NULL?$value[0]:'',$restricted)){unset($menu[key($menu)]);}
        }
    }
}
add_action('admin_menu','remove_menus');