<?php
class Product_ml extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function add($data = array())
    {
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }

    function searchProductGet($fk_category, $nombre)
    {
        $this->db->select('productos.*', FALSE);

        $this->db->where('productos.fk_categoria', $fk_category);
        $this->db->where('productos.nombre', $nombre);

        $sql = $this->db->get('productos');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {

            return null;
        }
    }

    function listado()
    {
        $this->db->select('ca.nombre AS categoria, pr.id, pr.nombre, pr.precio_unitario, pr.cantidad, ROUND(pr.precio_unitario * pr.cantidad, 2) total', FALSE);

        $this->db->join('categorias ca', 'pr.fk_categoria = ca.id', 'left');

        $this->db->order_by('pr.nombre', 'ASC');

        $sql = $this->db->get('productos pr');

        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }


    function listadoProduct($category)
    {
        $this->db->select('productos.*', FALSE);
        $this->db->where('fk_categoria', $category);
        $sql = $this->db->get('productos');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function listadoCategoryProduct($category_id)
    {
        #SELECT * FROM productos WHERE fk_categoria = '".$category_id."'
        $this->db->select('productos.*', FALSE);
        $this->db->where('fk_categoria', $category_id);
        $sql = $this->db->get('productos');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }
    function get($id)
    {
        $this->db->select('ca.nombre AS categoria, pr.id, pr.fk_categoria , pr.nombre, pr.precio_unitario, pr.cantidad, ROUND(pr.precio_unitario * pr.cantidad, 2) total', FALSE);

        $this->db->join('categorias ca', 'pr.fk_categoria = ca.id', 'left');

        $this->db->where('pr.id', $id);

        $sql = $this->db->get('productos pr');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {

            return null;
        }
    }

    function update($data = array())
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('productos', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('productos');

        if ($query === true) {
            return true;
        } else {
            return false;
        }
    }
}
