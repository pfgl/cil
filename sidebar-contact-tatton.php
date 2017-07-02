<div id="sidebar-contact" class="col-sm-6 footer__contacts" role="complementary">

    <?php if ( is_active_sidebar( 'sidebar-contact-tatton' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar-contact-tatton' ); ?>

    <?php else : ?>

        <?php
            /*
             * This content shows up if there are no widgets defined in the backend.
            */
        ?>

        <div class="no-widgets">
            <p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
        </div>

    <?php endif; ?>

</div>
