<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librería de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 *Controlador Equipamientoversions
 */
class CocheControllerEquipamientoversions extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Equipamientoversion', $prefix = 'CocheModel') 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
        
        public function borrar()
	{
                $idVersion=$_POST['iddeVersion'];
		// Check for request forgeries
		JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

		// Get items to remove from the request.
		$cid = JRequest::getVar('cid', array(), '', 'array');

		if (!is_array($cid) || count($cid) < 1)
		{
			JError::raiseWarning(500, JText::_($this->text_prefix . '_NO_ITEM_SELECTED'));
		}
		else
		{
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			jimport('joomla.utilities.arrayhelper');
			JArrayHelper::toInteger($cid);

			// Remove the items.
			if ($model->delete($cid))
			{
				$this->setMessage(JText::plural($this->text_prefix . '_N_ITEMS_DELETED', count($cid)));
			}
			else
			{
				$this->setMessage($model->getError());
			}
		}

		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list.'&iddeVersion='.$idVersion, false));
	}
}