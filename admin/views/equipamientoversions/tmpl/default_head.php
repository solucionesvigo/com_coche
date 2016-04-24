<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');



echo "<h3>Equipamientos del $this->marca $this->modelo $this->version</h3>";
?>

<tr>
        
        <th width="5">
                <?php echo JText::_('COM_COCHE_EQUIPAMIENTOVERSIONS_HEADING_IDEQUIPAMIENTO'); ?>
        </th>
        <th width="5">
                <?php echo JText::_('COM_COCHE_EQUIPAMIENTOVERSIONS_HEADING_EQUIPAMIENTO'); ?>
        </th>
        <th width="5">
                <?php echo JText::_('COM_COCHE_EQUIPAMIENTOVERSIONS_HEADING_CLASEEQUIPAMIENTO'); ?>
        </th>
        <th width="5">
                <?php echo JText::_('COM_COCHE_EQUIPAMIENTOVERSIONS_HEADING_SELECCIONAR'); ?>
        </th>
</tr>