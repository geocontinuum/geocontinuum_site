<?php
ini_set( 'display_errors', false );
require_once dirname( dirname( __FILE__ ) ) . '/troubleshoot.php';
$app = pd_troubleshoot();
echo json_encode( $app->get_api_params() );