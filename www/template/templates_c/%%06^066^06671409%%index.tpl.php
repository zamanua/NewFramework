<?php /* Smarty version 2.6.18, created on 2014-09-10 21:26:30
         compiled from addon/table/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'addon/table/index.tpl', 119, false),)), $this); ?>
<script type="text/javascript" src="/libp/js/table.js"></script>


<?php if ($this->_tpl_vars['sHeader']): ?>
	<?php if ($this->_tpl_vars['bHeaderType'] == 'table'): ?>
<table width="<?php echo $this->_tpl_vars['sWidth']; ?>
"  style="margin: 0 0 5px;" cellspacing="0" cellpadding="0" border="0">
<tr>
<td width="100%">
	<table width="100%" cellpadding="0" cellspacing="0"><tr>
		<td class="red_box"><?php echo $this->_tpl_vars['sHeader']; ?>
<?php if ($this->_tpl_vars['sHint']): ?><?php echo $this->_tpl_vars['sHint']; ?>
<?php endif; ?></td>
		<td class="red_box"align=right>&nbsp;<?php echo $this->_tpl_vars['sHeaderRight']; ?>
</td>
		</tr>
	</table>
</td>

</tr></table>
	<?php else: ?>
	<div class="hrey_hd"><?php echo $this->_tpl_vars['sHeader']; ?>
<?php if ($this->_tpl_vars['sHint']): ?><?php echo $this->_tpl_vars['sHint']; ?>
<?php endif; ?></div>
	<?php endif; ?>
<?php endif; ?>

<?php if ($_GET['table_error']): ?>
<div class="error_message"><?php echo $_GET['table_error']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['sTableMessage']): ?><div class="<?php echo $this->_tpl_vars['sTableMessageClass']; ?>
"><?php echo $this->_tpl_vars['sTableMessage']; ?>
</div><?php endif; ?>


<?php if ($this->_tpl_vars['bFormAvailable']): ?><form id="table_form" <?php echo $this->_tpl_vars['sFormHeader']; ?>
><?php endif; ?>
<?php if ($this->_tpl_vars['sPanelTemplateTop']): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['sPanelTemplateTop'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>

<table width="<?php echo $this->_tpl_vars['sWidth']; ?>
" cellspacing="<?php echo $this->_tpl_vars['sCellSpacing']; ?>
" cellpadding="5" class="<?php echo $this->_tpl_vars['sClass']; ?>
" >

<?php if ($this->_tpl_vars['bHeaderVisible']): ?>
<tr>
	<?php if ($this->_tpl_vars['bCheckVisible']): ?><th><?php if ($this->_tpl_vars['bCheckAllVisible']): ?><label><nobr><input type=checkbox name=check_all
		onclick="mt.SetCheckboxes(this.form,this.checked);<?php if ($this->_tpl_vars['sCheckAllAction'] != ''): ?><?php echo $this->_tpl_vars['sCheckAllAction']; ?>
;<?php endif; ?>"
		 <?php if ($this->_tpl_vars['bDefaultChecked']): ?>checked<?php endif; ?> ><?php endif; ?><?php if ($this->_tpl_vars['sMarkAllText']): ?>&nbsp;<?php echo $this->_tpl_vars['sMarkAllText']; ?>
<?php endif; ?></nobr>
		 </label></th>
	<?php endif; ?>


<?php if ($this->_tpl_vars['sTitleOrderLink']): ?>
	<?php $this->assign('title_order_link', " title='".($this->_tpl_vars['sTitleOrderLink'])."' "); ?>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['aColumn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['aValue']):
?>
	<?php echo '<th '; ?><?php if ($this->_tpl_vars['aValue']['sHeaderClassSelect']): ?><?php echo 'class="'; ?><?php echo $this->_tpl_vars['aValue']['sHeaderClassSelect']; ?><?php echo '"'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['aValue']['sClass']): ?><?php echo ' class="'; ?><?php echo $this->_tpl_vars['aValue']['sClass']; ?><?php echo '"'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['aValue']['sWidth']): ?><?php echo ' width="'; ?><?php echo $this->_tpl_vars['aValue']['sWidth']; ?><?php echo '"'; ?><?php endif; ?><?php echo ' '; ?><?php echo $this->_tpl_vars['aValue']['sAdditionalHtml']; ?><?php echo '>'; ?><?php if ($this->_tpl_vars['aValue']['sOrderLink']): ?><?php echo '<a href=\''; ?><?php if (! $this->_tpl_vars['bNoneDotUrl']): ?><?php echo '.'; ?><?php endif; ?><?php echo '/?'; ?><?php echo $this->_tpl_vars['aValue']['sOrderLink']; ?><?php echo '\' '; ?><?php echo $this->_tpl_vars['title_order_link']; ?><?php echo '>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['bHeaderNobr']): ?><?php echo '<nobr>'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['aValue']['sTitle']; ?><?php echo ''; ?><?php if (! $this->_tpl_vars['aValue']['sTitle']): ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['aValue']['sOrderLink']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['aValue']['sOrderImage']): ?><?php echo '<img src=\''; ?><?php echo $this->_tpl_vars['aValue']['sOrderImage']; ?><?php echo '\' border="0" hspace="1">'; ?><?php endif; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['bHeaderNobr']): ?><?php echo '</nobr>'; ?><?php endif; ?><?php echo '</th>'; ?>


<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['bCheckRightVisible']): ?><th><?php if ($this->_tpl_vars['bCheckAllVisible']): ?><label><nobr><input type=checkbox name=check_all
		onclick="mt.SetCheckboxes(this.form,this.checked);<?php if ($this->_tpl_vars['sCheckAllAction'] != ''): ?><?php echo $this->_tpl_vars['sCheckAllAction']; ?>
;<?php endif; ?>"
		 <?php if ($this->_tpl_vars['bDefaultChecked']): ?>checked<?php endif; ?> ><?php endif; ?><?php if ($this->_tpl_vars['sMarkAllText']): ?>&nbsp;<?php echo $this->_tpl_vars['sMarkAllText']; ?>
<?php endif; ?></nobr>
		 </label></th>
	<?php endif; ?>
</tr>
<?php elseif ($this->_tpl_vars['bHeaderGroupVisible']): ?>
<tr>
	<?php if ($this->_tpl_vars['bCheckVisible']): ?><th><?php if ($this->_tpl_vars['bCheckAllVisible']): ?><label><nobr><input type=checkbox name=check_all
		onclick="mt.SetCheckboxes(this.form,this.checked);<?php if ($this->_tpl_vars['sCheckAllAction'] != ''): ?><?php echo $this->_tpl_vars['sCheckAllAction']; ?>
;<?php endif; ?>"
		 <?php if ($this->_tpl_vars['bDefaultChecked']): ?>checked<?php endif; ?> ><?php endif; ?><?php if ($this->_tpl_vars['sMarkAllText']): ?>&nbsp;<?php echo $this->_tpl_vars['sMarkAllText']; ?>
<?php endif; ?></nobr>
		 </label></th>
	<?php endif; ?>
<?php $_from = $this->_tpl_vars['aColumn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['aValue']):
?>
	<?php if (! $this->_tpl_vars['aValue']['bGroup']): ?>
	<th <?php if ($this->_tpl_vars['aValue']['sHeaderClassSelect']): ?>class="<?php echo $this->_tpl_vars['aValue']['sHeaderClassSelect']; ?>
"<?php endif; ?>
	 rowspan="2"
	<?php if ($this->_tpl_vars['aValue']['sWidth']): ?> width="<?php echo $this->_tpl_vars['aValue']['sWidth']; ?>
"<?php endif; ?> <?php echo $this->_tpl_vars['aValue']['sAdditionalHtml']; ?>
>
	<?php if ($this->_tpl_vars['aValue']['sOrderLink']): ?><a href='<?php if (! $this->_tpl_vars['bNoneDotUrl']): ?>.<?php endif; ?>/?<?php echo $this->_tpl_vars['aValue']['sOrderLink']; ?>
'><?php endif; ?>
	<nobr><?php echo $this->_tpl_vars['aValue']['sTitle']; ?>
<?php if (! $this->_tpl_vars['aValue']['sTitle']): ?>&nbsp;<?php endif; ?>
	<?php if ($this->_tpl_vars['aValue']['sOrderLink']): ?><?php if ($this->_tpl_vars['aValue']['sOrderImage']): ?><img src='<?php echo $this->_tpl_vars['aValue']['sOrderImage']; ?>
' border="0" hspace="1"><?php endif; ?>
	</a><?php endif; ?></nobr>
	</th>
	<?php else: ?>
	<?php echo $this->_tpl_vars['aValue']['sGroupTitle']; ?>

	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['bCheckRightVisible']): ?><th><?php if ($this->_tpl_vars['bCheckAllVisible']): ?><label><nobr><input type=checkbox name=check_all
		onclick="mt.SetCheckboxes(this.form,this.checked);<?php if ($this->_tpl_vars['sCheckAllAction'] != ''): ?><?php echo $this->_tpl_vars['sCheckAllAction']; ?>
;<?php endif; ?>"
		 <?php if ($this->_tpl_vars['bDefaultChecked']): ?>checked<?php endif; ?> ><?php endif; ?><?php if ($this->_tpl_vars['sMarkAllText']): ?>&nbsp;<?php echo $this->_tpl_vars['sMarkAllText']; ?>
<?php endif; ?></nobr>
		 </label></th>
	<?php endif; ?>
</tr>
<tr>
<?php $_from = $this->_tpl_vars['aColumn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['aValue']):
?>
	<?php if ($this->_tpl_vars['aValue']['bGroup']): ?>
	<th <?php if ($this->_tpl_vars['aValue']['sHeaderClassSelect']): ?>class="<?php echo $this->_tpl_vars['aValue']['sHeaderClassSelect']; ?>
"<?php endif; ?>
	<?php if ($this->_tpl_vars['aValue']['sWidth']): ?> width="<?php echo $this->_tpl_vars['aValue']['sWidth']; ?>
"<?php endif; ?> <?php echo $this->_tpl_vars['aValue']['sAdditionalHtml']; ?>
>
	<nobr><?php echo $this->_tpl_vars['aValue']['sTitle']; ?>
<?php if (! $this->_tpl_vars['aValue']['sTitle']): ?>&nbsp;<?php endif; ?></nobr>
	</th>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['sStepper'] && $this->_tpl_vars['bTopStepper']): ?>
<tr class="<?php echo $this->_tpl_vars['sStepperClass']; ?>
">
	<td colspan="20" align="<?php echo $this->_tpl_vars['sStepperAlign']; ?>
">
	<?php echo $this->_tpl_vars['sStepper']; ?>

	</td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['sSubtotalTemplateTop']): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['sSubtotalTemplateTop'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>

<?php unset($this->_sections['d']);
$this->_sections['d']['name'] = 'd';
$this->_sections['d']['loop'] = is_array($_loop=$this->_tpl_vars['aItem']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d']['show'] = true;
$this->_sections['d']['max'] = $this->_sections['d']['loop'];
$this->_sections['d']['step'] = 1;
$this->_sections['d']['start'] = $this->_sections['d']['step'] > 0 ? 0 : $this->_sections['d']['loop']-1;
if ($this->_sections['d']['show']) {
    $this->_sections['d']['total'] = $this->_sections['d']['loop'];
    if ($this->_sections['d']['total'] == 0)
        $this->_sections['d']['show'] = false;
} else
    $this->_sections['d']['total'] = 0;
if ($this->_sections['d']['show']):

            for ($this->_sections['d']['index'] = $this->_sections['d']['start'], $this->_sections['d']['iteration'] = 1;
                 $this->_sections['d']['iteration'] <= $this->_sections['d']['total'];
                 $this->_sections['d']['index'] += $this->_sections['d']['step'], $this->_sections['d']['iteration']++):
$this->_sections['d']['rownum'] = $this->_sections['d']['iteration'];
$this->_sections['d']['index_prev'] = $this->_sections['d']['index'] - $this->_sections['d']['step'];
$this->_sections['d']['index_next'] = $this->_sections['d']['index'] + $this->_sections['d']['step'];
$this->_sections['d']['first']      = ($this->_sections['d']['iteration'] == 1);
$this->_sections['d']['last']       = ($this->_sections['d']['iteration'] == $this->_sections['d']['total']);
?>
<?php $this->assign('aRow', $this->_tpl_vars['aItem'][$this->_sections['d']['index']]); ?>
<tr id="tr<?php echo $this->_tpl_vars['aItem'][$this->_sections['d']['index']]['iTr']; ?>
" <?php if ($this->_tpl_vars['bHideTr']): ?> pn="<?php echo $this->_tpl_vars['aItem'][$this->_sections['d']['index']]['iHideTr']; ?>
"<?php endif; ?>
	<?php if ($this->_tpl_vars['aItem'][$this->_sections['d']['index']]['class_tr']): ?>class="<?php echo $this->_tpl_vars['aItem'][$this->_sections['d']['index']]['class_tr']; ?>
<?php else: ?>class="<?php echo smarty_function_cycle(array('values' => "none,even"), $this);?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['bDefaultChecked']): ?> <?php echo $this->_tpl_vars['aRow']['sClassCheckTr']; ?>
<?php elseif ($this->_tpl_vars['aRow']['bCheckTr']): ?> <?php echo $this->_tpl_vars['aRow']['sClassCheckTr']; ?>
<?php endif; ?>
	"
	<?php if ($this->_tpl_vars['aItem'][$this->_sections['d']['index']]['hide_tr'] == '1'): ?>style="display: none;"<?php elseif ($this->_tpl_vars['aItem'][$this->_sections['d']['index']]['style_tr']): ?>style="<?php echo $this->_tpl_vars['aItem'][$this->_sections['d']['index']]['style_tr']; ?>
"<?php endif; ?>
	<?php if ($this->_tpl_vars['bCheckVisible'] && $this->_tpl_vars['bCheckOnClick']): ?>onclick="var ch=getCookie('checkbox'); setCookie('checkbox','0',1);if(ch=='1') return true; var c=$('#row_check_<?php echo $this->_sections['d']['index']; ?>
');c.prop('checked', !c.prop('checked')); return false;"<?php endif; ?>
	<?php if ($this->_tpl_vars['aItem'][$this->_sections['d']['index']]['js_tr']): ?><?php echo $this->_tpl_vars['aItem'][$this->_sections['d']['index']]['js_tr']; ?>
<?php endif; ?>>

	<?php if ($this->_tpl_vars['bCheckVisible']): ?><td><?php if (! $this->_tpl_vars['aRow']['bCheckHide']): ?><input type=checkbox name=row_check[]
	id='row_check_<?php echo $this->_sections['d']['index']; ?>
' value='<?php echo $this->_tpl_vars['aRow'][$this->_tpl_vars['sCheckField']]; ?>
'
	<?php if ($this->_tpl_vars['bDefaultChecked']): ?> checked<?php elseif ($this->_tpl_vars['aRow']['bCheckTr']): ?> checked<?php endif; ?>
	<?php if ($this->_tpl_vars['bCheckVisible'] && $this->_tpl_vars['bCheckOnClick']): ?>onclick="setCookie('checkbox','1',1);"<?php endif; ?>
	<?php if ($this->_tpl_vars['sCheckAction'] != ''): ?>onchange="<?php echo $this->_tpl_vars['sCheckAction']; ?>
"<?php endif; ?>><?php endif; ?></td>
	<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['sDataTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php if ($this->_tpl_vars['bCheckRightVisible']): ?><td><?php if (! $this->_tpl_vars['aRow']['bCheckHide']): ?><input type=checkbox name=row_check[]
	id='row_check_<?php echo $this->_sections['d']['index']; ?>
' value='<?php echo $this->_tpl_vars['aRow'][$this->_tpl_vars['sCheckField']]; ?>
'
	<?php if ($this->_tpl_vars['bDefaultChecked']): ?> checked<?php elseif ($this->_tpl_vars['aRow']['bCheckTr']): ?> checked<?php endif; ?>
	<?php if ($this->_tpl_vars['bCheckVisible'] && $this->_tpl_vars['bCheckOnClick']): ?>onclick="setCookie('checkbox','1',1);"<?php endif; ?>
	<?php if ($this->_tpl_vars['sCheckAction'] != ''): ?>onchange="<?php echo $this->_tpl_vars['sCheckAction']; ?>
"<?php endif; ?>><?php endif; ?></td>
	<?php endif; ?>
</tr>
<?php endfor; endif; ?>


<?php if (! $this->_tpl_vars['aItem']): ?>
<tr>
	<td class="even" colspan="20">
	<?php if ($this->_tpl_vars['sNoItem']): ?>
		<?php echo $this->_tpl_vars['sNoItem']; ?>

	<?php else: ?>
		<?php echo 'No items found'; ?>

	<?php endif; ?>
	</td>
</tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['sSubtotalTemplate']): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['sSubtotalTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>

<?php if ($this->_tpl_vars['sStepper'] && ! $this->_tpl_vars['bStepperOutTable']): ?>
<?php echo '
<style>
.list{
	font-family: Arial, Helvetica, sans-serif;
	/*color: 5977A5;*/
	text-decoration: none;
	/*font-size: 11px;
	font-weight: bold;*/
}
</style>
'; ?>

<tr class="<?php echo $this->_tpl_vars['sStepperClass']; ?>
">
	<td colspan="20" align="<?php echo $this->_tpl_vars['sStepperAlign']; ?>
">
	<?php echo $this->_tpl_vars['sStepper']; ?>

	<?php if ($this->_tpl_vars['bStepperInfo']): ?>
	<span class="<?php echo $this->_tpl_vars['sStepperInfoClass']; ?>
"><?php echo 'showing row'; ?>
 <?php echo $this->_tpl_vars['iStartRow']+1; ?>
 - <?php if (( $this->_tpl_vars['iEndRow'] == 10000 && $this->_tpl_vars['iAllRow'] < 10000 ) || $this->_tpl_vars['iAllRow'] < $this->_tpl_vars['iEndRow']): ?><?php echo $this->_tpl_vars['iAllRow']; ?>
<?php else: ?><?php echo $this->_tpl_vars['iEndRow']; ?>
<?php endif; ?> of <?php echo $this->_tpl_vars['iAllRow']; ?>
</span>
	<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['bShowRowPerPage']): ?>
<tr>
	<td colspan="20" align="right">
	<?php echo 'Display #'; ?>

<select id=display_select_id name=display_select style="width: 50px;"
	onchange="<?php echo 'javascript:location.href=\'/?'; ?><?php echo $this->_tpl_vars['sActionRowPerPage']; ?><?php echo '&content=\'+document.getElementById(\'display_select_id\').options[document.getElementById(\'display_select_id\').selectedIndex].value;'; ?>
">
	<option value=10 <?php if ($this->_tpl_vars['iRowPerPage'] == 10): ?> selected<?php endif; ?>>10</option>
    <option value=20 <?php if ($this->_tpl_vars['iRowPerPage'] == 20 || ! $this->_tpl_vars['iRowPerPage']): ?> selected<?php endif; ?>>20</option>
    <option value=50 <?php if ($this->_tpl_vars['iRowPerPage'] == 50): ?> selected<?php endif; ?>>50</option>
    <option value=100 <?php if ($this->_tpl_vars['iRowPerPage'] == 100): ?> selected<?php endif; ?>>100</option>
    <?php if ($this->_tpl_vars['bShowPerPageAll']): ?><option value=10000 <?php if ($this->_tpl_vars['iRowPerPage'] == 10000): ?> selected<?php endif; ?>><?php echo 'all'; ?>
</option><?php endif; ?>
</select>

<span class="stepper_results"><?php echo 'Results'; ?>
 <?php echo $this->_tpl_vars['iStartRow']; ?>
 - <?php if ($this->_tpl_vars['iEndRow'] == 10000 && $this->_tpl_vars['iAllRow'] < 10000): ?><?php echo $this->_tpl_vars['iAllRow']; ?>
<?php else: ?><?php echo $this->_tpl_vars['iEndRow']; ?>
<?php endif; ?> <?php echo 'of'; ?>
 <?php echo $this->_tpl_vars['iAllRow']; ?>
</span>
	</td>
</tr>
<?php endif; ?>

</table>

<?php if ($this->_tpl_vars['sStepper'] && $this->_tpl_vars['bStepperOutTable']): ?>
<div class="<?php echo $this->_tpl_vars['sStepperClass']; ?>
">
	<?php echo $this->_tpl_vars['sStepper']; ?>

	<?php if ($this->_tpl_vars['bStepperInfo']): ?>
	<span class="<?php echo $this->_tpl_vars['sStepperInfoClass']; ?>
"><?php echo 'showing row'; ?>
 <?php echo $this->_tpl_vars['iStartRow']+1; ?>
 - <?php if (( $this->_tpl_vars['iEndRow'] == 10000 && $this->_tpl_vars['iAllRow'] < 10000 ) || $this->_tpl_vars['iAllRow'] < $this->_tpl_vars['iEndRow']): ?><?php echo $this->_tpl_vars['iAllRow']; ?>
<?php else: ?><?php echo $this->_tpl_vars['iEndRow']; ?>
<?php endif; ?> <?php echo 'of'; ?>
 <?php echo $this->_tpl_vars['iAllRow']; ?>
</span>
	<?php endif; ?>
</div>
<?php endif; ?>

<div style="padding: 5px;">
<?php if ($this->_tpl_vars['sButtonTemplate']): ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['sButtonTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php endif; ?>

<?php if ($this->_tpl_vars['sAddButton']): ?>
<span <?php if ($this->_tpl_vars['sButtonSpanClass']): ?>class="button"<?php endif; ?>>
<input type=button class='btn' value="<?php echo $this->_tpl_vars['sAddButton']; ?>
" onclick="location.href='<?php if (! $this->_tpl_vars['bNoneDotUrl']): ?>.<?php endif; ?>/?action=<?php echo $this->_tpl_vars['sAddAction']; ?>
'" >
</span>
<?php endif; ?>
</div>


<?php if ($this->_tpl_vars['bFormAvailable']): ?>
<input type="hidden" name="action" id='action' value='<?php if ($this->_tpl_vars['sFormAction']): ?><?php echo $this->_tpl_vars['sFormAction']; ?>
<?php else: ?>empty<?php endif; ?>'>
<input type="hidden" name="return" id='return' value='<?php echo $this->_tpl_vars['sReturn']; ?>
'>
</form>
<?php endif; ?>