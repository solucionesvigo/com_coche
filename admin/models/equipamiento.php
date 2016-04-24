<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librería modelform de Joomla
jimport('joomla.application.component.modeladmin');
 
/**
 *Modelo Equipamiento
 */
class CocheModelEquipamiento extends JModelAdmin
{
        /**
         * Devuelve una referencia al objeto Table, siempre creándolo.
         *
         * @param       type    Tipo de tabla a instanciar
         * @param       string  Prefijo para el nombre de clase de tabla. Opcional.
         * @param       array  Array de configuraci�n para el modelo. Opcional.
         * @return      JTable  Objeto de base de datos
         * @since       2.5
         */
        public function getTable($type = 'Equipamiento', $prefix = 'CocheTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
        /**
         * Método para conseguir el formulario.
         *
         * @param      array   $data           Datos para el formulario.
         * @param      boolean $loadData   Verdadero si el formulario va a cargar sus propios datos (por defecto), falso si no.
         * @return      mixed                      Un objeto JForm object si funciona, false si falla
         * @since       2.5
         */
        public function getForm($data = array(), $loadData = true) 
        {
                // Get the form.
                $form = $this->loadForm('com_coche.equipamiento', 'equipamiento',
                                        array('control' => 'jform', 'load_data' => $loadData));
                if (empty($form)) 
                {
                        return false;
                }
                return $form;
        }
        /**
         * Método para obtener datos que deberían ser inyectados al formulario.
         *
         * @return      mixed   Datos para el formulario.
         * @since       2.5
         */
        protected function loadFormData() 
        {
                // Comprueba la sesión para comprobar datos introducidos previamente.
                $data = JFactory::getApplication()->getUserState('com_coche.edit.equipamiento.data', array());
                if (empty($data)) 
                {
                        $data = $this->getItem();
                }
                return $data;
        }
}