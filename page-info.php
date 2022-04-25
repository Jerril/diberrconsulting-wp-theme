<?php include_once("site-info.php"); ?>

<?php get_header(); ?>

<?php include "sidebar.php"; ?>

      <!-- main page content -->
      <div class="main-page-content">
        <div class="mt-0 pt-0">
          <div class="container-fluid mx-3 mx-md-5">
            
            <!-- HEADER NAVIGATION -->
            <?php include 'templates-parts/header-nav-blue.php'; ?>
            <!-- END-HEADER NAVIGATION -->
            
            <div class="mx-md-5 mx-3 px-md-5 px-0">
              <div class="pb-5">
                <div class="bottommiddlerow">
                  <div class="py-4 my-5">
                  <?php
                        if(!isset($_GET['msg'])){
                    ?>
                        <div class="constructionpage mx-md-5 px-md-4">
                            <h2 class="mainheader2 lightbold primarycolor text-center">Thank You for Subscribing to our newsletter</h2>
                            <div style="border:1px solid; width:20%; margin:0px auto;border-radius:20px;text-align:center; padding:10px 1px;" class="primary">
                                <a href="<?php echo wp_get_referer(); ?>" class="primary border-0"><i class="fas fa-arrow-left mr-3 primary"></i>Go Back</a>
                            </div>
                        </div>
                    <?php
                        }else{
                            if($_GET['msg']=='error'){

                    ?>
                        <div class="constructionpage mx-md-5 px-md-4">
                            <h2 class="mainheader2 lightbold primarycolor text-center">Sorry, There was error subscribing to our newsletter, try again</h2>
                            <div style="border:1px solid; width:20%; margin:0px auto;border-radius:20px;text-align:center; padding:10px 1px;" class="primary">
                                <a href="<?php echo wp_get_referer(); ?>" class="primary border-0"><i class="fas fa-arrow-left mr-3 primary"></i>Go Back</a>
                            </div>
                        </div>
                    <?php
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- footer -->
        <?php include 'templates-parts/page-footer.php'; ?>
      </div>

<?php get_footer(); ?>