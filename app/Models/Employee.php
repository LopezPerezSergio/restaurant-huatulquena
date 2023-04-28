<?php

namespace App\Models;

class Employee
{
    protected $id;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $status;
    protected $sueldo;
    protected $codigoAcceso;
    protected $rol;

    public function __construct($id, $nombre, $apellidos, $telefono, $status, $sueldo, $codigoAcceso, $rol)
    {
        $this->$id = $id;
        $this->$nombre = $nombre;
        $this->$apellidos = $apellidos;
        $this->$telefono = $telefono;
        $this->$status = $status;
        $this->$sueldo = $sueldo;
        $this->$codigoAcceso = $codigoAcceso;
        $this->$rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getCodigoAcceso()
    {
        return $this->codigoAcceso;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
