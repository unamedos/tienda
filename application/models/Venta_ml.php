<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_ml extends CI_Model
{
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
}
