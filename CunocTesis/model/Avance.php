<?php
class Avance {
   public $id;
   public $date;
   public $description;
   public $idTesis;
   public $estado;

    /**
     * @param $id
     * @param $date
     * @param $description
     * @param $idTesis
     * @param $estado
     */
    public function __construct($id, $date, $description, $idTesis, $estado)
    {
        $this->id = $id;
        $this->date = $date;
        $this->description = $description;
        $this->idTesis = $idTesis;
        $this->estado = $estado;
    }
}