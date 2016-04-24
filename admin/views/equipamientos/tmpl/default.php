<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');

// Cargar el comportamiento tooltip
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_coche'); ?>" method="post" name="adminForm">
        <table class="adminlist">
                <thead><?php echo $this->loadTemplate('head');?></thead>
                <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
                <tbody><?php echo $this->loadTemplate('body');?></tbody>
        </table>
        <div>
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
        <input type = "hidden" name = "view" value = "equipamientos"  /> 
</form>