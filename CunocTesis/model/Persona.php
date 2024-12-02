<?php
class Persona
{
    public  $id;
    public  $dpi;
    public $carne;
    public  $nombre1;
    public  $nombre2;
    public  $apellido1;
    public  $apellido2;
    public  $correo;
    public  $telefono;
    public  $password;
    public  $estado;

    /**
     * @param $id
     * @param $dpi
     * @param $nombre1
     * @param $nombre2
     * @param $apellido1
     * @param $apellido2
     * @param $correo
     * @param $telefono
     * @param $password
     * @param $estado
     */
    public function __construct($id, $dpi, $carne, $nombre1, $nombre2, $apellido1, $apellido2, $correo, $telefono, $password, $estado)
    {
        $this->id = $id;
        $this->dpi = $dpi;
        $this->carne = $carne;
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->password = $password;
        $this->estado = $estado;
    }

}