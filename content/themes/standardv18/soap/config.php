<?php 

require_once('auth.php');

/*  PHP Error Logging  */
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*   ---------------   */

/* SOAP Arguments */

// for debugging SOAP errors
$trace = true;
$exceptions = true;

// URL to services
$header_url = 'http://realpage.com/webservices';

$floor_plan_wsdl = 'http://onesite.realpage.com/WebServices/CrossFire/AvailabilityAndPricing/FloorPlan.asmx?WSDL';
$logging_wsdl = 'http://onesite.realpage.com/WebServices/CrossFire/AvailabilityAndPricing/Logging.asmx?WSDL';
$pick_list_wsdl = 'http://onesite.realpage.com/WebServices/CrossFire/AvailabilityAndPricing/PickList.asmx?WSDL';
$unit_wsdl = 'http://onesite.realpage.com/WebServices/CrossFire/AvailabilityAndPricing/Unit.asmx?WSDL';
/*   ---------------   */

/* Authentication */
$sess_auth = new Auth();
$sess_auth->UserName = 'SDesignCo';
$sess_auth->Password = 'SDesignCo1234';
$sess_auth->SiteID = 3603334;
$sess_auth->PmcID = 1049405;


?>