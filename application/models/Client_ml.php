<?php
class Client_ml extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function add($data = array())
    {
        $this->db->insert('clientes', $data);
        return $this->db->insert_id();
    }

    function searchClientGet($cedula)
    {
        $this->db->select('clientes.*', FALSE);

        $this->db->where('clientes.cedula', $cedula);


        $sql = $this->db->get('clientes');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {

            return null;
        }
    }

    function listado()
    {
        $this->db->select('id,nombre,apellido,cedula,direccion,telefono,correo, DATE_FORMAT(fecha_registro, "%d-%m-%Y %H:%m:%s") fecha_registro ', FALSE);
        $this->db->order_by('nombre', 'ASC');
        $sql = $this->db->get('clientes');

        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }



    function listadoClient($nombre)
    {
        $this->db->select('clientes.*', FALSE);
        $this->db->where('nombre', $nombre);
        $sql = $this->db->get('clientes');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    #cohn esta funcion me traigo todos los campos de un registro.. .. 

    function get($id)
    {
        $this->db->select('clientes.*', FALSE);

        $this->db->where('id', $id);

        $sql = $this->db->get('clientes');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {

            return null;
        }
    }

    function update($data = array())
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('clientes', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('clientes');

        if ($query === true) {
            return true;
        } else {
            return false;
        }
    }
}
