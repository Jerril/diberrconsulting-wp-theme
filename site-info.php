<?php 
    // General Site Information
    $site_info = get_posts(array("name"=>"site-information", "post_type"=>"page", "numberposts"=>'1'));
    $si_id = $site_info[0]->ID;

    // logo on light bg
    $dark_logo = rwmb_meta('logo_on_light_bg', array(), $si_id) ?? '';
    // logo on dark bg
    $light_logo = rwmb_meta('logo_on_dark_bg', array(), $si_id) ?? '';
    
    // instagram handle
    $instagram_handle = rwmb_meta('instagram_handle', array(), $si_id) ?? '';
    // twitter handle
    $twitter_handle = rwmb_meta('twitter_handle', array(), $si_id) ?? '';
    // linkedin url
    $linkedin_url = rwmb_meta('linkedin_url', array(), $si_id) ?? '';
    // youtube channel handle
    $youtube_channel = rwmb_meta('youtube_channel_url', array(), $si_id) ?? '';
    // facebook page
    $facebook_page = rwmb_meta('facebook_page', array(), $si_id) ?? '';

    // Site Header, Footer, Menu Navigation
    $navpage = get_posts(array("name"=>"header-footer-menu-navigation", "post_type"=>"page", "numberposts"=>'1'));
    $navpage_id = $navpage[0]->ID;
    
    $header_nav_links = rwmb_meta('header_nav', array(), $navpage_id);
    $highlight_link = rwmb_meta('header_highlight_url', array(), $navpage_id);
    $menu_links = rwmb_meta('menu_nav', array(), $navpage_id);

    $footer1 = rwmb_meta('footer_section1', array(), $navpage_id);
    $footer2 = rwmb_meta('footer_section2', array(), $navpage_id);
    $newsletter_sub= rwmb_meta('stn', array(), $navpage_id);
