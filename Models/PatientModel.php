<?php
class PatientModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=tpe_metodologias;charset=utf8', 'root', '');
    }
    function buscarPaciente($dni)
    {
        $query = $this->db->prepare('SELECT * FROM paciente WHERE dni = ?');
        $query->execute([$dni]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    function agregarPaciente($nombre, $dni, $direccion, $telefono, $mail, $obraSocial, $contrasena)
    {
        $sentencia = $this->db->prepare("INSERT INTO paciente(nombre, dni, direccion, telefono, mail, obra_social, contrasena) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($nombre, $dni, $direccion, $telefono, $mail, $obraSocial, $contrasena));
    }
    function buscarOS($obraSocial)
    {
        $query = $this->db->prepare("SELECT id_os FROM obra_social WHERE descripcion LIKE ?");
        $query->execute(array($obraSocial));
        $os = $query->fetch(PDO::FETCH_OBJ);
        return $os;
    }
}
