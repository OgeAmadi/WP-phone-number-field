// Add phone number field to user profile page
function add_phone_number_field( $user ) {
    ?>
    <table class="form-table">
        <tr>
            <th><label for="phone_number">Phone Number</label></th>
            <td>
                <input type="tel" id="phone_number" name="phone_number" value="<?php echo esc_attr( get_user_meta( $user->ID, 'phone_number', true ) ); ?>" />
            </td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'add_phone_number_field' );
add_action( 'edit_user_profile', 'add_phone_number_field' );

// Save phone number field
function save_phone_number_field( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'phone_number', $_POST['phone_number'] );
}
add_action( 'personal_options_update', 'save_phone_number_field' );
add_action( 'edit_user_profile_update', 'save_phone_number_field' );

// Display phone number field
function display_phone_number_field( $user ) {
    $phone_number = get_user_meta( $user->ID, 'phone_number', true );
    if ( !empty( $phone_number ) ) {
        echo '<p>Phone Number: ' . esc_html( $phone_number ) . '</p>';
    }
}
add_action( 'show_user_profile', 'display_phone_number_field' );
