<?php

namespace App\Models;

use CodeIgniter\Model;

class KlubModel extends Model
{
    protected $table = "klub";
    protected $allowedFields = ['klub', 'kota', 'main', 'menang', 'seri', 'kalah', 'gm', 'gk', 'point'];

    public function getAll() {
      return $this->findAll();
    }

    public function getWhere($column, $data) {
      return $this->where($column, $data)->first();
    }

    public function getAllDesc() {
      return $this->orderBy('point', 'DESC')->findAll();
    }

}