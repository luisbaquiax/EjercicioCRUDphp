<?php
require_once __DIR__ . '/Coneccion.php';
require_once __DIR__ . '/Avance.php';
class ManagerAvance
{
    const INSERT = '
    INSERT INTO avance (
        fecha,
        descripcion,
        id_tesis,
        estado
    ) VALUES (?,?,?,?)
    ';

    const SELECT = 'SELECT * FROM avance';
    const SEARCH_BY_TESIS = 'SELECT * FROM avance WHERE id_tesis = ?';
    private $conn;
    private $coneccion;

    public function __construct()
    {
        $this->coneccion = new Coneccion();
        $this->conn = $this->coneccion->getconexion();
    }

    public function insert(Avance $avance)
    {
        $stm = $this->conn->prepare(self::INSERT);
        if ($stm) {
            $fecha = $avance->date;
            $descripcion = $avance->description;
            $id_tesis = $avance->idTesis;
            $estado = $avance->estado;

            $stm->bind_param('ssii', $fecha, $descripcion, $id_tesis, $estado);

            $success = $stm->execute();
            $stm->close();

            if ($success) {
                return 'El avance se ha guardado correctamente.';
            } else {
                throw new Exception('No se pudo guardar el avance.');
            }
        } else {
            throw new Exception('Hubo un error en el servidor: ' . $this->conn->error);
        }
    }

    public function listAvances()
    {
        $list = [];
        try {
            $stmt = $this->conn->prepare(self::SELECT);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $avance = new Avance(
                    $row['id'],
                    $row['fecha'],
                    $row['descripcion'],
                    $row['id_tesis'],
                    $row['estado']
                );
                $list[] = $avance;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
        return $list;
    }

    public function searchByTesis($id_tesis)
    {
        $stmt = $this->conn->prepare(self::SEARCH_BY_TESIS);
        if ($stmt) {
            $stmt->bind_param("i", $id_tesis);
            $stmt->execute();
            $result = $stmt->get_result();
            $list = [];

            while ($row = $result->fetch_assoc()) {
                $avance = new Avance(
                    $row['id'],
                    $row['fecha'],
                    $row['descripcion'],
                    $row['id_tesis'],
                    $row['estado']
                );
                $list[] = $avance;
            }
            return $list;
        } else {
            throw new Exception('Hubo un error en el servidor.');
        }
    }
}
