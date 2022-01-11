<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title"><?php getTranslation("webapppluginheaderdownloadtitle") ?></h3>
    <div class="responsiveMySite--container--content">
      <?php getTranslation("webappluginlabel") ?>
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