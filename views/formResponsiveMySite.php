<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title">Configuration de l'app</h3>
    <div class="responsiveMySite--container--content">
    <form id="responsiveMySite--form-conf-app" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
 
 <!-- <input type="hidden" name="action" value="admin_post_responsiveMySite_form_response" /> -->
        <div class="responsiveMySite--form-field">
         <h3><span class="dashicons dashicons-text"></span> Information de l'app</h3>
         <div class="options">
             <p>
                 <label class="required">Url du site</label>
                 <br />
                 <input  type="text" name="acme-message" value="<?php echo $webApp->url ?>" disabled />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required">Code</label>
                 <br />
                 <input  type="text" name="acme-message" value="<?php echo $webApp->webAppCode ?>" disabled />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required">Nom de l'application</label>
                 <br />
                 <input name="name" type="text" name="acme-message" value="<?php echo $webApp->name ?>" required="required" />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required">Couleur principale</label>
                 <br />
                 <input name="color" type="color" name="acme-message" value="<?php echo $webApp->color ?>" required="required" />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required">Image URL</label>
                 <br />
                 <input name="icon" type="text" name="acme-message" value="<?php echo $webApp->icon ?>" required="required" 
                 pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)"
                 />
                 <br />
                
             </p>
             <img src="<?php echo $webApp->icon ?>" />
         </div>
         <div class="options">
             <p>
                 <label class="required">Orientation de l'app</label>
                 <br />
                 <select name="orientation">
                     <option <?php if($webApp->orientation === "1") echo "selected='selected'" ?> value="1">Tous</option>
                     <option <?php if($webApp->orientation === "2") echo "selected='selected'" ?> value="2">Portrait</option>
                     <option <?php if($webApp->orientation === "5") echo "selected='selected'" ?> value="5">Paysage</option>
                 </select>
             </p>
         </div>
</div>
         <div class="responsiveMySite--form-field">
         <h3><span class="dashicons dashicons-admin-appearance"></span> Barre de statut</h3>
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
                 <select name="statusBarStyle">
                     <option <?php if($webApp->statusBarStyle === null) echo "selected='selected'" ?> value="auto">Auto</option>
                     <option <?php if($webApp->statusBarStyle === "dark") echo "selected='selected'" ?> value="dark">Noir</option>
                     <option <?php if($webApp->statusBarStyle === "light") echo "selected='selected'" ?> value="light">Blanc</option>
                 </select>
             </p>
         </div>
        </div>
        <div class="responsiveMySite--form-field last-childs">
            <h3><span class="dashicons dashicons-format-status"></span> Page de chargement</h3>
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
        </div>
     <?php
         // wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
         submit_button();
     ?>

        </form>
    </div>
</div>
