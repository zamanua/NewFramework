<?
/**
 * @author 
 */


if (!$sAuthFolder) $sAuthFolder='/class/';
require_once (SERVER_PATH . $sAuthFolder.'Auth.php');
class Base {
	public static $db;
	public static $tpl;
	public static $aDbConf = array ();
	public static $oResponse;
	public static $oContent;


	/**
	 * Main text variable
	 */
	public static $sText;
	public static $aRequest;

	/**
	 * Array of global variables for all the objects extended from Base
	 */
	public static $aData;

	public static $sBaseTemplate = 'index.tpl';

	/**
	 * Puts xajax code into site template
	 */
	public static $bXajaxPresent = false;

	/**
	 *  Puts javascript message to hidden input for display during work
	 */
	public static $aMessageJavascript = array();
	public static $sOuterJavascript = "";

	/** for admin area xajax usage  */
	public static $sServerQueryString;

	/** Array for showing some predefined templates with arguments at the top of each page
	 * sample usage Base::$aTopPageTemplate=array('template_path.tpl'=>paramater_for_template)
	 * */
	public static $aTopPageTemplate;

	//-----------------------------------------------------------------------------------------------
	public static function PreInit()
	{
		Base::$tpl->assign('SERVER_NAME',SERVER_NAME);
		Base::$tpl->assign('aDbConf',Base::$aDbConf);

		Base::$aRequest = array_merge($_GET,$_POST);

		if (Base::$aRequest['action']=='user_do_login' || $_COOKIE['PHPSESSID'] || $_COOKIE['user_auth_signature']) {
			session_start();
		}

		$_SESSION ['referer_page'] = $_SESSION ['current_page'];
		$_SESSION ['current_page'] = $_SERVER ['QUERY_STRING'];

		if (!Base::$aRequest['action'] && (!$_SERVER['QUERY_STRING'] || Base::$aRequest['locale']))
		Base::$aRequest['action']='home';

		Base::$oContent = new Content();
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Initialization of base variables
	 * Sample code comments
	 * @return nothing
	 */
	public static function Init()
	{
		Base::$tpl->assign('aAuthUser', Auth::$aUser);

		Content::Init();
	}
	//-----------------------------------------------------------------------------------------------
	public static function ProcessAjax()
	{
		//without any templates

		$sOutput=Base::$sText;
		echo $sOutput;
	}
	//-----------------------------------------------------------------------------------------------
	public static function Process()
	{
		if (Base::$bXajaxPresent) {
			require(SERVER_PATH . '/class/XajaxParser.php');
			Base::$sOuterJavascript.= $sXajaxJavascript;
		}

		if (Base::$aMessageJavascript && count(Base::$aMessageJavascript) >0 ) {
			Base::$tpl->assign('aMessageJavascript', Base::$aMessageJavascript);
			Base::$sOuterJavascript.= Base::$tpl->fetch ("message_input.tpl");
		}
		Base::$aData['template']['sOuterJavascript']=Base::$sOuterJavascript;

		Resource::Get()->FillTemplate();
		
		Base::$tpl->assign('sText', $sTopText.Base::$sText );
		Base::$tpl->assign('template', Base::$aData ['template'] );
		
		$sOutput = Base::$tpl->fetch(Base::$sBaseTemplate );
		
		echo $sOutput;
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Fix triple addslashes by parse_str func
	 *
	 * @param array to fix
	 * @access private
	 * @return array
	 */
	public function FixParseStrBug(&$aArray) {
		parse_str("a='",$aRes);
		if ($aRes['a']!="\\\\\\'") return;

		if (is_array($aArray)) {
			foreach ($aArray as $sKey => $sValue) {
				$aArray[$sKey] = Base::fixParseStrBug($sValue);
			}
		} else {
			$aArray = stripslashes($aArray);
		}
		return $aArray;
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Standart redirect function
	 */
	public static function Redirect($sUrl) {
		Header ( "HTTP/1.1 301 Moved Permanently" );
		header ( 'Location: ' . $sUrl );
		die ();
	}
	//-----------------------------------------------------------------------------------------------
}
?>