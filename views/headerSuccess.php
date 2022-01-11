<?php if($webApp->sentMail === "1"):  ?>
<br />
<div class="update-nag notice notice-success inline">
<?php getTranslation("webapppluginsuccesssentmail") ?> <a href="mailto:jazoulay@joazco.com">jazoulay@joazco.com</a>.</div>
<? endif; ?>

<?php if($success):  ?>
<br />
<div class="update-nag notice notice-success inline">
<?php echo getTranslation("webapppluginformsuccess")  ?></div>
<? endif; ?>