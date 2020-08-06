<?php
    class Category_ml extends CI_Model{

        function __construct()
        {
            parent::__construct();
        }

        function add($data = array())
        {
            $this->db->insert('categorias', $data);
            return $this->db->insert_id();
        }

        function searchCategory($category) 
        {
            $this->db->select('categorias.*', FALSE);
            
            $this->db->where('categorias.nombre', $category);

            $sql = $this->db->get('categorias');

            if ($sql->num_rows() > 0)
            {
                return $sql->row();

            }else{

                return null;
            }  
        }

        function listado() 
        {
            $this->db->select('categorias.*', FALSE);

            $this->db->order_by('categorias.nombre', 'ASC');

            $sql = $this->db->get('categorias');

            if($sql->num_rows()>0)
            {
                foreach($sql->result() as $fila)
                {
                    $data[] = $fila;
                }
                    return $data;
            }
        }

        function get($id) 
        {
            $this->db->select('categorias.*', FALSE);

            $this->db->where('id', $id);

            $sql = $this->db->get('categorias');

            if ($sql->num_rows() > 0)
            {
                return $sql->row();

            }else{

                return null;
            }  
        }

        function update($data = array())
        {
            $this->db->where('id',$data['id']);
            return $this->db->update('categorias', $data);
        }

        function delete($id) 
        {
            $this->db->where('id', $id);
            $query = $this->db->delete('categorias');

            if($query === true) 
            {
                return true; 

            }else{
                return false;
            }
        }
    }