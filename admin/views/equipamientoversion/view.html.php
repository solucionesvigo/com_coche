<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Equipamientoversion View
 */
class CocheViewEquipamientoversion extends JViewLegacy
{
	/**
	 * display method of Equipamientoversion view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, idVersion, idEquipamiento, idClaseequipamiento');
                $consulta->from('#__coche_equipamientosversion');

                $basedatos->setQuery((string)$consulta);
                $equipamientoVersion = $basedatos->loadObjectList();
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, idClaseequipamiento, nombre');
                $consulta->from('#__coche_equipamientos');

                $basedatos->setQuery((string)$consulta);
                $equipamientos = $basedatos->loadObjectList();
                
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__coche_clasesequipamiento');

                $basedatos->setQuery((string)$consulta);
                $clasesEquipamientos = $basedatos->loadObjectList();
                
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
                
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
                $this->iddeVersion = $_REQUEST['iddeVersion'];
                $this->tablaEquipamientosVersion=$equipamientoVersion;
                $this->tablaEquipamientos=$equipamientos;
                $this->tablaClaseEquipamiento=$clasesEquipamientos;
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('Nuevo equipamientoversion') : JText::_('Editar equipamientoversion'));
		JToolBarHelper::save('equipamientoversion.guardarEquipamientoAnadido');
		JToolBarHelper::cancel('equipamientoversion.cancelarAnadirEquipamiento', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
