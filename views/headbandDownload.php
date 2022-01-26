<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title"><?php getTranslation("webapppluginheaderdownloadtitle") ?></h3>
    <div class="responsiveMySite--container--content">
      <?php getTranslation("wordpresstutoinstall") ?>
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
    <div>
      <h3><?php getTranslation("modalwebappcodetitle") ?> <?php echo $webApp->webAppCode ?></h3>
      <img width="64" height="64" src="<?php echo ADD_CODE_ICON_URL ?>" alt="Icon add code to application" />
    </div>
    <div>
      <form id="responsiveMySite--form-conf-app" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <p class="submit wp-core-ui">
      <input type="submit" name="sentMail" value="<?php getTranslation("modalwebappsendstore") ?>"
      class="button button-primary"
      <?php if($webApp->sentMail === "1") echo "disabled='disabled'" ?>
      />
      </p>
      </form>
    </div>
</div>