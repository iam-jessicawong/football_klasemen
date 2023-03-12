<?php

namespace App\Controllers;

use App\Models\KlubModel;

class Klub extends BaseController
{   
    protected $klubModel;
    public function __construct()
    {
        $this->klubModel = new KlubModel();
    }

    public function index()
    {
        session();
        $allKlub = $this->klubModel->getAll();
        $data = [
            'title'=> "Klub",
            'allklub' => $allKlub,
            'validation' => \Config\Services::validation()
        ];

        return view('pages/klub', $data);
    }

    public function save() {
        // input validation
        if(!$this->validate([
            'klub' => 'is_unique[klub.klub]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/klub')->withInput()->with('validation', $validation);
        };

        $data = [
            'klub' => ucwords(trim($this->request->getVar('klub'))),
            'kota' => ucwords(trim($this->request->getVar('kota')))
        ];
        
        $isExist = $this->klubModel->getWhere('klub', $data['klub']);
        if($isExist) {
            session()->setFlashdata('error', 'Data klub sudah tersedia');
            return redirect()->to('/klub')->withInput();
        }

        $this->klubModel->save($data);

        session()->setFlashdata('pesan', 'Data klub berhasil ditambahkan');

        return redirect()->to('/klub');
    }
}
