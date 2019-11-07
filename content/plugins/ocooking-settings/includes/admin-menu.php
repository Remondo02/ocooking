
<?php
add_action( 'admin_menu', 'ocooking_admin_page' );
add_action( 'admin_init', 'ocooking_admin_init' );
function ocooking_admin_page()
{
    // @link https://developer.wordpress.org/reference/functions/add_menu_page/
    add_menu_page(
        __( 'oCooking', OCOOKING_PLUGIN_TEXT_DOMAIN ), // page title
        __( 'oCooking', OCOOKING_PLUGIN_TEXT_DOMAIN ), // menu title
        'manage_options', // capability
        'ocooking-settings', // slug
        'ocooking_settings_social_networks_admin_page', // callback
        'dashicons-chart-pie', // icon
        80 // position
    );
    add_submenu_page(
        'ocooking-settings', // parent slug
        __( 'Paramètres', OCOOKING_PLUGIN_TEXT_DOMAIN ), // page title
        __( 'Paramètres', OCOOKING_PLUGIN_TEXT_DOMAIN ), // menu title
        'manage_options', // capability
        'ocooking-settings', // slug
        'ocooking_settings_social_networks_admin_page' // callback
    );
    add_submenu_page(
        'ocooking-settings', // parent slug
        __( 'Autres options', OCOOKING_PLUGIN_TEXT_DOMAIN ), // page title
        __( 'Autres options', OCOOKING_PLUGIN_TEXT_DOMAIN ), // menu title
        'manage_options', // capability
        'ocooking-settings-other-options', // slug
        'ocooking_settings_other_options_admin_page' // callback
    );
}
function ocooking_settings_social_networks_admin_page()
{
    if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.', OCOOKING_PLUGIN_TEXT_DOMAIN ) );
	}
?>
    <h1><?= get_admin_page_title(); ?></h1>
    <?php
    // Attention, nous devons créer manuellement la balise form (vers options.php qui est la route qui gère l'engistrement des options de configuration)
    ?>
    <form action="options.php" method="post">
    <?php
        settings_fields( 'ocooking-social-networks-group' ); // Affiche les input hidden nécessaire au bon fonctionnement du formulaire
        do_settings_sections( 'ocooking-settings-social-networks' ); // On affiche les champs de la section ciblée en argument
        submit_button(); // Génération du bouton de validation du formulaire
    ?>
    </form>
    <?php
}
function ocooking_settings_other_options_admin_page()
{
    if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( __( 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.', OCOOKING_PLUGIN_TEXT_DOMAIN ) );
	}
?>
    <h1><?= get_admin_page_title(); ?></h1>
    <p>Contenu</p>
<?php
}
function ocooking_admin_init()
{
    // Création d'une nouvelle option avec la Settings API : https://codex.wordpress.org/Settings_API
    // @link https://developer.wordpress.org/reference/functions/register_setting/
    register_setting(
        'ocooking-social-networks-group', // group name
        'ocooking_social_networks' // option name (en bdd)
    );
    // Création d'une section qui va regrouper un ou plusieurs fields
    // @link https://codex.wordpress.org/Function_Reference/add_settings_section
    add_settings_section(
        'ocooking-social-networks-section', // id
        __( 'Liens réseaux sociaux', OCOOKING_PLUGIN_TEXT_DOMAIN ), // title
        'ocooking_social_networks_section_infos', // callback pour afficher des informations sur la section
        'ocooking-settings-social-networks' // parent page slug
    );
    // Création d'un field
    // @link https://codex.wordpress.org/Function_Reference/add_settings_field
    add_settings_field(
        'facebook_url', // id
        __( 'URL de Facebook', OCOOKING_PLUGIN_TEXT_DOMAIN ), // label
        'ocooking_social_networks_facebook_url', // callback d'affichage du field
        'ocooking-settings-social-networks', // parent page slug
        'ocooking-social-networks-section' // id de la section
    );
    add_settings_field(
        'twitter_url', // id
        __( 'URL de Twitter', OCOOKING_PLUGIN_TEXT_DOMAIN ), // label
        'ocooking_social_networks_twitter_url', // callback d'affichage du field
        'ocooking-settings-social-networks', // parent page slug
        'ocooking-social-networks-section' // id de la section
    );
}
function ocooking_social_networks_section_infos()
{
?>
    <p>Les réseaux sociaux sont présents dans l'en-tête du site.</p>
<?php
}
function ocooking_social_networks_facebook_url()
{
    $social_networks = get_option( 'ocooking_social_networks' );
    $facebook_url = '';
    if ( isset( $social_networks['facebook_url'] ) ) {
        $facebook_url = $social_networks['facebook_url'];
    }
?>
    <input type="text" name="ocooking_social_networks[facebook_url]" value="<?= $facebook_url; ?>" />
<?php
}
function ocooking_social_networks_twitter_url()
{
    $social_networks = get_option( 'ocooking_social_networks' );
    $twitter_url = '';
    if ( isset( $social_networks['twitter_url'] ) ) {
        $twitter_url = $social_networks['twitter_url'];
    }
?>
    <input type="text" name="ocooking_social_networks[twitter_url]" value="<?= $twitter_url; ?>" />
<?php
}