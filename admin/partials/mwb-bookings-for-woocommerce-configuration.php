<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html field for general tab.
 *
 * @link       https://wpswings.com/
 * @since      1.0.0
 *
 * @package    Bookings_For_Woocommerce
 * @subpackage Bookings_For_Woocommerce/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $mbfw_mwb_mbfw_obj;
?>

<div class="wrap mwb_bfw_config_tab">
        <!-- <h2>Configurations</h2>
        <div class="description">This is description of the page.</div> -->
        <?php
        if( class_exists('Mwb_Bookings_For_Woocommerce_Admin' ) ) {
            $mwb_bfw_active_sub_tab;
            $mwb_bfw_taxonomies_array = Mwb_Bookings_For_Woocommerce_Admin :: mwb_get_taxonomy_array();
            
            $mwb_bfw_sub_tabs_array = $mbfw_mwb_mbfw_obj->mwb_bfw_plug_config_sub_tabs();

        ?>
        <?php 
            $mwb_bfw_active_sub_tab = isset( $_GET[ 'taxonomy' ] ) ? $_GET[ 'taxonomy' ] : '';
            $active_sub_tab = isset( $_GET[ 'bfw_sub_nav' ] ) ? $_GET[ 'bfw_sub_nav' ] : '';
            if ( ! isset( $_GET['taxonomy'] )&& ( ! isset( $_GET['bfw_sub_nav'] ) ) ) {
                $active_sub_tab = 'mwb-bookings-for-woocommerce-booking-form-settings';
            }
        ?>
            <h2 class="nav-tab-wrapper">
            <?php
             foreach( $mwb_bfw_sub_tabs_array as $key => $taxonomy_slug ) {
                 $mwb_sub_tab_title = $taxonomy_slug['name'];
                 $mwb_name          = $taxonomy_slug['title'];
                 echo "<a href='admin.php?page=mwb_bookings_for_woocommerce_menu&mbfw_tab=mwb-bookings-for-woocommerce-configuration&bfw_sub_nav=" . $mwb_sub_tab_title . "' class='nav-tab ". ($active_sub_tab == $mwb_sub_tab_title ? "nav-tab-active" : "") ." mwb-bfw-nav-tab'>" . $mwb_name . "</a>";
            }
            foreach( $mwb_bfw_taxonomies_array as $key => $taxonomy_slug ) {
                $mwb_taxonomy = get_taxonomy( $taxonomy_slug);
                $mwb_name     = $mwb_taxonomy->label;
                $mwb_active_sub_tab = $mwb_bfw_active_sub_tab == $taxonomy_slug ? 'nav-tab-active' : '';
                echo "<a href='admin.php?page=mwb_bookings_for_woocommerce_menu&mbfw_tab=mwb-bookings-for-woocommerce-configuration&bfw_sub_nav=" . $taxonomy_slug . "' class='nav-tab ". $mwb_active_sub_tab ." mwb-bfw-nav-tab'>" . $mwb_name . "</a>";
            }
                
            ?>
            </h2>

            <?php
                if( in_array( $active_sub_tab, $mwb_bfw_taxonomies_array) ) {
                    $url = admin_url( "edit-tags.php?taxonomy=$active_sub_tab" );
                    wp_safe_redirect( $url );
                    exit;
                }
                else if( array_key_exists( $active_sub_tab, $mwb_bfw_sub_tabs_array ) ) {
                    echo '<section class="mwb-section">';
                    echo '<div>';
                    $mbfw_mwb_mbfw_obj->mwb_mbfw_plug_load_template( $mwb_bfw_sub_tabs_array[ $active_sub_tab ]['file_path']);
                    echo '</div></section>';
                }

            ?>
        </div>
        <?php
    }