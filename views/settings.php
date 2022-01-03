<div class="wrap">
    <?php include(RESPONSIVEMYSITE__PLUGIN_DIR . '/views/headerSuccess.php') ?>
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
 
    <input type="hidden" name="action" value="admin_post_responsiveMySite_form_response" />
        <div id="universal-message-container">
            <h2>Universal Message</h2>
 
            <div class="options">
                <p>
                    <label>What message would you like to display above each post?</label>
                    <br />
                    <input type="text" name="acme-message" value="" />
                </p>
        </div><!-- #universal-message-container -->
 
        <?php
            // wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
            submit_button();
        ?>
 
    </form>
 
</div><!-- .wrap -->