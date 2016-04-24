<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_coche&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="equipamientoversions-form">
        
                <legend><?php echo JText::_( 'Equipamientos' ); ?></legend>
            
                <?php 
                    foreach($this->tablaClaseEquipamiento as $j => $clase):
                ?>
                            <h3><?php echo  $clase->nombre ?></h3>
                            <table class="adminlist">
                            <thead>
                                <tr>
                                        <th width="5">
                                                ID
                                        </th>
                                        <th width="5">
                                                Equipamiento
                                        </th>
                                        <th width="5">
                                                Seleccionar
                                        </th>
                                </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>

                                <?php
                                foreach($this->tablaEquipamientos as $i => $item):
                                        if($clase->id==$item->idClaseequipamiento)
                                        {
                                            echo "<tr class='row ";
                                            echo $i%2;
                                            echo "'>
                                                    <td>
                                                              $item->id 
                                                    </td>
                                                    <td>
                                                              $item->nombre 
                                                    </td>
                                                    <td>";
                                            echo  JHtml::_('grid.id', $i, "$item->id|$clase->id");
//                                            
                                            echo   "</td>
                                            </tr>";
                                        }

                                endforeach; ?>

                            </tbody>
                    </table>
        <?php        endforeach; ?>
        <div>
                <input type="hidden" name="task" value="equipamientoversion.edit" />
                <input type="hidden" name="boxchecked" value="0"
                <?php echo JHtml::_('form.token'); ?>
        </div>
        <?php echo "<input type='hidden' name='iddeVersion' value='$this->iddeVersion'/>"?>
</form>