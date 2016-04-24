<?php 
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Equipamientoversions  */
class CocheViewEquipamientoversions extends JViewLegacy
{
        /**
         *Métodoo para mostrar la vista Equipamientoversions
         * @return void
         */
        function display($tpl = null) 
        {
                
                // Obtener los datos desde el modelo
                $items = $this->get('Items');
                $pagination = $this->get('Pagination');

                // Verificar existencia de errores.
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                $this->iddeVersion = $_REQUEST['iddeVersion'];
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, idMarca, idModelo, nombre');
                $consulta->from('#__coche_versiones');
                $consulta->where("id=$this->iddeVersion");
                $basedatos->setQuery((string)$consulta);
                $version = $basedatos->loadObjectList();
                $version=$version[0];
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__coche_marcas');
                $consulta->where("id=$version->idMarca");
                $basedatos->setQuery((string)$consulta);
                $marca = $basedatos->loadObjectList();
                $marca=$marca[0];
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__coche_modelos');
                $consulta->where("id=$version->idModelo");
                $basedatos->setQuery((string)$consulta);
                $modelo = $basedatos->loadObjectList();
                $modelo=$modelo[0];                
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__coche_clasesequipamiento');
                $basedatos->setQuery((string)$consulta);
                $claseEquipamientos = $basedatos->loadObjectList();
                
                $basedatos = JFactory::getDBO();
                $consulta = $basedatos->getQuery(true);
                $consulta->select('id, nombre');
                $consulta->from('#__coche_equipamientos');
                $basedatos->setQuery((string)$consulta);
                $equipamientos = $basedatos->loadObjectList();
                
                
                // Asignar los datos a la vista
                $this->items = $items;
                $this->iddeVersion = $_REQUEST['iddeVersion'];
                $this->version = $version->nombre;
                $this->marca = $marca->nombre;
                $this->modelo = $modelo->nombre;
                $this->equipamientos=$equipamientos;
                $this->claseEquipamientos=$claseEquipamientos;
                
                $this->pagination = $pagination;

                // Establecer la barra de herramientas
                $this->addToolBar();
                
                // Mostrar la plantilla
                parent::display($tpl);
        }
        
        /**
         * Configurar la barra de herramientas
         */
        protected function addToolBar() 
        {
                JToolBarHelper::title(JText::_('Coches'));
                JToolBarHelper::deleteList('', 'equipamientoversions.borrar');
                //JToolBarHelper::editList('equipamientoversion.edit');
                JToolBarHelper::addNew('equipamientoversion.add');
        }
}
