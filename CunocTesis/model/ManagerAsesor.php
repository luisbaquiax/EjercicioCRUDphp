<?php
require_once __DIR__ . '/Coneccion.php';
class ManagerAsesor{
    const SELECT = 'SELECT * FROM asesor';
    private $conn;
    private $coneccion;

    public function __construct()
    {
        $this->coneccion = new Coneccion();
        $this->conn = $this->coneccion->getconexion();
    }
    public function asesores()
    {
        $list = array();
        try {
            $stmt = $this->conn->prepare(self::SELECT);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user = new Persona(
                        $row['id'],
                        $row['dpi'],
                        '',
                        $row['nombre1'],
                        $row['nombre2'],
                        $row['apellido1'],
                        $row['apellido2'],
                        $row['telefono'],
                        $row['correo'],
                        $row['password'],
                        $row['estado']
                    );
                    $list[] = $user;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
        return $list;
    }
}