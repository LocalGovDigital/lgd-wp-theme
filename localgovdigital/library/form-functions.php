<?php
require_once ( '/var/sites/l/localgov.digital/membership/push-member-data.php' );

add_action( 'gform_after_submission_6', 'push_membership_data_to_google', 10, 2 );

function push_membership_data_to_google ( $entry, $form ) {
    GFCommon::log_debug( 'membership_form_after_submission: entry => ' . print_r( $entry, true ) );

    // Get the API client and construct the service object.
    $client = getClient();
    $service = new Google_Service_Sheets($client);

    $spreadsheetId = MEMBERSHIP_SHEET_ID;
    $range = MEMBERSHIP_SHEET_RANGE;

    // Try to invite to Slack automatically if the email address is right
    $invitedToSlack = inviteToSlack( rgar( $entry, '49') );

    $requestBody = new Google_Service_Sheets_ValueRange();
    $requestBody->setValues(["values" => [

        // Name
        rgar( $entry, '2'),
        
        // Organisation
        rgar( $entry, '3'),
        
        // Email address
        rgar( $entry, '4'),
        
        // Entry Date
        $entry['date_created'],
        
        // Approved for membership - Pending unless auto invited to Slack
        ($invitedToSlack ? 'Approved' : 'Pending'),
        
        // Requested access?
        !empty(rgar( $entry, '30.1')),
        
        // Slack GOV.UK email
        rgar( $entry, '49'),
        
        // Considered for access?
        !empty(rgar( $entry, '42.1')),
        
        // Bring to Slack
        rgar( $entry, '43'),
        
        // Invited?
        $invitedToSlack,
        
        // Service assessor?
        !empty(rgar( $entry, '31.1')),
        
        // Mailing list?
        !empty(rgar( $entry, '32.1')),
        
        // Updates from
        rgar( $entry, '38'),
        
        // Region request
        rgar( $entry, '37'),
        
        // Substantive role
        rgar( $entry, '48'),
        
        // Direct
        !empty(rgar( $entry, '24.1')),
        
        // Charities etc
        !empty(rgar( $entry, '24.2')),
        
        // Interim
        !empty(rgar( $entry, '24.3')),
        
        // Contractor
        !empty(rgar( $entry, '24.4')),
        
        // Supplier
        !empty(rgar( $entry, '24.5')),
        
        // Other
        !empty(rgar( $entry, '24.6')),
        
        // Sector involvement
        rgar( $entry, '39'),
        
        // Products and services
        rgar( $entry, '45'),
        
        // Management
        !empty(rgar( $entry, '12.1')),
        
        // Finance
        !empty(rgar( $entry, '12.2')),
        
        // Marketing
        !empty(rgar( $entry, '12.3')),
        
        // Public relations
        !empty(rgar( $entry, '12.4')),
        
        // Design
        !empty(rgar( $entry, '12.5')),
        
        // Development
        !empty(rgar( $entry, '12.6')),
        
        // Content writing
        !empty(rgar( $entry, '12.7')),
        
        // Systems admin
        !empty(rgar( $entry, '12.8')),
        
        // Project management
        !empty(rgar( $entry, '12.9')),
        
        // Product management
        !empty(rgar( $entry, '12.11')),
        
        // SEO
        !empty(rgar( $entry, '12.12')),
        
        // Other
        rgar( $entry, '13'),
        
        // Offering skills?
        !empty(rgar( $entry, '15.1')),
        
        // Entry Id
        $entry['id'],
        
        // DEBUG ONLY - prints everything in $entry
        // print_r($entry, true)
        
        ]]);

    $conf = ["valueInputOption" => "USER_ENTERED"];

    $response = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $conf);
    
    GFAPI::update_entry_property( $entry['id'], 'is_read', true );
    GFAPI::update_entry_property( $entry['id'], 'is_starred', true );

 GFCommon::log_debug( 'membership_form_after_submission: response => ' . print_r( $response, true ) );

}

add_filter('gform_pre_render_6', 'set_slack_email');

function set_slack_email( $form ) {
    $current_page = GFFormDisplay::get_current_page( $form['id'] );

    if ( $current_page == 5 ) {
        // If the email address given at the start matches a public sector email, pre-populate the Slack email field
        // Get the initial email address
        $email = rgpost( 'input_4' );

        // See if it matches
        $match = publicSectorEmail( $email );

        if ( $match ) {
            foreach( $form['fields'] as &$field ) {
                // Set the default value
                if ( $field->id == 49 ) {
                    $field->defaultValue = $email;
                }
            }
        }
    }

    return $form;
}
