<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la librería table de Joomla
//~ jimport('joomla.database.table');

/**
 * Clase Coche Table
 */
class CocheTableMarca extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('#__coche_marcas', 'id', $db);
        }
}
