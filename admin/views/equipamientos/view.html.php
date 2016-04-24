<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Equipamientos  */
class CocheViewEquipamientos extends JViewLegacy
{
        /**
         *Métodoo para mostrar la vista Equipamientos 
         * @return void
         */
        function display($tpl = null) 
        {
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id,nombre');
                $consulta->from('#__coche_clasesequipamiento');

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
                $this->todasClasesequipamiento =$resultado;
                $this->pagination = $pagination;

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
                JToolBarHelper::title(JText::_('Coches'));
                JToolBarHelper::deleteList('', 'equipamientos.delete');
                JToolBarHelper::editList('equipamiento.edit');
                JToolBarHelper::addNew('equipamiento.add');
        }
}
