<?php

namespace App\Controllers;

use App\Models\KlubModel;

class Home extends BaseController
{
    protected $klubModel;
    public function __construct()
    {
        $this->klubModel = new KlubModel();
    }

    public function index()
    {
        $data = [
            'title'=> "Home",
            'klub' => $this->klubModel->getAllDesc()
        ];
        return view('pages/home', $data);
    }
}
