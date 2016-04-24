<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la librería table de Joomla
jimport('joomla.database.table');

/**
 * Clase Version Table
 */
class CocheTableVersion extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('#__coche_versiones', 'id', $db);
        }
}