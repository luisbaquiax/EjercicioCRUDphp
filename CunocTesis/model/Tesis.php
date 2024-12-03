<?php
class Tesis{
    public $id;
    public $titulo;
    public $idEstudiante;
    public $estado;

    /**
     * @param $id
     * @param $titulo
     * @param $idEstudiante
     * @param $estado
     */
    public function __construct($id, $titulo, $idEstudiante, $estado)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->idEstudiante = $idEstudiante;
        $this->estado = $estado;
    }


}