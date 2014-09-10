<?

/**
 * @author 
 */

class Resource
{
	private static $oInstance = null;
	public $sPrefix = 'resource';

	private $aLocation = array();

	/**
	 * For each location will be seperate archive
	 */
	private $aHeaderResource = array();

	private $aResourceVersion = array();

	//-----------------------------------------------------------------------------------------------
	public static function Get(){
		if (!self::$oInstance) {
			self::$oInstance = new self();
		}
		return self::$oInstance;
	}
	//-----------------------------------------------------------------------------------------------
	public function __construct(){
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Adds file to header location for default
	 * Sample usage Resource::Get->Add('/css/main.css',6,'header')
	 *
	 * @param string $sFilePath
	 * @param number $iFileVersion - if number is grater than already included (duplicate), this grater number will be included
	 * @param string $sLocation
	 */
	public function Add($sFilePath,$iFileVersion=0,$sLocation='header',$aData=array())
	{
		$sFilePath=strtolower($sFilePath);
		$sLocation=strtolower($sLocation);
		$iFileVersion=(is_int($iFileVersion) ? $iFileVersion : 0);

		switch ($sLocation) {
			case 'header':
			default:
				if (!in_array($sFilePath,array_keys($this->aHeaderResource))) {
					$this->aHeaderResource[$sFilePath]=array(
					'file_path'=>$sFilePath,
					'data'=>$aData,
					);
					$this->aResourceVersion[$sFilePath]=$iFileVersion;

					if (!in_array($sLocation,$this->aLocation)) $this->aLocation[]=$sLocation;
				}
				elseif ($this->aResourceVersion[$sFilePath]<$iFileVersion) {
					$this->aResourceVersion[$sFilePath]=$iFileVersion;
				}
				break;
		}
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Puts everything added to output template to fill it into html
	 * Called by Base::Process() method
	 */
	public function FillTemplate()
	{
		if ($this->aLocation) {
			foreach ($this->aLocation as $sValue) {
				$sTemplateName='s'.ucwords($sValue).'Resource';
				$sPropertyName='a'.ucwords($sValue).'Resource';

				foreach ($this->$sPropertyName as $sKey2=>$aValue2) {
					$sFilePath=$aValue2['file_path'];
					$iFileVersion=$this->aResourceVersion[$sFilePath];

					$sResourceType='css';
					if (substr($sFilePath,-2)=='js') $sResourceType='js';

					$sFilePathVersioned=$sFilePath.($iFileVersion ? '?'.$iFileVersion : '');
					Base::$tpl->assign('sFilePathVersioned',$sFilePathVersioned);
					Base::$tpl->assign('aData',$aValue2['data']);

					Base::$aData['template'][$sTemplateName].=
					Base::$tpl->fetch('addon/'.$this->sPrefix.'/type_'.$sResourceType.'.tpl');
				}
			}
		}
	}
	//-----------------------------------------------------------------------------------------------

}

?>