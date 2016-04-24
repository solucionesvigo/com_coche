<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librería de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 *Controlador Versions
 */
class CocheControllerVersions extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Version', $prefix = 'CocheModel') 
        {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
        }
        
        public function redirecciona()
        {
            $iddeVersion=JRequest::getVar('cid', array(), '', 'array');
            header('Location: index.php?option=com_coche&view=equipamientoversions&extension=com_coche&iddeVersion='.$iddeVersion[0]);
        }
}