<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
class CtrlPrincipal extends Controlador {
    public function index(){
        $menu = array(
            
            'CtrlAlmacenamiento' => 'Almacenamiento',
            'CtrlCliente' => 'Cliente',
            

        );
        $datos = array(
            'encabezado' => 'Sistema Administracion para Ventas de Samsung',
            'menu' => $menu
        );

        $this->mostrarVista('principal.php', $datos);
    }
}
//'CtrlBoleta' => 'Boleta',
//'CtrlCamara' => 'Camara',
//'CtrlDetalle_boleta' => 'Detalle_boleta',
//'CtrlEquipo' => 'Equipo',
//'CtrlModelo' => 'Modelo',
//'CtrlModelo_almacenamiento' => 'Modelo_almacenamiento',
//'CtrlModelo_camara' => 'Modelo_camara',
//'CtrlModelo_color' => 'Modelo_color',
//'CtrlModelo_ram' => 'Modelo_ram',
//'CtrlRam' => 'Ram',
//'CtrlTarjeta_Grafica' => 'Tarjeta_Grafica',
//'CtrlVendedor' => 'Vendedor',
//'CtrlCliente&accion=con1'=>'Consulta 1'
