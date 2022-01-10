<div class="wrap">
    <?php include(RESPONSIVEMYSITE__PLUGIN_DIR . '/views/headerSuccess.php') ?>
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
 
    <input type="hidden" name="action" value="admin_post_responsiveMySite_form_response" />
        <div id="universal-message-container">
            <h2>Votre application mobile <?php $webApp->name ?></h2>
    
            <h3>Information de l'app</h3>
            <div class="options">
                <p>
                    <label>Nom de l'application</label>
                    <br />
                    <input name="name" type="text" name="acme-message" value="<?php echo $webApp->name ?>" />
                </p>
            </div>
            <div class="options">
                <p>
                    <label>Couleur principale</label>
                    <br />
                    <input name="color" type="color" name="acme-message" value="<?php echo $webApp->color ?>" />
                </p>
            </div>
            <div class="options">
                <p>
                    <label>Image URL</label>
                    <br />
                    <input name="icon" type="text" name="acme-message" value="<?php echo $webApp->icon ?>" />
                    <br />
                   
                </p>
                <img src="<?php echo $webApp->icon ?>" />
            </div>
            <div class="options">
                <p>
                    <label>Orientation de l'app</label>
                    <br />
                    <select name="orientation">
                        <option <?php if($webApp->orientation === "1") echo "selected='selected'" ?> value="1">Tous</option>
                        <option <?php if($webApp->orientation === "2") echo "selected='selected'" ?> value="2">Portrait</option>
                        <option <?php if($webApp->orientation === "5") echo "selected='selected'" ?> value="5">Paysage</option>
                    </select>
                </p>
            </div>

            <h3>Barre de statut</h3>
            <div class="options">
                <p>
                    <label>Couleur de fond</label>
                    <br />
                    <input name="statusBarBackgroundColor" type="color" name="acme-message" value="<?php echo $webApp->statusBarBackgroundColor ?>" />
                </p>
            </div>
            <div class="options">
                <p>
                    <label>Couleur du texte</label>
                    <br />
                    <p><?php echo $webApp->statusBarStyle ?></p>
                    <select name="statusBarStyle">
                        <option <?php if($webApp->statusBarStyle === null) echo "selected='selected'" ?>></option>
                        <option <?php if($webApp->statusBarStyle === "dark") echo "selected='selected'" ?> value="dark">Noir</option>
                        <option <?php if($webApp->statusBarStyle === "light") echo "selected='selected'" ?> value="light">Blanc</option>
                    </select>
                </p>
            </div>
            <h3>Page de chargement</h3>
            <div class="options">
                <p>
                    <label>Temps d'affichage</label>
                    <br />
                    <input name="splashScreenDelay" type="number" max="10" min="1" name="acme-message" value="<?php echo $webApp->splashScreenDelay ?>" /> secondes
                </p>
            </div>
            <div class="options">
                <p>
                    <label>Couleur de fond</label>
                    <br />
                    <input name="splashScreenBackgroundColor" type="color" name="acme-message" value="<?php echo $webApp->splashScreenBackgroundColor ?>" />
                </p>
            </div>
        <?php
            // wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
            submit_button();
        ?>
 
    </form>
 
</div><!-- .wrap -->