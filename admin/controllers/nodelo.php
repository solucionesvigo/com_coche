<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// Importar librer�a de controladores de formulario de Joomla
jimport('joomla.application.component.controllerform');
 
/**
 *Controlador Nodelo
 */
class CocheControllerNodelo extends JControllerForm
{
	public function addNew()
		{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->nodelo($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_coche&view=nodelos', false));
 
		}




}
