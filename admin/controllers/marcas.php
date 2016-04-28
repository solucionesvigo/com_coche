<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
 
// Entra en este controlador si los indicamos en view marcas, sino entra.
/**
 *Controlador PruebaSimons
 */
class CocheControllerMarcas extends JControllerAdmin
{
        
        
        
        /**
         * Proxy para getModel.
         * @desde       2.5
         */

         
        public function getModel($name = 'marca', $prefix = 'CocheModel') 
        {
        
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }

		public function addNew()
		{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->coche($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_coche&view=marcas', false));
 
		}


