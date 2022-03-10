<?php
class Tareas_model extends CI_Model {

   public function __construct()
   {
      $this->load->database();
   }

   public function get_tareas_usuario( $id_usuario )
   {

      $query = $this->db->order_by('id', 'ASC')->get_where('tareas', array('id_usuario' => $id_usuario));
      return $query->result_array();
     
   }

   public function borrar_tarea( $id ) {

      $this->db->where(array('id' => $id));
      $this->db->delete('tareas');

   }

    public function crear_tarea()
    {

        $data = array(
            'fecha' => date('Y-m-d H:i:s'),
            'id_usuario' => $_POST['id_usuario'],
            'categoria' => $_POST['categoria'],
            'titulo' => $_POST['titulo']
        );

        $this->db->insert('tareas', $data);
        return $this->db->insert_id();
      
    }
        
}