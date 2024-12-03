<?php
require_once __DIR__ . '/Coneccion.php';

class ManagerStudent
{
    const INSERT = '
    INSERT INTO estudiante (
                carne,
                dpi, 
                nombre1,
                nombre2, 
                apellido1, 
                apellido2, 
                correo, 
                telefono, 
                password, 
                estado
            ) VALUES (?,?,?,?,?,?,?,?,?,?)
    ';

    const UPDATE = '
    ';
    const DELETE = '';
    const SEARCH = 'SELECT * FROM estudiante WHERE correo = ? AND password = ?';
    const SEARCH_BY_EMAIL = 'SELECT * FROM estudiante WHERE correo = ?';
    const SELECT = 'SELECT * FROM estudiante';
    private $conn;
    private $coneccion;

    public function __construct()
    {
        $this->coneccion = new Coneccion();
        $this->conn = $this->coneccion->getconexion();
    }

    public function insert(Persona $persona)
    {
        $stm = $this->conn->prepare(self::INSERT);
        if ($stm) {
            $carne = $persona->carne;
            $nombre1 = $persona->nombre1;
            $nombre2 = $persona->nombre2;
            $apellido1 = $persona->apellido1;
            $apellido2 = $persona->apellido2;
            $telefono = $persona->telefono;
            $correo = $persona->correo;
            $password = password_hash($persona->password, PASSWORD_DEFAULT);
            $estado = $persona->estado;
            $stm->bind_param('ssssssssi',
                $carne, $nombre1, $nombre2, $apellido1, $apellido2, $telefono, $correo, $password, $estado);

            $success = $stm->execute();
            $stm->close();
            if ($success) {
                return 'Se ha guardado los datos del estudiante correctamente.';
            } else {
                throw new Exception('No se pudo guardar los datos del estudiante');
            }
        } else {
            throw new Exception('Hubo un error en el servidor ' . $stm->error);
        }
    }

    /**
     * @param $correo
     * @param $password
     */
    public function search($correo, $password)
    {
        $stmt = $this->conn->prepare(self::SEARCH);
        if ($stmt) {
            $stmt->bind_param("ss", $correo, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                return new Persona(
                    $row['id'],
                    $row['dpi'],
                    $row['carne'],
                    $row['nombre1'],
                    $row['nombre2'],
                    $row['apellido1'],
                    $row['apellido2'],
                    $row['telefono'],
                    $row['correo'],
                    $row['password'],
                    $row['estado']
                );
            } else {
                return null;
            }
        } else {
            throw new Exception('Hubo un error en el servidor');
        }
    }

    /**
     * @param $correo
     * @throws Exception
     */
    public function searchByCorreo($correo)
    {
        $stmt = $this->conn->prepare(self::SEARCH_BY_EMAIL);
        if ($stmt) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                return new Persona(
                    $row['id'],
                    $row['dpi'],
                    $row['carne'],
                    $row['nombre1'],
                    $row['nombre2'],
                    $row['apellido1'],
                    $row['apellido2'],
                    $row['telefono'],
                    $row['correo'],
                    $row['password'],
                    $row['estado']
                );
            } else {
                return null;
            }
        } else {
            throw new Exception('Hubo un error en el servidor');
        }
    }

    /**
     * @throws Exception
     */
    public function listStudent()
    {
        $list = array();
        try {
            $stmt = $this->conn->prepare(self::SELECT);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $estudiante = new Persona(
                        $row['id'],
                        $row['dpi'],
                        $row['carne'],
                        $row['nombre1'],
                        $row['nombre2'],
                        $row['apellido1'],
                        $row['apellido2'],
                        $row['telefono'],
                        $row['correo'],
                        $row['password'],
                        $row['estado']
                    );
                    $list[] = $estudiante;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            throw new Exception($e->getMessage());
        }
        return $list;
    }
}