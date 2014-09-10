<script type="text/javascript" src="/libp/js/table.js"></script>

{if $sHeader}
<table width="{$sWidth}"  style="margin:0 0 5px 0;" cellspacing=0 cellpadding=0 border=0>
<tr>
<td width=100%>
	<table width=100% cellpadding=0 cellspacing=0><tr>
		<td class="red_box">{$sHeader}{if $sHint}{$sHint}{/if}</td>
		<td class="red_box"align=right>&nbsp;{$sHeaderRight}</td>
		</tr>
	</table>
</td>

</tr></table>
<!--div style="font-size:20; color:#592D2E; background-color: yellow; font-weight: bold; "> :: {$sHeader} :: </span>{if $sHint}{$sHint}{/if}</div-->
{/if}

{if $smarty.get.table_error}
<div class="error_message">{$smarty.get.table_error}</div>
{/if}


{if $bFormAvailable}<form id="table_form" {$sFormHeader}>{/if}
{if $bTableWithoytStyle}
	<table>
{else}
	<table width="{$sWidth}" cellspacing=0 cellpadding=5 class="{$sClass}" >
{/if}
{if $sTableHeader}
<tr>
	<th colspan="5"><nobr>{$sTableHeader}</th>
</tr>
{/if}
{if $bHeaderVisible}
<tr>
	{if $bCheckVisible}<th><input type=checkbox name=check_all
		onclick="mt.SetCheckboxes(this.form,this.checked);" {if $bDefaultChecked}checked{/if} ></th>
	{/if}

{foreach key=key item=aValue from=$aColumn}
	<th {if $aValue.sWidth} width="{$aValue.sWidth}"{/if}><nobr>{$aValue.sTitle}{if !$aValue.sTitle}&nbsp;{/if}</th>
{/foreach}
</tr>
{/if}

<tr {if $bTableStyling}class="{cycle values="even,none"}" {/if}>
{assign var=i value=0}
{section name=d loop=$aItem}
	{assign var=i value=$i+1}

	{assign var=aRow value=$aItem[d]}
	{include file=$sDataTemplate}

	{if !($i % $iGallery}
	</tr>
	<tr {if $bTableStyling}class="{cycle values="even,none"}" {/if}>
	{/if}
{/section}
</tr>


{if !$aItem}
<tr>
	<td class=even colspan=20>
	{if $sNoItem}
		{$sNoItem}
	{else}
		{"No items found"}
	{/if}
	</td>
</tr>
{/if}


{if $sSubtotalTemplate} {include file=$sSubtotalTemplate} {/if}

{if $sStepper}
{literal}
<style>
.stepper{
	font-family: Arial, Helvetica, sans-serif;
	/*color: 5977A5;*/
	text-decoration: none;
	/*font-size: 11px;
	font-weight: bold;*/
}
</style>
{/literal}
<tr {if $bStepperStyling} class="stepper" {/if}>
	<td colspan="20" align="{$sStepperAlign}">
	{$sStepper}
	</td>
</tr>
{/if}

</table>

<div style="padding: 5px;">
{if $sButtonTemplate} {include file=$sButtonTemplate} {/if}

{if $sAddButton}
<input type=button class='btn' value="{$sAddButton}" onclick="location.href='./?action={$sAddAction}'" >
{/if}
</div>


{if $bFormAvailable}
<input type=hidden name=action id='action' value='empty'>
<input type=hidden name=return id='return' value=''>
</form>
{/if}