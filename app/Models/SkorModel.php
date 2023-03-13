<?php

namespace App\Models;

use CodeIgniter\Model;

class SkorModel extends Model
{
    protected $table = "pertandingan";
    protected $allowedFields = ['klub1', 'klub2', 'skor1', 'skor2'];

    public function getAll()
    {
      return $this->select('pertandingan.skor1, pertandingan.skor2, k1.klub as klub1, k2.klub as klub2')->join('klub k1', 'pertandingan.klub1 = k1.id')->join('klub k2', 'pertandingan.klub2 = k2.id')->findAll();
    }
}