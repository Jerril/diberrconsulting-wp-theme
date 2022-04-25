<footer class="yaxisspacing">
  <div class="xaxisspacing">
    <div class="row py-lg-5 py-4">
      <div class="col-md-6 col-lg-4">
        <h3 class="mainheader3 text-white whiteborderbottom mb-0 pb-2">
          <?php echo $footer1["fs1_label"] ?? ''; ?>
        </h3>

        <p class="smallerparagraph text-white mt-4 mb-0"></p>
        <?php
            $footer_links = $footer1['add_links'] ?? '';

            if($footer_links){
              foreach($footer_links as $fl){ ?>
                <a href="<?php echo $fl['al_url'] ?? ''; ?>" target="<?php if($fl["al_open_new_tab"] == "yes") echo "_blank"  ?>"><p class="smallerparagraph text-white"><?php echo $fl['al_label'] ?? ''; ?></p></a>
              <?php }
            }
        ?>
      </div>
      <div class="col-md-6 col-lg-4 my-4 my-md-0">
        <h3 class="mainheader3 text-white whiteborderbottom mb-0 pb-2">
          <?php echo $footer2["fs2_label"] ?? ''; ?>
        </h3>
        <p class="smallerparagraph text-white mt-4">
          <?php echo $footer2["fs2_blurb"] ?? ''; ?>
        </p>
        <a href="<?php echo $footer2["fs2_button_url"] ?? ''; ?>" target="<?php if($footer2["fs2_open_new_tab"] == "yes") echo "_blank"  ?>"><button class="reachoutbtn btn py-2"><?php echo $footer2["fs2_button_label"] ?? ''; ?></button></a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4 mt-md-0">
        <h3 class="mainheader3 text-white whiteborderbottom mb-0 pb-2">
          <?php echo $newsletter_sub["stn_label"] ?? ''; ?>
        </h3>
        <p class="smallerparagraph text-white mt-4">
          <?php echo $newsletter_sub["stn_blurb"] ?? ''; ?>
        </p>
        <form action="" method="POST" class="newsletterinput">
          <fieldset class="fieldInput">
            <input
              name="email"
              class="form-input"
              type="email"
              placeholder="EMAIL ADDRESS"
              required
            />
            <button type="submit" name="subscribe-to-newsletter" class="form-submit text-white">
              <?php echo $newsletter_sub["stn_button_label"] ?? ''; ?>
            </button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</footer>