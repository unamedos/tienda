<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //se comunica con el modelo
        $this->load->model("venta_ml");
        $this->load->model("client_ml");
        $this->load->model("product_ml");
    }
    function index()
    {

        $this->load->view('template/header_view');
        $this->load->view('template/aside_view');

        $this->load->view('ventas/index_view');
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }


    function create()
    {
        $data = array(
            "tipocomprobantes" => $this->venta_ml->getComprobantes(),
            "listado" => $this->client_ml->listado()

        );
        $this->load->view('template/header_view');
        $this->load->view('ventas/create_view', $data);
        $this->load->view('template/footer_view');
        $this->load->view('lib/lib_js');
    }

    function show()
    {
        $datashow = array(
            'ventas' => $this->venta_ml->getVentas(),
        );
        $this->load->view('template/header_view');
        $this->load->view('ventas/show_view', $datashow);
        $this->load->view('lib/lib_js');
    }

    public function getproductos()
    {
        $valor = $this->input->post("valor");
        $clientes = $this->venta_ml->getproductos($valor);
        echo json_encode($clientes);
    }
    function store()
    {

        $subtotal            = $this->input->post('subtotal');
        $iva                 = $this->input->post('iva2');
        $total               = $this->input->post('total');
        $tipo_comprobante_id = $this->input->post('idcomprobante');
        $cliente_id          = $this->input->post('idCliente');
        $num_control         = $this->input->post('numero');
        $serie               = $this->input->post('serie');

        $idproductos = $this->input->post("idproductos");
        $precios     = $this->input->post("precios");
        $cantidades  = $this->input->post("cantidades");
        $total       = $this->input->post("total");


        $data  = array(

            'fecha'               => date('Y-m-d H:m:s'),
            'subtotal'            => $subtotal,
            'iva'                 => $iva,
            'total'               => $total,
            'tipo_comprobante_id' => $tipo_comprobante_id,
            'cliente_id'          => $cliente_id,
            'num_control'         => $num_control,
            'serie'               => $serie


        );

        if ($this->venta_ml->save($data)) {
            $idventa = $this->venta_ml->lastID();
            $this->updateComprobante($tipo_comprobante_id);
            $this->save_detalle($idproductos, $idventa, $precios, $cantidades, $total);
            redirect(base_url() . "ventas/show");
        } else {
            redirect(base_url() . "ventas/create");
        }
    }
    protected function updateComprobante($tipo_comprobante_id)
    {
        $comprobanteActual = $this->venta_ml->getComprobate($tipo_comprobante_id);
        $datacom = array(
            'cantidad' => $comprobanteActual->cantidad + 1,
        );
        $this->venta_ml->updateComprobante($tipo_comprobante_id, $datacom);
    }
    protected function save_detalle($productos, $idventa, $precios, $cantidades, $total)
    {

        for ($i = 0; $i < count($productos); $i++) {
            $datadeta = array(

                'producto_id'  =>  $productos[$i],
                'venta_id'     =>  $idventa,
                'precio'       =>  $precios[$i],
                'cantidad'     =>  $cantidades[$i],
                'total'        =>  $total[$i],
            );
            $this->venta_ml->save_detalle($datadeta);
            $this->updateProducto($productos[$i], $cantidades[$i]);
        }
    }
    protected function updateProducto($idproducto, $cantidad)
    {

        $productoActual = $this->product_ml->getProducto($idproducto);

        $datapro = array(
            'cantidad' => $productoActual->cantidad - $cantidad,

        );
        $this->product_ml->update2($idproducto, $datapro);
    }

    function getDetalle()
    {
        $id = $this->input->post('id');

        $data = $this->venta_ml->getDetalle($id);

        if (count($data)) {
?>
            
<?php

        } else {
            echo json_encode("Sin registros");
        }

        //echo json_encode($data);
    }
}
