<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>public/plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery-ui2 
<script src="public/plugins/jquery-ui2/jquery-ui.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- aqui el jquery para imprimir!-->
<script src="<?php echo base_url(); ?>public/plugins/jquery-print/jquery_print.js"> </script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>public/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Toastr JS -->
<script src="<?php echo base_url(); ?>public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>public/plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>public/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>public/js/demo.js"></script>
<script>
    $(document).ready(function() {
        $('.sidebar-menu').tree();
        //$('#example1').DataTable()
        $('#example1').DataTable({
            "order": [
                [0, "desc"]
            ]
        });

    });
</script>
<script>
    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";
        $("#comprobantes").on("change", function() {
            option = $(this).val();
            if (option != "") {
                infocomprobante = option.split("*");

                $('#idcomprobante').val(infocomprobante[0]);
                $('#iva').val(infocomprobante[2]);
                $('#serie').val(infocomprobante[3]);
                $('#numero').val(generarnumero(infocomprobante[1]));
            } else {
                alert("Campos obligatorios");
            }
        });
        $(document).on("click", ".btn-check", function() {
            cliente = $(this).val();
            infocliente = cliente.split("_");
            nombres = infocliente[1] + " " + infocliente[2];
            $("#idCliente").val(infocliente[0]);
            $("#Cliente").val(nombres);
            $("#modal-clientes").modal("hide");
        });
        $('input#producto').autocomplete({
            source: function(request, response) {
                var url = "<?php echo base_url(); ?>ventas/getproductos";
                data = $.post(url, {
                        'valor': request.term
                    },
                    response, 'json');
                console.log(data);
            },
            minLength: 2,
            select: function(event, ui) {
                data =
                    ui.item.id + "_" + ui.item.label + "_" + ui.item.precio_unitario + "_" + ui.item.cantidad;
                $("#btn-agregar").val(data);
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("btn-agregar").click();
                }

            },
        });
        $("#btn-agregar").on("click", function() {
            data = $(this).val();
            if (data != '') {

                infoproducto = data.split("_");
                html = "<tr>";
                html += "<td><input type ='hidden' name='idproductos[]' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
                html += "<td><input type='hidden' name= 'precios[]' value='" + infoproducto[2] + "'>" + infoproducto[2] + "</td>";
                html += "<td>" + infoproducto[3] + "</td>";
                html += "<td><input type='text' name='cantidades[]' onkeypress='return soloNumeros(event)' value='1' class='cantidades'></td>";
                html += "<td> <input type='hidden' name='total[]' value='" + infoproducto[2] + "' ><p>" + infoproducto[2] + "</p></td>";
                html += "<td> <button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span> </button> </td> ";
                html += "</tr>";
                $("#tbventas tbody ").append(html);
                sumar();
            } else {
                alert("seleccione un producto...");
            }
        });

        $(document).on("click", ".btn-remove-producto", function() {
            $(this).closest("tr").remove();
            sumar();
        });
        /*creo la suma para el total */
        $(document).on("keyup", "#tbventas input.cantidades", function() {
            cantidad = $(this).val();
            stock = Number($(this).closest("tr").find("td:eq(2)").text());
            precio = Number($(this).closest("tr").find("td:eq(1)").text());
            if (cantidad != '') {
                if (cantidad == 0) {
                    alert("El valor ingresado no puede ser menor nulo");
                    $(this).val('1');
                    total = precio;
                } else if (cantidad > stock) {
                    alert("El valor ingresado no puede ser mayor al stock");
                    $(this).val(stock);
                    total = precio * stock;
                } else {
                    total = Number(cantidad) * precio;
                }
            } else {
                total = 0;
            }
            $(this).closest("tr").find("td:eq(4)").children("p").text(total);
            $(this).closest("tr").find("td:eq(4)").children("input").val(total);
            sumar();
        });

        function generarnumero(numero) {
            if (numero >= 99999 && numero < 999999) {
                return Number(numero) + 1;
            }
            if (numero >= 9999 && numero < 99999) {
                return "0" + (Number(numero) + 1);
            }
            if (numero >= 999 && numero < 9999) {
                return "00" + (Number(numero) + 1);
            }
            if (numero >= 99 && numero < 999) {
                return "000" + (Number(numero) + 1);
            }
            if (numero >= 9 && numero < 99) {
                return "0000" + (Number(numero) + 1);
            }
            if (numero < 9) {
                return "00000" + (Number(numero) + 1);
            }
        }
    });

    function sumar() {
        subtotal = 0;

        $("#tbventas tbody tr").each(function() {
            subtotal = subtotal + Number($(this).find("td:eq(4)").text());
        });
        $("input[name=subtotal]").val(subtotal);
        porcentaje = $('#iva').val();
        iva = subtotal * (porcentaje / 100);
        $("input[name=iva2]").val(iva);
        total = subtotal + iva;
        $("input[name=total]").val(total);
    }
    /*valido el input de cantidad */
    function soloNumeros(e) {
        var key = window.event ? e.which : e.keyCode;
        if (key < 48 || key > 57) {
            e.preventDefault();
        }
    }

    /*function ver_detalle(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>ventas/getDetalle',
            data: "id=" + id,
            success: function(data) {

                jQuery("#data-venta").html(data);
                $('#modal-default-prueba').modal('show');
            }
        });
    }*/

    $(document).on("click", ".btn-view-venta", function() {
        var base_url = "<?php echo base_url(); ?>";
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "ventas/view",
            type: "POST",
            dataType: "html",
            data: {
                id: valor_id
            },
            success: function(data) {
                $("#modal-default .modal-body").html(data);
            }
        });

    });
    $(document).on("click", ".btn-print", function() {
        $("#modal-default .modal-body").print({
            title: "Comprobante de Venta"
        });
    });
</script>