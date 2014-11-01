<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
 
// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<div class="clr clear"></div>
<table class="adminlist table table-striped">
    <thead><?php echo $this->loadTemplate('head');?></thead>    
    <tbody><?php echo $this->loadTemplate('body');?></tbody>
    <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
</table>
