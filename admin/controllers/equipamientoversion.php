<?php

// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// Importar librería de controladores de formulario de Joomla
jimport('joomla.application.component.controllerform');
 
/**
 *Controlador Equipamientoversion
 */
class CocheControllerEquipamientoversion extends JControllerForm
{
    public function add()
    {
            $idVersion=$_POST['iddeVersion'];

            // Initialise variables.
            $app = JFactory::getApplication();
            $context = "$this->option.edit.$this->context";

            // Access check.
            if (!$this->allowAdd())
            {
                    // Set the internal error and also the redirect error.
                    $this->setError(JText::_('JLIB_APPLICATION_ERROR_CREATE_RECORD_NOT_PERMITTED'));
                    $this->setMessage($this->getError(), 'error');

                    $this->setRedirect(
                            JRoute::_(
                                    'index.php?option=' . $this->option . '&view=' . $this->view_list
                                    . $this->getRedirectToListAppend(), false
                            )
                    );

                    return false;
            }

            // Clear the record edit information from the session.
            $app->setUserState($context . '.data', null);

            // Redirect to the edit screen.
            $this->setRedirect(
                    JRoute::_(
                            'index.php?option=' . $this->option . '&view=' . $this->view_item.'&iddeVersion='.$idVersion
                            . $this->getRedirectToItemAppend(), false
                    )
            );

            return true;
    }
        
    public function cancelarAnadirEquipamiento()
    {
            $idVersion=$_POST['iddeVersion'];

            $this->setRedirect(
                    JRoute::_(
                            'index.php?option=com_coche&view=equipamientoversions&extension=com_coche&iddeVersion='.$idVersion
                            , false
                    )
            );


    }

    
    public function guardarEquipamientoAnadido()
    {
        $idVersion=$_POST['iddeVersion'];
        $equipamientosAnadidos = JRequest::getVar('cid', array(), '', 'array');
        
        
        
        $basedatos = &JFactory::getDBO();
        $consulta="INSERT INTO #__coche_equipamientosversion (idVersion, idEquipamiento, idClaseequipamiento) VALUES ";
        
                
        for($i=0; $i<count($equipamientosAnadidos); $i++)
        {
            $idEquipamiento=substr($equipamientosAnadidos[$i], 0, strpos($equipamientosAnadidos[$i], '|'));
            
            $idClase = substr( strstr($equipamientosAnadidos[$i],'|') , 1 );
            
            if(count($equipamientosAnadidos)>$i+1)
                $consulta=$consulta."($idVersion, $idEquipamiento, $idClase),";
            else
                $consulta=$consulta."($idVersion, $idEquipamiento, $idClase);";
            
           
            
        }

        $basedatos->setQuery((string)$consulta);
        $basedatos->query();
        $this->setRedirect(
                    JRoute::_(
                            'index.php?option=com_coche&view=equipamientoversions&extension=com_coche&iddeVersion='.$idVersion
                            , false
                    )
            );
    }
}