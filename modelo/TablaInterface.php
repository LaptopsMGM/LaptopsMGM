<?php
interface TablaInterface {
    public function nuevo();
    public function editar();
    public function eliminar();
    public function leer($todo=true);
}