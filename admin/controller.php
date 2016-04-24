
<?php
//~ <script type="text/javascript" src="components/com_coche/roe.js"></script>

// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
 
// Importar la biblioteca controller de jomla
//jimport('joomla.application.component.controller');


/**
 * General Controller of Coche component
 */
class CocheController extends JControllerLegacy
{
        protected $default_view = 'marcas';
        /**
         * Mostrar la tarea
         *
         * @return void
         */
        public function display($cachable = false , $urlparams = false) 
        {      
				require_once JPATH_COMPONENT . '/helpers/coche.php';

				$view   = $this->input->get('view', 'marcas');
				$layout = $this->input->get('layout', 'marcas');
				$id     = $this->input->getInt('id');

				if ($view == 'marca' && $layout == 'edit' && !$this->checkEditId('com_coche.edit.marca', $id))
				{
				// Somehow the person just went to the form - we don't allow that.
				$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
				$this->setMessage($this->getError(), 'error');
				$this->setRedirect(JRoute::_('index.php?option=com_coches&view=marcas', false));

				return false;
				}
				
				
				//require_once JPATH_COMPONENT . '/helpers/coche.php';

            
                // configurar vista por defecto si no está configurada
                $input = JFactory::getApplication()->input;
              
                // Ahora si $input->getCmd('view') no tiene resultado, le añade 'Coches'
                // es decir, dejamos por defecto la vista 'Coches'
                
                $input->set('view', $input->getCmd('view', 'marcas'));
					
				               	
                // llamar comportamiento padre
                return parent::display();
                //~ 
                //~ // Configurar el submenú
                //~ 
                //~ CocheHelperCoche::addSubmenu('marcas');
                //~ return $this;
                
        }
        
}
