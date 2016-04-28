<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la biblioteca view de Joomla
//~ jimport('joomla.application.component.view');

/**
 * Vista Coches  */
class CocheViewMarcas extends JViewLegacy
{
        protected $items;

		protected $pagination;

		protected $state;

        
        /**
         *M�todoo para mostrar la vista Coches
         * @return void
         */
        public function display($tpl = null) 
        {
                
                //~ if ($_REQUEST['task'] == 'add'):
					//~ echo ' Ahora deber�a cargar el marca y edit';
					//~ 
				//~ endif;
				//~ 
                
                
				$this->items		= $this->get('Items');
				$this->pagination	= $this->get('Pagination');
				$this->state		= $this->get('State');

				/* Cargamos Submenu y con el parametro 'marcas' indicamos que est� seleccionada*/
				
				// Si no existe task entonce podemos carga el submenu
                if (!isset ($_REQUEST['task'])):
				CocheHelper::addSubmenu('marcas');
				endif;
               
                // Obtener los datos desde el modelo
                //~ $items = $this->get('Items');
                //~ $pagination = $this->get('Pagination');

                
                
                // Verificar existencia de errores.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Asignar los datos a la vista
                //~ $this->items = $items;
                //~ $this->pagination = $pagination;

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
				// Funcion que a�ade, titulo pagina y bottones superiores de a�adir, edit y borrar.
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
			    JToolbarHelper::title(JText::_('Marcas de Coches'),'joomla');
                JToolbarHelper::deleteList('', 'marca.delete');
                JToolbarHelper::editList('marca.edit');
                JToolbarHelper::addNew('marca.add');
                
                
        }
}
