<div class="responsiveMySite--container">
    <h3 class="responsiveMySite--container--title"><?php getTranslation("webapptitleplugin") ?></h3>
    <div class="responsiveMySite--container--content">
    <form id="responsiveMySite--form-conf-app" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
 
 <!-- <input type="hidden" name="action" value="admin_post_responsiveMySite_form_response" /> -->
        <div class="responsiveMySite--form-field">
         <h3><span class="dashicons dashicons-text"></span> <?php getTranslation("formfieldsectioninfos") ?></h3>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldurl") ?></label>
                 <br />
                 <input  type="text" name="acme-message" value="<?php echo $webApp->url ?>" disabled />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("modalwebappcodetitle") ?></label>
                 <br />
                 <input  type="text" name="acme-message" value="<?php echo $webApp->webAppCode ?>" disabled />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldnameapp") ?></label>
                 <br />
                 <input name="name" maxlength="20" type="text" name="acme-message" value="<?php echo $webApp->name ?>" required="required" />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldcolorprimary") ?></label>
                 <br />
                 <input name="color" type="color" name="acme-message" value="<?php echo $webApp->color ?>" required="required" />
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldimage") ?></label>
                 <br />
                 <input name="icon" type="text" name="acme-message" value="<?php echo $webApp->icon ?>" required="required" 
                 pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)"
                 />
                 <br />
                
             </p>
             <img src="<?php echo $webApp->icon ?>" width="60" height="60" />
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldadvancedorientation") ?></label>
                 <br />
                 <select name="orientation">
                     <option <?php if(strval($webApp->orientation) === "1") echo "selected='selected'" ?> value="1"><?php getTranslation("optionall") ?></option>
                     <option <?php if(strval($webApp->orientation) === "2") echo "selected='selected'" ?> value="2"><?php getTranslation("optionportrait") ?></option>
                     <option <?php if(strval($webApp->orientation) === "5") echo "selected='selected'" ?> value="5"><?php getTranslation("optionlandscape") ?></option>
                 </select>
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldgeolocation") ?></label>
                 <br />
                 <select name="geolocation">
                    <option <?php if($webApp->geolocation === 1) echo "selected='selected'" ?> value="1"><?php getTranslation("optionyes") ?></option>
                    <option <?php if($webApp->geolocation === 0) echo "selected='selected'" ?> value="0"><?php getTranslation("optionno") ?></option>
                 </select>
             </p>
         </div>
         <div class="options">
             <p>
                 <label class="required"><?php getTranslation("formfieldnotificationpush") ?></label>
                 <br />
                 <select name="notificationPush">
                    <option <?php if($webApp->notificationPush === 1) echo "selected='selected'" ?> value="1"><?php getTranslation("optionyes") ?></option>
                    <option <?php if($webApp->notificationPush === 0) echo "selected='selected'" ?> value="0"><?php getTranslation("optionno") ?></option>
                 </select>
             </p>
         </div>
    </div>
         <div class="responsiveMySite--form-field">
         <h3><span class="dashicons dashicons-admin-appearance"></span> <?php getTranslation("formfieldsectionstatusbar") ?></h3>
         <div class="options">
             <p>
                 <label><?php getTranslation("formfieldstatusbarbgcolor") ?></label>
                 <br />
                 <input name="statusBarBackgroundColor" type="color" name="acme-message" value="<?php echo $webApp->statusBarBackgroundColor ?>" />
             </p>
         </div>
         <div class="options">
             <p>
                 <label><?php getTranslation("formfieldstatusbarcolortext") ?></label>
                 <br />
                 <select name="statusBarStyle">
                     <option <?php if($webApp->statusBarStyle === null) echo "selected='selected'" ?> value="auto"><?php getTranslation("optionAuto") ?></option>
                     <option <?php if($webApp->statusBarStyle === "dark") echo "selected='selected'" ?> value="dark"><?php getTranslation("optionDark") ?></option>
                     <option <?php if($webApp->statusBarStyle === "light") echo "selected='selected'" ?> value="light"><?php getTranslation("optionWhite") ?></option>
                 </select>
             </p>
         </div>
        </div>
        <div class="responsiveMySite--form-field last-childs">
            <h3><span class="dashicons dashicons-format-status"></span> <?php getTranslation("formfieldsplashscreensection") ?></h3>
            <div class="options">
                <p>
                    <label><?php getTranslation("formfieldsplashscreendelay") ?></label>
                    <br />
                    <input name="splashScreenDelay" type="number" max="10" min="1" name="acme-message" value="<?php echo $webApp->splashScreenDelay ?>" /> <?php getTranslation("webappsecondes") ?>
                </p>
            </div>
            <div class="options">
                <p>
                    <label><?php getTranslation("formfieldsplashscreenbgcolor") ?></label>
                    <br />
                    <input name="splashScreenBackgroundColor" type="color" name="acme-message" value="<?php echo $webApp->splashScreenBackgroundColor ?>" />
                </p>
            </div>
        </div>
     <?php
         submit_button();
     ?>

        </form>
    </div>
</div>
