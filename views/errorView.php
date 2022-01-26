<?php include(RESPONSIVEMYSITE__PLUGIN_DIR . '/views/headerSuccess.php') ?>
<?php include(RESPONSIVEMYSITE__PLUGIN_DIR . './views/header.php') ?>

<div class="wrap">
<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title"><?php getTranslation("webapppluginheaderdownloadtitle") ?></h3>
    <div class="responsiveMySite--container--content">
      <?php getTranslation("wordpressviewerror") ?>
    </div>
    <div class="responsiveMySite--container-content-stores">
      <div class="responsiveMySite--container-content-svg-stores">
        <a href="https://apps.apple.com/app/toplists/id1602521816" target="_blank">
          <img src="<?php echo APP_STORE_ICON_URL ?>" alt="Image App Store" />
        </a>
      </div>
      <div class="responsiveMySite--container-content-svg-stores">
        <a
          href="https://play.google.com/store/apps/details?id=com.joazco.responsiveMySite"
          target="_blank"
        >
          <img src="<?php echo PLAYSTORE_STORE_ICON_URL ?>" alt="Image Google Store" />
        </a>
      </div>
    </div>
</div>
</div>