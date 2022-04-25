<?php
    if(have_posts()): while(have_posts()): the_post();
      $page_meta_title = rwmb_meta('page_meta_title') ?? '';
      $page_meta_description = rwmb_meta('page_description');
      $page_meta_keywords = rwmb_meta('page_keywords');
      $sm_feature_image = rwmb_meta('sm_feature_image');
    endwhile;endif;

    $site_info = get_posts(array("name"=>"site-information", "post_type"=>"page", "numberposts"=>'1'));
    $fav_icon = rwmb_meta('fav_icon', array(), $site_info[0]->ID) ?? '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?php echo $page_meta_description ?? ''; ?>">
    <meta name="keywords" content="<?php echo $page_meta_description ?? ''; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo $fav_icon['url'] ?? ''; ?>" type="image/gif" sizes="16x16">
    <meta property="og:image" content="<?php echo $sm_feature_image['full_url'] ?? ''; ?>">
    <title><?php echo !empty($page_meta_title)?$page_meta_title:'Diberr Consulting'; ?></title>
    <script src="https://kit.fontawesome.com/0da91a7850.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Merriweather:wght@300;400;700;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->
    <!-- <link rel="stylesheet" href="flickity.css" media="screen" /> -->
  </head>
  <body>
    <div class="bodycontent">