<?php

class Connection {
    private $host;
    private $user;
    private $pass;
    private $name;
    private $cn;
    function __construct() {


        //LOCAL HOST CONFIG
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->name = 'NORMAGRUP';
        try {
            $this->cn = new PDO("mysql:dbname=$this->name;host=$this->host", $this->user, $this->pass);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function getUsuarios() {
        $consulta = "SELECT * FROM usuarios;";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function getMaquinas() {
        $consulta = "SELECT * FROM maquinas;";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function getMaquinaPorId($id) {
        $consulta = "SELECT * FROM maquinas WHERE id = '$id';";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
            return $prep->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function borrarMaquina($id) {
        $consulta = "DELETE FROM maquinas WHERE id=$id;";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function actualizarMaquina($id, $nombre, $ultima, $proxima) {
        $consulta = "UPDATE maquinas SET id='$id', nombre='$nombre', ultima_calibracion='$ultima', proxima_calibracion='$proxima'";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    function nuevaMaquina($id, $nombre, $ultima, $proxima) {
        $consulta = "INSERT INTO maquinas (id, nombre, ultima_calibracion, proxima_calibracion) 
        VALUES('$id', '$nombre', '$ultima', '$proxima');";
        try {
            $prep = $this->cn->prepare($consulta);
            $prep->execute();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
