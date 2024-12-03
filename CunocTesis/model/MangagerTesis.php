<?php
require_once __DIR__ . '/Coneccion.php';

class MangagerTesis
{

    const INSERT_TESIS = '
    INSERT INTO tesis (
        titulo,
        id_estudiante,
        estado
        ) VALUES (?,?,?)
    ';
    const SELECT_TESIS = 'SELECT * FROM tesis ORDER BY id ASC;';

    private $conn;
    private $coneccion;

    public function __construct()
    {
        $this->coneccion = new Coneccion();
        $this->conn = $this->coneccion->getconexion();
    }

    public function insert(Tesis $tesis)
    {
        $stm = $this->conn->prepare(self::INSERT_TESIS);
        if ($stm) {
            $titulo = $tesis->titulo;
            $id_estudiante = $tesis->idEstudiante;
            $estado = $tesis->estado;
            $stm->bind_param('sii', $titulo, $id_estudiante, $estado);

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

    public function listTesis()
    {
        $list = array();
        try {
            $stmt = $this->conn->prepare(self::SELECT_TESIS);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tesis = new Tesis(
                        $row['id'],
                        $row['titulo'],
                        $row['id_estudiante'],
                        $row['estado']
                    );
                    $list[] = $tesis;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
        return $list;
    }

}