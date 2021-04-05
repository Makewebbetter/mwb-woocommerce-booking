<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to edit fields for the custom taxonomy 'mwb_ct_people_type'
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Wc_Bk
 * @subpackage Mwb_Wc_Bk/admin/partials/ct-edit-fields
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {

	exit;
}
$people_unit_cost    = get_term_meta( $term->term_id, 'mwb_ct_booking_people_unit_cost', true );
$people_base_cost    = get_term_meta( $term->term_id, 'mwb_ct_booking_people_base_cost', true );
$people_max_qunatity = get_term_meta( $term->term_id, 'mwb_booking_ct_people_max_quantity', true );
$people_min_qunatity = get_term_meta( $term->term_id, 'mwb_booking_ct_people_min_quantity', true );

?>
<tr class="form-field term-booking-fields-wrap">
	<th><label for="mwb_ct_booking_people_unit_cost"><?php esc_html_e( 'Unit Cost', 'mwb-wc-bk' ); ?></label></th>
	<td>
		<input type="number" id="mwb_ct_booking_people_unit_cost" name="mwb_ct_booking_people_unit_cost" value="<?php echo esc_html( ! empty( $people_unit_cost ) ? $people_unit_cost : '' ); ?>" />
		<p class="description"><?php esc_html_e( 'Enter the unit cost for the people type.', 'mwb-wc-bk' ); ?></p>
	</td>	
</tr>
<tr class="form-field term-booking-fields-wrap">
	<th><label for="mwb_ct_booking_people_base_cost"><?php esc_html_e( 'Base Cost', 'mwb-wc-bk' ); ?></label></th>
	<td>
		<input type="number" id="mwb_ct_booking_people_base_cost" name="mwb_ct_booking_people_base_cost" value="<?php echo esc_html( ! empty( $people_base_cost ) ? $people_base_cost : '' ); ?>" />
		<p class="description"><?php esc_html_e( 'Enter the base cost for the people type.', 'mwb-wc-bk' ); ?></p>
	</td>	
</tr>
<tr class="form-field term-booking-fields-wrap">
	<th><label for="mwb_booking_ct_people_max_quantity"><?php esc_html_e( 'Max Quantity', 'mwb-wc-bk' ); ?></label></th>
	<td>
		<input type="number" id="mwb_booking_ct_people_max_quantity" name="mwb_booking_ct_people_max_quantity" value="<?php echo esc_html( ! empty( $people_max_qunatity ) ? $people_max_qunatity : '' ); ?>" />
		<p class="description"><?php esc_html_e( 'Maximum Quantity of peoples allowed for respective people type.', 'mwb-wc-bk' ); ?></p>
	</td>	
</tr>
