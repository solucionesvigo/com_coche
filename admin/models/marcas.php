<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');
/**
 * CocheList Model
 */
class CocheModelMarcas extends JModelList
{
        
        public function __construct($config = array())
		{

			if ($_REQUEST['task'] == 'add'):
				echo ' Debo enviarlos a funcion añadir, edit, .... ';
				$this->task();
			endif;
			 
			
			
			echo '<pre>';
			echo ' Entro model/marcas.php en funcion construct()<br/>';
			echo ' Debo comprobar de donde vengo para saber si tengo que ir marcar o no... ';
			echo '</pre>';
               
			parent::__construct($config);

		}
        
        
        /**
         * M�todo para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                echo '<pre>';
				echo ' Entro model/marcas.php en funcion getLisQuery()';
				echo '</pre>';
                
                // Cree un objeto de consulta nueva.           
                $db = JFactory::getDBO();
                $query = $db->getQuery(true);
                // Seleccione algunos campos
                $query->select('id,nombre,imagen');
                $query->from('#__coche_marcas');
                return $query;
        }
        protected function task()
		{
				echo ' grabando';
        }
        
        
        
}
