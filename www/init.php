<?
// - Smarty -
require_once( SERVER_PATH.'/lib/smarty/Smarty.class.php');
$oSmarty = new Smarty();
$oSmarty->template_dir=SERVER_PATH.'/template/';
$oSmarty->compile_dir=SERVER_PATH.'/template/templates_c/';
$oSmarty->config_dir=SERVER_PATH.'/templates_c/configs/';
$oSmarty->cache_dir=SERVER_PATH.'/templates_c/cache/';
$oSmarty->compile_check = true;

// - AdoDB -
include_once('lib/adodb/adodb.inc.php');
$oDb=&ADONewConnection($DB_CONF['Type'], $DB_CONF['Modules']);
$oDb->Connect($DB_CONF['Host'].':'.$DB_CONF['Port'],$DB_CONF['User'],$DB_CONF['Password'],$DB_CONF['Database']);
$oDb->_Execute("/*!40101 SET NAMES '".$DB_CONF['Charset']."' */");
$oDb->SetFetchMode(ADODB_FETCH_ASSOC);
date_default_timezone_set('Europe/Kiev');
$oDb->_Execute("SET `time_zone`='".date('P')."'");

// for autoload with operator new
function SystemAutoload($sClass) {
	if (is_file(SERVER_PATH.'/class/'.$sClass.'.php')) require_once(SERVER_PATH.'/class/'.$sClass.'.php');
}
spl_autoload_register('SystemAutoload');

require_once( SERVER_PATH.'/class/Base.php');
require_once( SERVER_PATH.'/class/Content.php');


Base::$db = $oDb;
Base::$tpl = $oSmarty;
Base::$aDbConf = $DB_CONF;

Base::PreInit();

Base::Init();
?>
