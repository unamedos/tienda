<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_ml extends CI_Model
{
    public function getVentas()
    {
        $this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
        $this->db->from("ventas v");
        $this->db->join("clientes c", "v.cliente_id = c.id");
        $this->db->join("tipo_comprobante tc", "v.tipo_comprobante_id = tc.id");
        $this->db->order_by('v.id', 'DESC');
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
            return $resultados->result();
        } else {
            return false;
        }
    }

    function getDetalle($id)
    {
        $sql = $this->db->select("DATE_FORMAT(ve.fecha, '%d-%m-%Y %H:%m:%s') fecha,
            pr.nombre AS producto, de.precio, de.cantidad, ROUND(de.precio*de.cantidad, 2) AS total", "FALSE")
            ->join('ventas ve', 'de.venta_id = ve.id', 'inner')
            ->join('productos pr', 'de.producto_id = pr.id', 'inner')
            ->where('ve.id', $id)
            ->order_by('pr.nombre', 'ASCs')
            ->get('detalle_venta de');

        return $sql->result_array();
    }

    function getComprobantes()
    {
        $this->db->select('tipo_comprobante.*', FALSE);
        $sql = $this->db->get('tipo_comprobante');



        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }
    function getComprobate($tipo_comprobante_id)
    {
        $this->db->where("id", $tipo_comprobante_id);
        $resultado = $this->db->get("tipo_comprobante");
        return $resultado->row();
    }
    public function getproductos($valor)
    {
        $this->db->select("id,nombre as label,precio_unitario,cantidad");
        $this->db->from("productos");
        $this->db->like("nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    function save($data)
    {
        return $this->db->insert("ventas", $data);
    }
    function lastID()
    {
        return $this->db->insert_id();
    }

    function updateComprobante($tipo_comprobante_id, $datacom)
    {
        $this->db->where("id", $tipo_comprobante_id);
        $this->db->update("tipo_comprobante", $datacom);
    }
    function save_detalle($datadeta)
    {
        $this->db->insert("detalle_venta", $datadeta);
    }
}
