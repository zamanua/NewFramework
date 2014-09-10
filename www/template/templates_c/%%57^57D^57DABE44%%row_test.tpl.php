<?php /* Smarty version 2.6.18, created on 2014-09-10 21:35:47
         compiled from test/row_test.tpl */ ?>
<?php $_from = $this->_tpl_vars['oTable']->aColumn; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['item']):
?>
<td><?php echo $this->_tpl_vars['aRow'][$this->_tpl_vars['sKey']]; ?>
</td>
<?php endforeach; endif; unset($_from); ?>