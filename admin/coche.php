<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

// requerir archivo de ayuda
//JLoader::register('CocheHelper', dirname(__FILE__) .  '/helpers/coche.php');
if (!JFactory::getUser()->authorise('core.manage', 'com_coche'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// importar librería de controladores de Joomla
//~ jimport('joomla.application.component.controller');

// Obtener una instancia del controlador prefijado por Coche
$task       = JFactory::getApplication()->input->get('task');

$controller = JControllerLegacy::getInstance('coche');
//~ $controller->execute(JRequest::getCmd('task'));

$controller->execute(JFactory::getApplication()->input->getCmd('task'));

$controller->redirect();



