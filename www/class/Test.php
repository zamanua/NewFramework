<?

class Test extends Base
{
	//-----------------------------------------------------------------------------------------------
	function __construct()
	{
		Base::$bXajaxPresent=true;
	}
	//-----------------------------------------------------------------------------------------------
	public function Index()
	{
		Base::$sText.= "<br>Test module finished Ok.<br>";
		
		$oTable = new Table();
		$oTable->sSql="select * from test";
		
		$oTable->aColumn=array(
			'id' => array('sTitle'=>'Id'),
			'name' => array('sTitle'=>'Name'),
			'code' => array('sTitle'=>'Code'),
		);

		$oTable->sDataTemplate = 'test/row_test.tpl';
		Base::$sText.=$oTable->GetTable();
		
		$this->Show();
		Base::$sText.=Base::$tpl->fetch('test/index.tpl');
	}
	//-----------------------------------------------------------------------------------------------
	public function Show()
	{
		$sTime=date("H:i:s");
		
		if(Base::$aRequest['xajax']) {
			Base::$oResponse->AddAssign('id_time','innerHTML',$sTime);
		} else {
			Base::$tpl->assign('sTime',$sTime);
		}
		
	}
	//-----------------------------------------------------------------------------------------------
}
?>