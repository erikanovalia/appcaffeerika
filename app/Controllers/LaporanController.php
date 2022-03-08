<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PesananModel;

class LaporanController extends Controller{
    /**
     * Instance of the main Request object
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->Laporan = new PesananModel();
    }
    public function tampil()
    {
        $data ['data'] = $this->Laporan->findAll();
        return view ('LaporanList', $data);
    }
    public function delete($id)
    {
        $this->Laporan->delete($id);
        return redirect('laporan')->with('success','Data berhasil dihapus');
    }
}