<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librer�a de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 *Controlador Nodelos
 */
class CocheControllerNodelos extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Nodelo', $prefix = 'CocheModel') 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
}