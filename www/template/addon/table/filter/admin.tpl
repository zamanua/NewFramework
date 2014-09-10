<nobr>
<select id=filter_select_id name="filter_select" style="width:100px">';
	{foreach key=sField item=aRow from=$oTable->aColumn}
	{if $aRow.sOrder!=''}
	<option value="{$sField}"{if $sFilter==$sField} selected{/if}>{$aRow.sTitle}</option>
	{/if}
	{/foreach}
</select>

<input id="filter_input_id" name="filter_input" value="{$sFilterValue}"> &nbsp;
<a href="?{$sQueryString}"
onclick="
	xajax_process_browse_url(this.href
	+(document.getElementById('filter_input_id').value!=''?
	'&filter='+document.getElementById('filter_select_id').options[document.getElementById('filter_select_id').selectedIndex].value
	+'&filter_value='+document.getElementById('filter_input_id').value
	:'')
	);
return false;
"
><b>{'Filter'}</b></a> &nbsp;
<a href="?{$sQueryString}"
onclick="xajax_process_browse_url(this.href);return false;"><b>{'Clear'}</b></a>
</nobr>