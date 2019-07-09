<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class WilayahModel extends Model
{

    protected $db;
    protected $table      = 'wilayah';
    protected $primaryKey = 'kode';

    public function getPropinsi()
    {
        $sql = "SELECT * FROM `wilayah` WHERE `kode` LIKE '__'";
        return $this->query($sql)->getResult();
    }

    public function getKabupaten($idPropinsi)
    {
        $idPropinsi = $this->escapeString($idPropinsi);
        
        $sql = 'SELECT * FROM `wilayah` WHERE `kode` LIKE "'.$idPropinsi.'l__"';
        return $this->query($sql)->getResult();
    }

    public function getKecamatan($idKabupaten)
    {
        $idKabupaten = $this->escapeString($idKabupaten);

        $sql = 'SELECT * FROM `wilayah` WHERE `kode` LIKE "'.$idKabupaten.'l__"';
        return $this->query($sql)->getResult();
    }

    public function getDesa($idKecamatan)
    {
        $idKabupaten = $this->escapeString($idKecamatan);

        $sql = 'SELECT * FROM `wilayah` WHERE `kode` LIKE "'.$idKecamatan.'l%"';
        return $this->query($sql)->getResult();
    }
}