<?php
/**
 * Register theme settings for admin menu.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'setup_theme_admin_menus' ) ) :
function setup_theme_admin_menus() {
  add_menu_page ( 'Opciones del Sitio',
    'Opciones del Sitio',
    'manage_options',
    'opciones-del-sitio',
    'theme_settings' );
}

function theme_settings() {
  $instagram_user = get_option("los_lobos_instagram_user");
  $facebook_user = get_option("los_lobos_facebook_user");
  $contact_email = get_option("los_lobos_contact_email");
  if( isset($_POST["update_settings"]) ) {
    $instagram_user = esc_attr($_POST["instagram_user"]);
    $facebook_user = esc_attr($_POST["facebook_user"]);
    $contact_email = esc_attr($_POST["contact_email"]);
    update_option("los_lobos_instagram_user", $instagram_user);
    update_option("los_lobos_facebook_user", $facebook_user);
    update_option("los_lobos_contact_email", $contact_email);
    ?>
    <div id="message" class="updated">Opciones guardadas</div>
    <?php
  }
  if(!current_user_can('manage_options')) {
    wp_die('No tienes permisos para ver esto.');
  }
  ?>
  <div class="wrap">
    <h2>Opciones del Sitio</h2>
    <form method="POST" action="">
      <table class="form-table">
        <tr valign="top">
          <th scope="row">
            <label for="instagram_user">
              Usuario de Instagram:
            </label>
          </th>
          <td>
            <input type="text" name="instagram_user" size="25" value="<?php echo $instagram_user; ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="facebook_user">
              Usuario de Facebook:
            </label>
          </th>
          <td>
            <input type="text" name="facebook_user" size="25" value="<?php echo $facebook_user; ?>" />
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">
            <label for="facebook_user">
              Email de contacto:
            </label>
          </th>
          <td>
            <input type="text" name="contact_email" size="25" value="<?php echo $contact_email; ?>" />
          </td>
        </tr>
        <input type="hidden" name="update_settings" value="Y" />
      </table>
      <p>
        <input type="submit" value="Guardar cambios" class="button-primary" />
      </p>
    </form>
  </div>
<?php
}

add_action( 'admin_menu', 'setup_theme_admin_menus' );
endif;
