<?php if($webApp->sentMail === "1"):  ?>
<div class="update-nag notice notice-success inline">
Votre demande de mise en production a bien été enregistré. N'hésitez pas à contacter par mail en cas de longue attente à <a href="mailto:jazoulay@joazco.com">jazoulay@joazco.com</a>.</div>
<? endif; ?>
<?php if($success && $webApp->sentMail === "1") : ?>
    <br />
<? endif; ?>
<?php if($success):  ?>
<div class="update-nag notice notice-success inline">
<?php echo $success  ?></div>
<? endif; ?>