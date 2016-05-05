<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;

/**
 * Ayuda del componente Coche.
 */
class CocheHelper extends JHelperContent
{
        /**
         * Configurar la barra de enlaces.
         */
        public static function addSubmenu($submenu) 
        {
            //~ echo '<pre>';
			//~ echo 'Entro en com_coche/helpers/coche.php en funcion addSubMenu<br/>';
			//~ echo ' Aqui utilizamod JSubMenuHelper cuando otros componentes utiliza JHtmlSidebar::....';
			//~ echo '</pre>';
			//~ 
			//~ if(isset ($_REQUEST['view']))
            //~ {
                //~ if($_REQUEST['view']=='nodelos' || $_REQUEST['view']=='versions' ||$_REQUEST['view']=='equipamientoclases' ||$_REQUEST['view']=='equipamientos')
                    //~ $submenu=$_REQUEST['view'];
                //~ else
                    //~ if($_REQUEST['view']=='equipamientoversions')
                        //~ $submenu='versions';
            //~ }
            //~ 
            
            JSubMenuHelper::addEntry(JText::_('COM_COCHE_SUBMENU_MARCAS'),
                                     'index.php?option=com_coche&view=marcas&extension=com_coche', $submenu == 'marcas');
            JSubMenuHelper::addEntry(JText::_('COM_COCHE_SUBMENU_NODELO'), 'index.php?option=com_coche&view=nodelos&extension=com_coche', $submenu == 'nodelos');
            // configurar algunas propiedades globales
            $document = JFactory::getDocument();
            // La línea de abajo es para el icono de la pestaña
            //$document->addStyleDeclaration('.icon-48-helloworld ' . '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
            if ($submenu == 'nodelos') 
            {
                    $document->setTitle(JText::_('COM_COCHE_ADMINISTRATION_NODELO'));
            }

            JSubMenuHelper::addEntry(JText::_('COM_COCHE_SUBMENU_VERSION'), 'index.php?option=com_coche&view=versions&extension=com_coche', $submenu == 'versions');
            // configurar algunas propiedades globales
            $document = JFactory::getDocument();
            //$document->addStyleDeclaration('.icon-48-helloworld ' . '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
            if ($submenu == 'versions') 
            {
                    $document->setTitle(JText::_('COM_COCHE_ADMINISTRATION_VERSIONS'));
            }
            
            JSubMenuHelper::addEntry(JText::_('COM_COCHE_SUBMENU_EQUIPAMIENTOCLASE'), 'index.php?option=com_coche&view=equipamientoclases&extension=com_coche', $submenu == 'equipamientoclases');
            // configurar algunas propiedades globales
            $document = JFactory::getDocument();
            //$document->addStyleDeclaration('.icon-48-helloworld ' . '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
            if ($submenu == 'equipamientoclases') 
            {
                    $document->setTitle(JText::_('COM_COCHE_ADMINISTRATION_EQUIPAMIENTOCLASES'));
            }
            
            JSubMenuHelper::addEntry(JText::_('COM_COCHE_SUBMENU_EQUIPAMIENTO'), 'index.php?option=com_coche&view=equipamientos&extension=com_coche', $submenu == 'equipamientos');
            // configurar algunas propiedades globales
            $document = JFactory::getDocument();
            //$document->addStyleDeclaration('.icon-48-helloworld ' . '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
            if ($submenu == 'equipamientos') 
            {
                    $document->setTitle(JText::_('COM_COCHE_ADMINISTRATION_EQUIPAMIENTOS'));
            }
        }
}
