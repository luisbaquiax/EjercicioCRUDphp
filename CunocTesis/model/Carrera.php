<?php
class Carrera{
    public $id;
    public $nombre;
    public $estado;

    /**
     * @param $id
     * @param $nombre
     * @param $estado
     */
    public function __construct($id, $nombre, $estado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estado = $estado;
    }


}
