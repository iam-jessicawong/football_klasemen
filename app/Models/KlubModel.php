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

    public function insertData($data) {
      $klub1 = $this->getWhere('id', $data['klub1']);
      $klub2 = $this->getWhere('id', $data['klub2']);
      $updateKlub1 = [
        'main' => $klub1['main'] + 1,
        'gm' => $klub1['gm'] + $data['skor1'],
        'gk' => $klub1['gk'] + $data['skor2']
      ];
      $updateKlub2 = [
        'main' => $klub2['main'] + 1,
        'gm' => $klub2['gm'] + $data['skor2'],
        'gk' => $klub2['gk'] + $data['skor1']
      ];

      if($data['skor1'] == $data['skor2']) {
        $updateKlub1['seri'] = $klub1['seri'] + 1;
        $updateKlub1['point'] = $klub1['point'] + 1;
        
        $updateKlub2['seri'] = $klub2['seri'] + 1;
        $updateKlub2['point'] = $klub2['point'] + 1;
      } elseif($data['skor1'] > $data['skor2']) {
        $updateKlub1['menang'] = $klub1['menang'] + 1;
        $updateKlub1['point'] = $klub1['point'] + 3;
        
        $updateKlub2['kalah'] = $klub2['kalah'] + 1;
      } else {
        $updateKlub1['kalah'] = $klub1['kalah'] + 1;

        $updateKlub2['menang'] = $klub2['menang'] + 1;
        $updateKlub2['point'] = $klub2['point'] + 3;
      }

      $this->update(['id' => $data['klub1']], $updateKlub1);
      $this->update(['id'=> $data['klub2']], $updateKlub2);
    }

}