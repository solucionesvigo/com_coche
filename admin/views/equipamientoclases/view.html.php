<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Equipamientoclases  */
class CocheViewEquipamientoclases extends JViewLegacy
{
        /**
         *Métodoo para mostrar la vista Equipamientoclases 
         * @return void
         */
        function display($tpl = null) 
        {
                
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
                JToolBarHelper::deleteList('', 'equipamientoclases.delete');
                JToolBarHelper::editList('equipamientoclase.edit');
                JToolBarHelper::addNew('equipamientoclase.add');
        }
}
