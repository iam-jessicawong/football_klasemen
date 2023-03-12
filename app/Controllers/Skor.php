<?php

namespace App\Controllers;

use App\Models\KlubModel;
use App\Models\SkorModel;

class Skor extends BaseController
{
    protected $klubModel;
    protected $skorModel;
    public function __construct()
    {
        $this->klubModel = new KlubModel();
        $this->skorModel = new SkorModel();
    }

    public function index()
    {
        $data = [
            'title'=> "Skor",
            'klub' => $this->klubModel->getAll(),
            'pertandingan' => $this->skorModel->getAll()
        ];

        return view('pages/skor', $data);
    }

    public function save() {
        $data = [
            'klub1' => $this->request->getVar('klub1'),
            'klub2' => $this->request->getVar('klub2'),
            'skor1' => $this->request->getVar('skor1'),
            'skor2' => $this->request->getVar('skor2'),
        ];
        
        $isExist = $this->skorModel->where(['klub1'=> $data['klub1'], 'klub2' => $data['klub2']])->first();
        if($isExist) {
            session()->setFlashdata('error', 'Data pertandingan ini sudah tersedia');
            return redirect()->to('/skor')->withInput();
        }

        $this->skorModel->save($data);

        session()->setFlashdata('pesan', 'Data pertandingan berhasil ditambahkan');

        return redirect()->to('/skor');
    }
}
