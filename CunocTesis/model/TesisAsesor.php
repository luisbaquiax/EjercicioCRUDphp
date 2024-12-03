<?php
class TesisAsesor{
    public $id;
    public $idTesis;
    public $idAsesor;
    public $estado;

    /**
     * @param $id
     * @param $idTesis
     * @param $idAsesor
     */
    public function __construct($id, $idTesis, $idAsesor, $estado)
    {
        $this->id = $id;
        $this->idTesis = $idTesis;
        $this->idAsesor = $idAsesor;
        $this->estado = $estado;
    }


}