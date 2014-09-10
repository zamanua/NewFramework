<?
/**
 * @author
 */
class Db extends Base
{
	/**
	 * Execute SQL
	 *
	 * @param sql		SQL statement to execute, or possibly an array holding prepared statement ($sql[0] will hold sql text)
	 * @param [inputarr]	holds the input data to bind to. Null elements will be set to null.
	 * @return 		RecordSet or false
	 */
	public function Execute($sSql,$aInput=false)
	{
		return Base::$db->Execute($sSql,$aInput);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	* Execute SQL and get result array ([0]=>array(field=>value, ...),[1]=>array(....))
	*
	* @param sql
	* @return array ([0]=>array(field=>value, ...),[1]=>array(....))
	*/
	public function GetAll($sSql)
	{
		return Base::$db->GetAll($sSql);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Execute SQL and get result array(id1=>array(f1,f2 ...),id2=>array(f1,f2 ...))
	 *
	 * @param string $sSql or Assoc/Name
	 * @param array $aData for Base::GetSql
	 * @return array (id1=>array(f1,f2 ...),id2=>array(f1,f2 ...))
	 */
	public function GetAssoc($sSql, $aData=array(), $bReturnSql=false)
	{
		if ("Assoc/"==substr($sSql,0,6)) $sSql=Base::GetSql($sSql,$aData);
		return $bReturnSql?$sSql:Base::$db->GetAssoc($sSql);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	* Execute SQL and get Row
	*
	* @param sql
	* @return array (fild=>value, fild2=>value2 ...)
	*/
	public function GetRow($sSql)
	{
		return Base::$db->GetRow($sSql);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	* Execute SQL and one item
	*
	* @param sql
	* @return string item
	*/
	public function GetOne($sSql)
	{
		return Base::$db->GetOne($sSql);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 *
	 * Similar to PEAR DB's autoExecute(), except that
	 * $mode can be 'INSERT' or 'UPDATE' or DB_AUTOQUERY_INSERT or DB_AUTOQUERY_UPDATE
	 * If $mode == 'UPDATE', then $where is compulsory as a safety measure.
	 *
	 * $forceUpdate means that even if the data has not changed, perform update.
	 */
	public function AutoExecute($sTable, $aFieldValue, $sMode = 'INSERT', $sWhere = FALSE, $bForceUpdate=true, $bMagicQuote=false)
	{
		if (Base::GetConstant('db:is_table_logged','0')) {
			$aTableArray=preg_split("/[\s,;]+/", Base::GetConstant('db:table_logged_array'));
			if (in_array($sTable, $aTableArray)) {
				$aLogTable=array(
				'table_name'=>$sTable,
				'mode_name'=>$sMode,
				'description'=>print_r($aFieldValue,true),
				'where_name'=>$sWhere,
				);
				Base::$db->AutoExecute('log_table', $aLogTable);
			}
		}
		return Base::$db->AutoExecute($sTable, $aFieldValue, $sMode, $sWhere, $bForceUpdate, $bMagicQuote);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Show debug sql
	 */
	public function Debug()
	{
		Base::$db->debug=true;
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Write Log Sql to table adodb_logsql
	 */
	public function LogSql($bEnable=true)
	{
		Base::$db->LogSQL($bEnable);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Last insert ID
	 *
	 * @return integer ID
	 */
	public function InsertId()
	{
		return Base::$db->Insert_ID();
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Number of row
	 *
	 * @return integer Col
	 */
	public function AffectedRow()
	{
		return Base::$db->Affected_Rows();
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Start transaction
	 *
	 */
	public function StartTrans()
	{
		Base::$db->StartTrans();
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Fail transaction
	 *
	 */
	public function FailTrans()
	{
		Base::$db->FailTrans();
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Complete transaction
	 *
	 */
	public function CompleteTrans()
	{
		return Base::$db->CompleteTrans();
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * escape array function mysql_escape_string
	 *
	 * @param array $aData
	 * @return array
	 */
	public function Escape($aData)
	{
		if ($aData) {
			foreach ($aData as $sKey => $aValue) {
				$aDataNew[$sKey]=mysql_escape_string($aValue);
			}
			return $aDataNew;
		} else return false;
	}
	//--------------------------------------------------------------------------------------------------

	/**
	 * Get Insert Sql
	 *
	 * @param object $oSql
	 * @param array $aField
	 * @param boolen $bMagicq
	 * @param string $force
	 * @return string
	 */
	public function GetInsertSql($oSql, $aField, $bMagicq=true, $sForce=null)
	{
		return Base::$db->GetInsertSQL($oSql, $aField, $bMagicq, $sForce);
	}
	//--------------------------------------------------------------------------------------------------

	/**
	* Will select, getting rows from $offset (1-based), for $nrows.
	* This simulates the MySQL "select * from table limit $offset,$nrows" , and
	* the PostgreSQL "select * from table limit $nrows offset $offset". Note that
	* MySQL and PostgreSQL parameter ordering is the opposite of the other.
	* eg.
	*  SelectLimit('select * from table',3); will return rows 1 to 3 (1-based)
	*  SelectLimit('select * from table',3,2); will return rows 3 to 5 (1-based)
	*
	* Uses SELECT TOP for Microsoft databases (when $this->hasTop is set)
	* BUG: Currently SelectLimit fails with $sql with LIMIT or TOP clause already set
	*
	* @param sSql
	* @param iRow [nrows]		is the number of rows to get
	* @param iStart [offset]	is the row to start calculations from (1-based)
	* @param [inputarr]	array of bind variables
	* @param [secs2cache]		is a private parameter only used by jlim
	* @return object the recordset ($rs->databaseType == 'array')
 	*/
	public function SelectLimit($sSql, $iRow=-1, $iStart=-1, $inputarr=false,$secs2cache=0)
	{
		return Base::$db->SelectLimit($sSql, $iRow, $iStart, $inputarr, $secs2cache);
	}
	//--------------------------------------------------------------------------------------------------
	/**
	 * Return aditional info about table of current database
	 *
	 * @param string $sType
	 * @return array
	 */
	public function GetTableInfo($sType='')
	{
		$aRow= Db::GetAll("SHOW TABLE STATUS");
		foreach ($aRow as $sKey => $aValue) {
			switch ($sType) {
				case 'name':
					$aRowReturn[0].=' '.$aValue['Name'];
					$aRowReturn[]=$aValue['Name'];
					break;

				case 'dump':
					if ($sOldName && substr($aValue['Name'],0,3)!=substr($sOldName,0,3)) {
						$aRowReturn[0].="\\\n";
					}
					$aRowReturn[0].=$aValue['Name']." ";
					$sOldName=$aValue['Name'];
					break;

				default:
					$aRowReturn=$aRow;
					break;
			}
		}
		return $aRowReturn;
	}
	//--------------------------------------------------------------------------------------------------
	/**
	 * Set sWhere for include/sql function
	 *
	 * @param string $sWhere
	 * @param array $aData
	 * @param string $sDataField
	 * @param string $sPrefix
	 * @param string $sTableField
	 */
	public static function SetWhere(&$sWhere,$aData,$sDataField,$sPrefix,$sTableField="")
	{
		if ($aData[$sDataField]) {
			if ($sTableField=="") $sTableField=$sDataField;
			$s="='"; $ss="'";
			if (strpos($aData[$sDataField],'>')===0 || strpos($aData[$sDataField],'<')===0) {
				$s=""; $ss="";
			}
			$sWhere.=" and ".$sPrefix.".".$sTableField.$s.$aData[$sDataField].$ss;
		}
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Get sql for convert date from sql to normal format
	 *
	 * @param string $sNameField
	 * @return srting
	 */
	public static function GetDateFormat($sNameField="post_date", $sFormat="")
	{
		if (!$sFormat) $sFormat=Base::GetConstant("date_format");
		return " date_format(".$sNameField.",'".$sFormat."')";
	}
	//-----------------------------------------------------------------------------------------------
	/**
	 * Get date or sql to convert data from normal to sql format
	 *
	 * @param string $sPostDate
	 * @param boolen $bReturnDate
	 * @return string
	 */
	public static function GetStrToDate($sPostDate, $bReturnDate=false, $sFormat="")
	{
		if (!$sFormat) $sFormat=Base::GetConstant("date_format");
		$sSql=" str_to_date('".$sPostDate."', '".$sFormat."') ";
		if ($bReturnDate) return Db::GetOne("select".$sSql); else return $sSql;
	}
}
?>