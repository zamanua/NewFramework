<?
/**
 * @author 
 */

class Content extends Base
{

	//-----------------------------------------------------------------------------------------------
	function __construct()
	{
	}
	//-----------------------------------------------------------------------------------------------
	public static function Init()
	{
		mb_internal_encoding("UTF-8");

		Resource::Get()->Add('/css/main.css',1);
	}
	//-----------------------------------------------------------------------------------------------
}
?>