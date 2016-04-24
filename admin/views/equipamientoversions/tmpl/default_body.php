<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item):
        if($item->idVersion==$this->iddeVersion)
        {                                        
        foreach($this->equipamientos as $ii => $equipamiento):
                if($equipamiento->id ==$item->idEquipamiento)
                {
                    foreach($this->claseEquipamientos as $iii => $claseEquipamiento):
                            if($claseEquipamiento->id ==$item->idClaseequipamiento)
                            {
                                ?>
                    <tr class="row<?php echo $i % 2; ?>">

                            <td>
                                    <?php echo $item->idEquipamiento; ?>
                            </td>
                            <td>
                                    <?php echo $equipamiento->nombre; ?>
                            </td>
                            <td>
                                    <?php echo $claseEquipamiento->nombre; ?>
                            </td>
                            <td>
                                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                    </tr>
<?php 
break;
}

endforeach;
break;
}

endforeach;
        }
endforeach; ?>