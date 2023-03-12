<?php

namespace App\Models;

use CodeIgniter\Model;

class SkorModel extends Model
{
    protected $table = "pertandingan";
    protected $allowedFields = ['klub1', 'klub2', 'skor1', 'skor2'];

    public function getAll()
    {
      return $this->findAll();
    }
}