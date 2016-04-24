<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Nodelos  */
class CocheViewNodelos extends JViewLegacy
{
        /**
         *M�todoo para mostrar la vista Nodelos 
         * @return void
         */
        function display($tpl = null) 
        {
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id,nombre,imagen');
                $consulta->from('#__coche_marcas');

                $basedatos->setQuery((string)$consulta);
                $resultado = $basedatos->loadObjectList();
                
                // Obtener los datos desde el modelo
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');

                // Verificar existencia de errores.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Asignar los datos a la vista
                $this->items = $items;
                $this->todasMarcas =$resultado;
                $this->pagination = $pagination;
				/* Cargamos Submenu y con el parametro 'nodelos' indicamos que est� seleccionada*/
				CocheHelper::addSubmenu('nodelos');

                // Establecer la barra de herramientas
                $this->addToolBar();
                
                // Mostrar la plantilla
                parent::display($tpl);
        }
        
        /**
         * Configurar la barra de herramientas
         */
        protected function addToolBar() 
        {
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
                JToolBarHelper::title(JText::_('Modelos de Marcas de Coches'),'bookmark banners');
                JToolBarHelper::deleteList('', 'nodelos.delete');
                JToolBarHelper::editList('nodelo.edit');
                JToolBarHelper::addNew('nodelo.add');
        }
}
