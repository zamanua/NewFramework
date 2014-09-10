<?
/**
 * @author
 */

define(RU,"1");//for windows-1251

require_once(SERVER_PATH.'/lib/xajax/xajax.inc.php');

$xajax = new xajax();
//$xajax->debugOn();
if (RU==1) $xajax->decodeUTF8InputOn();

$xajax->statusMessagesOn();
$xajax->errorHandlerOn();
//$xajax->setLogFile("../xajax/xajax_log/errors.log");

$xajax->registerFunction("process_form");
$xajax->registerFunction("process_browse_url");

$xajax->processRequests();

$sXajaxJavascript=$xajax->getJavascript('/lib/xajax');


?>