<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_coche&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="equipamientoclases-form">
        <fieldset class="adminform">
                <legend><?php echo JText::_( 'Detalles de la clase de equipamiento' ); ?></legend>
                <ul class="adminformlist">
<?php 
    $cont=0;
    foreach($this->form->getFieldset() as $field):
        
            echo "<li>".$field->label;echo $field->input."</li>";
        
        endforeach; ?>
                </ul>
        </fieldset>
        <div>
                <input type="hidden" name="task" value="equipamientoclase.edit" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>