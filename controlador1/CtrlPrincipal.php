<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
class CtrlPrincipal extends Controlador {
    public function index(){
        $menu = array(
            'CtrlBoleta' => 'Boleta',
            'CtrlCamara' => 'Camara',
            'CtrlCliente' => 'Cliente',
            'CtrlColor' => 'Color',
            'CtrlDetalle_boleta' => 'Detalle_boleta',
            'CtrlEquipo' => 'Equipo',
            'CtrlModelo' => 'Modelo',
            'CtrlModelo_almacenamiento' => 'Modelo_almacenamiento',
            'CtrlModelo_camara' => 'Modelo_camara',
            'CtrlModelo_color' => 'Modelo_color',
            'CtrlModelo_ram' => 'Modelo_ram',
            'CtrlRam' => 'Ram',
            'CtrlTamaño' => 'Tamaño',
            'CtrlVendedor' => 'Vendedor',
            'CtrlAlmacenamiento' => 'Almacenamiento',
            'CtrlCliente&accion=con1'=>'Consulta 1'

        );
        $datos = array(
            'encabezado' => 'Sistema Administracion para Ventas de Samsung',
            'menu' => $menu
        );

        $this->mostrarVista('principal.php', $datos);
    }
}