<?
/**
 * @author
 */

class Table extends Base
{
	public $sType = 'Sql';
	public $aDataFoTable = array ();

	public $sSql = '';
	public $sTableSql = '';
	public $aItem = array ();
	public $aColumn = array ();
	public $iRowPerPage = 10;
	public $iRowPerFirstPage = 10; // $iRowPerFirstPage == $iRowPerPage
	public $iRowPerPageGeneral = 10;

	public $iPage = 0;
	/** parametres for select row per page */
	public $bShowRowsPerPage = false;
	public $sActionRowPerPage='';
	public $bShowPerPageAll = false;

	public $iStepNumber = 10;
	public $aOrderedColumn = array ();
	public $aOrdered = array ();
	public $sDefaultOrder = '';

	/** Width for table tag  width="$sWidth"  */
	public $sWidth = '99%';
	/** Class for table tag  class="$sClass"  */
	public $sClass = 'datatable';
	public $sStepperClass = 'stepper';
	public $sStepperActiveItemClass = 'active';
	public $sStepperInfoClass = 'stepper_info';
	public $bStepperInfo = false;
	public $bStepperOutTable = false;
	public $sCellSpacing = '0';
	public $sDataTemplate;
	public $sButtonTemplate;
	public $sSubtotalTemplate;
	public $sSubtotalTemplateTop;

	public $sAddButton = '';
	public $sAddAction = '';

	public $aCallback = array ();

	public $bSetDefault = true;
	public $bPearStepper = false;
	public $bStepperVisible = true;
	public $bAjaxStepper = false;
	public $bHeaderVisible = true;
	public $bHeaderVisibleGroup = false;
	public $bHeaderNobr = true;
	/** Check boxes visible at the start of tr */
	public $bCheckVisible = false;
	public $bCheckRightVisible = false;
	public $bCheckOnClick = false;
	//onclick for each row (js) in index.tpl
	public $sCheckAction = '';
	/** Check box for checkall visible at the start of th */
	public $bCheckAllVisible = true;
	//onclick for checkall (js) in index.tpl
	public $sCheckAllAction = '';
	public $bDefaultChecked = true;

	public $bFormAvailable = true;
	public $sFormAction = 'empty';
	public $sCheckField = 'id';
	public $iAllRow = 0;
	public $bHideTr = false;

	public $sHeaderRight = '';

	public $sTemplateName = 'index.tpl';
	public $sFilterTemplateName = 'admin.tpl';

	public $sPrefix = '';
	public $sQueryString = '';
	public $sOrderAscImage = '/libp/mpanel/images/small/down.png';
	public $sOrderDescImage = '/libp/mpanel/images/small/up.png';
	public $sHeaderClassSelect = '';

	public $bFilterVisible = false;
	public $aFilter = array ('oObject' => NULL, 'sMethod' => '' );
	public $sFormHeader = '';
	public static  $sStepperAlign = 'right';

	/** Columns number for gallery table */
	public $iGallery = 5;
	/** Flag tell if we drow table for cliend side*/
	public $bIsGallery = false;

	public $sStepperType = 'standard';
	public $bStepperOnePageShow = true;

	/** Caching sql_found_rows value in table cache_stepper */
	public $bCacheStepper = false;
	/** Duplicates the stepper on the top of table */
	public $bTopStepper = false;

	/** Code for custom no item template*/
	public $sNoItem = '';

	/** Count(*) stepper type for unsupported by SQL_FOUND_ROWS command */
	public $bCountStepper = false;

	/** If set - this parameter will limit steps count for each table called and shown */
	public $iStepLimit = 0;
	/* need for styling tr of stepper */
	public $bStepperStyling = true;
	public $bTableWithoytStyle = false;

	/** For steppers like 1,2,3... value of this parametere need to be 1*/
	public $iStartStep = 0;

	/** Different designed table headers */
	public static $bHeaderType = 'table';

	/** 	text for check all checkbox at top of table	**/
	public $sMarkAllText='';

	/** If we need manual set of limit section */
	public $sManualLimit = '';

	public static $sButtonSpanClass="";

	/* to add panel to table */
	public $sPanelTemplateTop;

	/* Abcolute url making for project table and url rewriting.
	for old style stepper links need to have this parameter set to "." */
	public static $sLinkPrefix=".";

	//-----------------------------------------------------------------------------------------------
	public function __construct()
	{
		$this->aFilter = array ('oObject' => $this, 'sMethod' => 'getFilter' );
		Base::$tpl->assign_by_ref ( 'oTable', $this );
	}
	//-----------------------------------------------------------------------------------------------
	public function GetTable($sHeader = '', $sHint = '',$sStaticHeader='')
	{
		if ($this->bSetDefault && method_exists(Base::$oContent,'setTableDefault')) Base::$oContent->setTableDefault($this);

		Base::$tpl->assign('sWidth', $this->sWidth );
		Base::$tpl->assign('sCellSpacing', $this->sCellSpacing );
		Base::$tpl->assign('bTableWithoytStyle', $this->bTableWithoytStyle );
		Base::$tpl->assign('sClass', $this->sClass );
		Base::$tpl->assign('sStepperClass', $this->sStepperClass );
		Base::$tpl->assign('bStepperInfo', $this->bStepperInfo);
		Base::$tpl->assign('sStepperInfoClass', $this->sStepperInfoClass );
		Base::$tpl->assign('bStepperOutTable', $this->bStepperOutTable);
		Base::$tpl->assign('sStepperType', $this->sStepperType);
		Base::$tpl->assign('sDataTemplate', $this->sDataTemplate );
		Base::$tpl->assign('sButtonTemplate', $this->sButtonTemplate );
		Base::$tpl->assign('sSubtotalTemplate', $this->sSubtotalTemplate );
		Base::$tpl->assign('sSubtotalTemplateTop', $this->sSubtotalTemplateTop );
		Base::$tpl->assign('sAddButton',  $this->sAddButton  );
		Base::$tpl->assign('sAddAction', $this->sAddAction );
		if($this->bHeaderGroupVisible) $this->bHeaderVisible=false;
		Base::$tpl->assign('bHeaderGroupVisible', $this->bHeaderGroupVisible );
		Base::$tpl->assign('bHeaderVisible', $this->bHeaderVisible );
		Base::$tpl->assign('bHeaderNobr', $this->bHeaderNobr );
		Base::$tpl->assign('bCheckVisible', $this->bCheckVisible );
		Base::$tpl->assign('bCheckRightVisible', $this->bCheckRightVisible );
		Base::$tpl->assign('bCheckOnClick', $this->bCheckOnClick );
		Base::$tpl->assign('sCheckAction', $this->sCheckAction );
		Base::$tpl->assign('bCheckAllVisible', $this->bCheckAllVisible );
		Base::$tpl->assign('sCheckAllAction', $this->sCheckAllAction );
		Base::$tpl->assign('bDefaultChecked', $this->bDefaultChecked );
		Base::$tpl->assign('bFormAvailable', $this->bFormAvailable );
		Base::$tpl->assign('sFormAction', $this->sFormAction );
		Base::$tpl->assign('sCheckField', $this->sCheckField );
		Base::$tpl->assign('sNoItem', $this->sNoItem );
		Base::$tpl->assign('bAjaxStepper', $this->bAjaxStepper );
		Base::$tpl->assign('bHideTr', $this->bHideTr );
		Base::$tpl->assign('sHeaderRight', $this->sHeaderRight );
		Base::$tpl->assign('sPrefix', $this->sPrefix );
		Base::$tpl->assign('sOrderAscImage', $this->sOrderAscImage );
		Base::$tpl->assign('sOrderDescImage', $this->sOrderDescImage );
		Base::$tpl->assign('sHeaderClassSelect', $this->sHeaderClassSelect );
		Base::$tpl->assign('sFormHeader', $this->sFormHeader );
		Base::$tpl->assign('sStepperAlign', Table::$sStepperAlign );
		Base::$tpl->assign('sActionRowPerPage', $this->sActionRowPerPage);
		Base::$tpl->assign('bShowRowPerPage', $this->bShowRowsPerPage);
		Base::$tpl->assign('iRowPerPage', $this->iRowPerPage );
		Base::$tpl->assign('bShowPerPageAll', $this->bShowPerPageAll);
		Base::$tpl->assign('iGallery', $this->iGallery );
		Base::$tpl->assign('bIsGallery', $this->bIsGallery );
		Base::$tpl->assign('bTopStepper', $this->bTopStepper );
		Base::$tpl->assign('bHeaderType', Table::$bHeaderType );
		Base::$tpl->assign('sMarkAllText',$this->sMarkAllText );
		Base::$tpl->assign('sButtonSpanClass', Table::$sButtonSpanClass);
		Base::$tpl->assign('sPanelTemplateTop', $this->sPanelTemplateTop );
		if ($this->sTableMessage) Base::$tpl->assign('sTableMessage', $this->sTableMessage);


		if (! $this->sQueryString)

		if ($this->aOrdered) $this->sDefaultOrder = $this->aOrdered; //for backward compatibikity
		if ($this->sDefaultOrder) $sOrder = $this->sDefaultOrder;
		//$sDefaultWay=' asc';

		Base::$tpl->assign('sHeader', $sHeader.$sStaticHeader);

		$sOrderQueryString = preg_replace ( '/&' . $this->sPrefix . 'order=([^&]*)&way=([^&]*)/', '', $this->sQueryString );
		foreach ( $this->aColumn as $sKey => $aValue ) {
			$sHeader = $aValue ['sTitle'];
			//if ($this->sTemplateName!='index.tpl' && $sHeader) $sHeader=$sHeader;
			
			if($aValue ['sTitleNT']) $this->aColumn [$sKey] ['sTitle'] = $aValue ['sTitleNT'];

			if (! $sOrder && $this->aColumn [$sKey] ['sOrder'])
			$sOrder = " order by " . $this->aColumn [$sKey] ['sOrder'];
			$sFirstOrderColumn = $sKey;

			if ($this->aColumn [$sKey] ['sOrder'] && Base::$aRequest [$this->sPrefix . 'order'] == $sKey) {
				if (Base::$aRequest [$this->sPrefix . 'way'] == 'asc' || ! Base::$aRequest [$this->sPrefix . 'way'] == 'asc') {
					$sOtherWay = 'desc';
					$this->aColumn [$sKey] ['sOrderImage'] = $this->sOrderAscImage;
					$this->aColumn [$sKey] ['sHeaderClassSelect'] = $this->sHeaderClassSelect;
				} else {
					$sOtherWay = 'asc';
					$this->aColumn [$sKey] ['sOrderImage'] = $this->sOrderDescImage;
					$this->aColumn [$sKey] ['sHeaderClassSelect'] = $this->sHeaderClassSelect;
				}
				$this->aColumn [$sKey] ['sOrderLink'] = $sOrderQueryString . '&' . $this->sPrefix . 'order=' . $sKey . '&'
				. $this->sPrefix . 'way=' . $sOtherWay;

				$sOrder = " order by " . $this->aColumn [$sKey] ['sOrder'];
				if (Base::$aRequest [$this->sPrefix . 'way'])
				$sOrder .= " " . Base::$aRequest [$this->sPrefix . 'way'];
			} else {
				if ($this->aColumn [$sKey] ['sOrder'])
				$this->aColumn [$sKey] ['sOrderLink'] = $sOrderQueryString . '&' . $this->sPrefix . 'order=' . $sKey . '&'
				. $this->sPrefix . 'way=asc';
			}
		}
		//first order column for default order
		/*if (! Base::$aRequest [$this->sPrefix . 'order'] && $sFirstOrderColumn) {
			$this->aColumn [$sFirstOrderColumn] ['sOrderLink'] = $sOrderQueryString . '&' . $this->sPrefix . 'order='
			. $sFirstOrderColumn . '&' . $this->sPrefix . 'way=desc';
			$this->aColumn [$sFirstOrderColumn] ['sOrderImage'] = $this->sOrderAscImage;
		}*/

		Base::$tpl->assign ( 'aColumn', $this->aColumn );

		if ($this->sType == 'Sql') {
			$iStep = intval(Base::$aRequest[$this->sPrefix.'step']);
			if ($this->iStepLimit && $iStep>$this->iStepLimit) $iStep=$this->iStepLimit;


			// if we need display in the first page the another count of row
			if ($this->bPearStepper) $iStep --;
			if($this->iRowPerFirstPage != $this->iRowPerPage && $this->iRowPerPageGeneral != $this->iRowPerFirstPage){
				$iPage = $iStep  == 1 ? $this->iRowPerFirstPage : $this->iRowPerPage;
				$iAdding =  $iStep  == 1 ? 0 : $this->iRowPerFirstPage;
				$iSecondAdding = $iStep >= 2 ? 3 : 0;
				$sLimit = ' limit '.(($iStep *$iPage) - $iAdding - $iSecondAdding).',' . $this->iRowPerPage;
			}else{
				if (!Base::$aRequest [$this->sPrefix . 'step']) $sLimit = ' limit 0,' . $this->iRowPerPage;
				else $sLimit = ' limit '.($iStep * $this->iRowPerPage).',' . $this->iRowPerPage;
			}

			if ($this->sManualLimit) $sLimit=$this->sManualLimit;

			if ($this->bCacheStepper) {
				$sCacheSql=$this->sSql;
				$iPageNumber=Cache::GetValue('stepper',md5($sCacheSql));

				//if (!$iPageNumber) $this->sSql = str_replace ( 'select', 'select SQL_CALC_FOUND_ROWS', $this->sSql );
				if (!$iPageNumber) $this->sSql = preg_replace('/select/', 'select SQL_CALC_FOUND_ROWS', $this->sSql, 1);

				$this->sTableSql = $this->sSql . ' ' . $sOrder . ' ' . $sLimit;
				$aItem = Base::$db->getAll ( $this->sTableSql );
				if (!$iPageNumber) {
					$iPageNumber = Base::$db->getOne ( 'SELECT FOUND_ROWS()' );
					Cache::SetValue('stepper',md5($sCacheSql),$iPageNumber);
				}
			}
			else {
				//$this->sSql = str_replace('select', 'select SQL_CALC_FOUND_ROWS', $this->sSql);
				$this->sSql = preg_replace('/select/', 'select SQL_CALC_FOUND_ROWS', $this->sSql, 1);
				
				$this->sTableSql = $this->sSql.' '.$sOrder.' '.$sLimit;
				$aItem = Base::$db->getAll($this->sTableSql);
				if ($this->bCountStepper) {
					$iPageNumber = Base::$db->getOne("select count(*) from (".$this->sSql.") count_table ");
				}
				else $iPageNumber = Base::$db->getOne("SELECT FOUND_ROWS()");
			}
			$this->iAllRow = $iPageNumber;
		} elseif ($this->sType == 'array') {
			$aItem = $this->aDataFoTable;
			$this->iAllRow = count($aItem);
		}

		Base::$tpl->assign('iAllRow', $this->iAllRow);
		if ($this->aCallback) {
			$sMethod = $this->aCallback [1];
			$aResult = $this->aCallback [0]->$sMethod ( $aItem );
			if ($this->sSubtotalTemplate)
			Base::$tpl->assign('dSubtotal',$aResult['dSubtotal']);
			Base::$tpl->assign('aSubtotalResult', $aResult);
			if($this->sType == 'array') $this->iAllRow = count($aItem);
		}
		if ($this->bStepperVisible && $this->sType == 'array') {
			$iPageNumber=$this->iAllRow;
			if($aItem)
			$aItem = array_slice ($aItem,intval( Base::$aRequest [$this->sPrefix . 'step'] )*$this->iRowPerPage,$this->iRowPerPage);
		}

		// generate empty item if need
		if ($this->bIsGallery){
			$iItemLen = count($aItem);
			if ($iItemLen%$this->iGallery != 0){
				if($iItemLen < $this->iGallery){
					$mod = $this->iGallery-$iItemLen;
				}else{
					$mod = $this->iGallery - ($iItemLen - ($this->iGallery * floor($iItemLen/$this->iGallery)));
				}
			}
			for ($i = $iItemLen; $i<$iItemLen+$mod; $i++){
				$aItem[$i] = array();
			}
		}

		Base::$tpl->assign('aItem',$aItem);
		$this->aItem=$aItem;

		if ($this->bStepperVisible) {
			if ($this->bPearStepper) $sStepper = $this->getStepperPear ( $iPageNumber );
			else $sStepper = $this->getStepper ( $iPageNumber );
		}
		Base::$tpl->assign ( 'sStepper', $sStepper );

		if ($this->bFilterVisible) {
			$oObject = $this->aFilter ['oObject'];
			$sMethod = $this->aFilter ['sMethod'];
			if (method_exists ( $oObject, $sMethod )) {
				Base::$tpl->assign ( 'sLeftFilter', $oObject->$sMethod () );
			}
		}

		Base::$tpl->assign('iStartRow', $this->iPage*$this->iRowPerPage);
		Base::$tpl->assign('iEndRow', ($this->iPage+1)*$this->iRowPerPage);

		Base::$tpl->assign ( 'sReturn', $this->sQueryString );

		if (strpos($this->sTemplateName,'/')===false) $sTemplateName='addon/table/'.$this->sTemplateName;
		else $sTemplateName=$this->sTemplateName;

		return Base::$tpl->fetch($sTemplateName);
	}
	//-----------------------------------------------------------------------------------------------
	public function getStepper($iRowNumber)
	{
		$iPage = intval ( Base::$aRequest [$this->sPrefix . 'step'] );
		$this->iPage=$iPage;
		$iRowPerPage = $this->iRowPerPage;

		if (($iRowNumber % $iRowPerPage) > 0) $adding = 0;
		else $adding = - 1;
		$iPageNumber = intval ( $iRowNumber / $iRowPerPage ) + $adding;

		if ($this->iStepLimit && $iPageNumber>$this->iStepLimit) $iPageNumber=$this->iStepLimit;
		if ($this->iStepLimit && $iPage>$this->iStepLimit) return "Step limit exceeded";
		if (!$this->bStepperOnePageShow && $iPageNumber<1) return false;

		$iAllPageNumber = $iPageNumber;
		Base::$tpl->assign('iAllPageNumber', $iAllPageNumber+1);

		if ($iPageNumber > $this->iStepNumber)
		$iPageNumber = $this->iStepNumber;

		$next = $iPage + 1;
		$previous = $iPage - 1;

		$sQueryString = preg_replace ( '/&' . $this->sPrefix . 'step=(\d+)/', '', $this->sQueryString );
		$bNoneDotUrl = Base::$tpl->get_template_vars('bNoneDotUrl');
		if($bNoneDotUrl) $sPrefUrl=''; else $sPrefUrl=Table::$sLinkPrefix;

		if ($this->bAjaxStepper)
		$sAjaxScript = " onclick=\" xajax_process_browse_url(this.href); return false;\" ";
		
		if ($_SERVER['SCRIPT_NAME']!='/mpanel/login.php' && method_exists(Base::$oContent,'getStepper')){
			$aData=array(
			'iPage'=>$iPage,
			'iPageNumber'=>$iPageNumber,
			'iAllPageNumber'=>$iAllPageNumber,
			'next'=>$next,
			'previous'=>$previous,
			'sQueryString'=>$sQueryString,
			'sAjaxScript'=>$sAjaxScript,
			'sPrefUrl'=>$sPrefUrl,
			);
			return Base::$oContent->getStepper($this,$aData);
		}

		switch ($this->sStepperType) {
			//------------------ Announcement Stepper -----------------
			case 'announcement':
				if ($iPage > 0) {
					$start_text = "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix . "step=0' $sAjaxScript>&larr;"
					.  'Start'  . "</a>";
					$previous_text = "<a  href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix . "step=$previous' $sAjaxScript>&larr;"
					.  'Prev'  . "</a>";
				} else {
					$start_text = "<span>&larr;" .  'Start'  . "</span>";
					$previous_text = "<span>&larr;" .  'Prev'  . "</span>";
				}

				if ($iPage > $iPageNumber) $start = $iPage - $this->iStepNumber;
				else $start = 0;

				for($i = $start; $i <= $iPageNumber + $start; $i ++) {
					if ($bDelimiter) $sDelimiter=' | ';
					if ($iPage == $i) $sPageText .= $sDelimiter."<label>$i</label> ";
					else $sPageText .= $sDelimiter."<a href='".$sPrefUrl."/?" . $sQueryString . "&"
					. $this->sPrefix . "step=$i' $sAjaxScript>$i</a> ";
					$bDelimiter=true;
				}

				if ($iPage < $iAllPageNumber) {
					$next_text = "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$next' $sAjaxScript>" .  'Next'  . "&rarr;</a> ";
					$end_text = "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$iAllPageNumber' $sAjaxScript>" .  'StepEnd'  . "&rarr;</a> ";
				} else {
					$next_text = "<span>" .  'Next'  . "&rarr;</span>";
					$end_text = "<span>" .  'StepEnd'  . "&rarr;</span>";
				}
				break;
				//------------------ OnlyNumber Stepper -----------------
			case 'onlynumber':
				$start = $iPage - ceil($iPageNumber/2);
				if ($start<0) $start=0;

				$stop=$iPageNumber + $start;
				if ($stop>$iAllPageNumber) $stop=$iAllPageNumber;

				for($i = $start; $i <= $stop; $i ++) {
					if ($iPage == $i) $sPageText .= "<a class='".$this->sStepperActiveItemClass."' href='".$sPrefUrl."/?"
					. $sQueryString . "&" . $this->sPrefix
					. "step=$i' $sAjaxScript>".($i+$this->iStartStep)."</a>";
					else $sPageText .= "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$i' $sAjaxScript>".($i+$this->iStartStep)."</a>";
				}

				break;
				//------------------ Japancars default Stepper -----------------
			case 'japancars':
					if ($iPage > 0) {
						$start_text = "<a class=list href='".$sPrefUrl."/" . Base::$aRequest['action'] ."' $sAjaxScript>" .  'Start'  . "</a>";
								$previous_text = "<a class=list href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
								. "step=$previous' $sAjaxScript>" .  'Prev'  . "</a>";
					} else {
								$start_text = "<span class=list>" .  'Start'  . "</span>";
					$previous_text = "<span class=list>" .  'Prev'  . "</span>";
				}
					if ($iPage > $iPageNumber && count($this->aItem) > 0) $start = $iPage - $this->iStepNumber;
					else $start = 0;

					for($i = $start; $i <= $iPageNumber + $start; $i ++) {
					if ($iPage == $i) $sPageText .= "<span>".($i+$this->iStartStep)."</span>";
					else $sPageText .= "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
									. "step=$i' $sAjaxScript>".($i+$this->iStartStep)."</a>";
				}

				if ($iPage < $iAllPageNumber) {
					$next_text="<a class=list href='".$sPrefUrl."/?".$sQueryString."&".$this->sPrefix
					."step=$next' $sAjaxScript>"
					.'Next'."></a>";
					$end_text = "<a class=list href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$iAllPageNumber' $sAjaxScript>" .  'StepEnd'  . "</a>";
				} else {
					$next_text = "<span class=list>" .  'Next'  . "</span>";
					$end_text = "<span class=list>" .  'StepEnd'  . "</span>";
				}
				break;
				//------------------ Default Stepper -----------------
			default:
				if ($iPage > 0) {
					$start_text = "<a class=list href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=0' $sAjaxScript><<&nbsp;" .  'Start'  . "</a>";
					$previous_text = "<a class=list href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$previous' $sAjaxScript>&nbsp;<&nbsp;" .  'Prev'  . "</a>";
				} else {
					$start_text = "<span class=list><<&nbsp;" .  'Start'  . "</span>";
					$previous_text = "<span class=list><&nbsp;" .  'Prev'  . "</span>";
				}

				if ($iPage > $iPageNumber && count($this->aItem) > 0) $start = $iPage - $this->iStepNumber;
				else $start = 0;

				for($i = $start; $i <= $iPageNumber + $start; $i ++) {
					if ($iPage == $i) $sPageText .= "<span>".($i+$this->iStartStep)."</span>&nbsp;";
					else $sPageText .= "<a href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$i' $sAjaxScript>".($i+$this->iStartStep)."&nbsp;</a>";
				}

				if ($iPage < $iAllPageNumber) {
					$next_text="<a class=list href='".$sPrefUrl."/?".$sQueryString."&".$this->sPrefix
					."step=$next' $sAjaxScript>"
					.'Next'."&nbsp;></a>";
					$end_text = "<a class=list href='".$sPrefUrl."/?" . $sQueryString . "&" . $this->sPrefix
					. "step=$iAllPageNumber' $sAjaxScript>" .  'StepEnd'  . "&nbsp;>></a>";
				} else {
					$next_text = "<span class=list>" .  'Next'  . "&nbsp;></span>";
					$end_text = "<span class=list>" .  'StepEnd'  . "&nbsp;>></span>";
				}
				break;
				//---------------------------------------------------
		}

		return $start_text . '&nbsp;&nbsp;' . $previous_text . '&nbsp;&nbsp;' . $sPageText . '&nbsp;&nbsp;' . $next_text
		. '&nbsp;' . $end_text;
	}

	//-----------------------------------------------------------------------------------------------
	public function getFilter()
	{
		$sQueryString = preg_replace ( '/&' . $this->sPrefix . 'step=(\d+)/', '', $this->sQueryString );
		$sQueryString = preg_replace ( '/&' . $this->sPrefix . 'filter=[^&]*/', '', $sQueryString );
		$sQueryString = preg_replace ( '/&' . $this->sPrefix . 'filter_value=[^&]*/', '', $sQueryString );
		Base::$tpl->assign ( 'sQueryString', $sQueryString );
		Base::$tpl->assign ( 'sFilter', stripslashes(Base::$aRequest [$this->sPrefix . 'filter']) );
		Base::$tpl->assign ( 'sFilterValue', stripslashes(Base::$aRequest [$this->sPrefix . 'filter_value']) );
		return Base::$tpl->fetch ( 'addon/table/filter/' . $this->sFilterTemplateName );
	}
	//-----------------------------------------------------------------------------------------------
	public function SetSql($sScript, $aData = array())
	{
		$sFilter = Base::$aRequest [$this->sPrefix . 'filter'];
		if ($sFilter != '') {
			$sFilterValue = Base::$aRequest [$this->sPrefix . 'filter_value'];
			if ($this->aColumn [$sFilter] ['sOrder']=='') {
				trigger_error('SET $oTable->aColumn ARRAY AFTER $oTable = new Table ( ); THEN $this->SetDefaultTable ( $oTable );
				 (example mpanel/spec/log_finance.php)',E_USER_ERROR);
			}
			if( $this->aColumn [$sFilter] ['sMethod'] ) {
				//if( $aData [$sFilter] ['sMethod'] ) {
				switch ( $this->aColumn [$sFilter] ['sMethod'] ) {
					case "one_two":
						$aData ['where'] .= " AND (".$this->aColumn [$sFilter] ['sOrder']." LIKE '%$sFilterValue%' OR ".$this->aColumn [$sFilter] ['sOrder']."2 LIKE '%$sFilterValue%')";
						break;
					case "exact":
						$aData ['where'] .= " AND ".$this->aColumn [$sFilter] ['sOrder']." = '{$sFilterValue}'";
						break;
					case "skip":
						$aData ['where'] .= '';
						break;
					default:
						$aData ['where'] .= " AND ".$this->aColumn [$sFilter] ['sOrder']." LIKE '%$sFilterValue%'";
				}
			} else {
				if( $this->aColumn [$sFilter] ['sOrder'] ) {
					$aData ['where'] .= " AND ".$this->aColumn [$sFilter] ['sOrder']." LIKE '%$sFilterValue%'";
				} else {
					trigger_error("$this->aColumn [{$sFilter}] ['sOrder'] is empty!",E_USER_ERROR);
				}
			}
		}
		$this->sSql=Base::GetSql($sScript, $aData);
	}
	//-----------------------------------------------------------------------------------------------
	private function sortArrayCallback($sA, $sB)
	{
		$sOrder = Base::$aRequest [$this->sPrefix . 'order'];
		$iOrderWay = (Base::$aRequest [$this->sPrefix . 'way'] == 'desc' ? '-1' : '1');
		if ($sA [$sOrder] == $sB [$sOrder])
		return 0;
		if ($sA [$sOrder] > $sB [$sOrder])
		return (1 * $iOrderWay);
		if ($sA [$sOrder] < $sB [$sOrder])
		return (- 1 * $iOrderWay);
	}
	//-----------------------------------------------------------------------------------------------
	public function setArray($aData)
	{
		$this->sType = 'array';
		//---------------------filter
		$sFilter = Base::$aRequest [$this->sPrefix . 'filter'];
		if ($sFilter != '') {
			$sFilterValue = Base::$aRequest [$this->sPrefix . 'filter_value'];
			$aRes = array ();
			foreach ( $aData as $aRow ) {
				if (strpos ( $aRow [$sFilter], $sFilterValue ) !== false) {
					$aRes [] = $aRow;
				}
			}
			$aData = $aRes;
		}
		//---------------------order
		$sOrder = Base::$aRequest [$this->sPrefix . 'order'];
		if ($sOrder != '') {
			usort ( $aData, array ("Table", "sortArrayCallback" ) );
		}
		//---------------------
		$this->aDataFoTable = $aData;
	}
}

?>