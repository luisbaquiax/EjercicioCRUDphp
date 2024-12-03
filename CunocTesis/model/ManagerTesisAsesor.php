<?php
require_once __DIR__ . '/Coneccion.php';

class ManagerTesisAsesor
{

    const INSERT_TESIS_ASESOR = '
    INSERT INTO tesis_asesor (
        id_tesis,
        id_asesor
    ) VALUES (?,?)
';


    private $conn;
    private $coneccion;

    public function __construct()
    {
        $this->coneccion = new Coneccion();
        $this->conn = $this->coneccion->getconexion();
    }

    /**
     * @param TesisAsesor $tesis
     * @return string
     * @throws Exception
     */
    public function insert(TesisAsesor $tesis)
    {
        $stm = $this->conn->prepare(self::INSERT_TESIS_ASESOR);
        if ($stm) {
            $id_tesis = $tesis->idTesis;
            $id_asesor = $tesis->idAsesor;
            $stm->bind_param('ii', $id_tesis, $id_asesor);

            $success = $stm->execute();
            $stm->close();
            if ($success) {
                return 'Datos insertados correctamente.';
            } else {
                throw new Exception('No se pudo guardar los datos.');
            }
        } else {
            throw new Exception('Hubo un error en el servidor ' . $stm->error);
        }
    }
}