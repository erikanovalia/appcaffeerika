<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;

class Menucontroller extends Controller{
    /**
     * instance of the main Request object,
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;


    function __construct()
    {
        $this->menus = new MenuModel();
    }
    public function tampil()
    {
        $data ['data']=$this->menus->findAll();
        return view('MenuList', $data);
    }
    public function simpan()
    {
        $data = array(
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'stock'=>$this->request->getPost('stock'),
        );
        $this->menus->insert($data);
        return redirect('menu')->with('success','Data berhasil disimpan');
    }
    public function delete($id)
    {
        $this->menus->delete($id);
        return redirect('menu')->with('success','Data berhasil dihapus');
    }

    public function edit($id)
    {
        #code
           
            $data = array(
                'nama'=>$this->request->getPost('nama'),
                'harga'=>$this->request->getPost('harga'),
                'jenis'=>$this->request->getPost('jenis'),
                'stock'=>$this->request->getPost('stock'),
            );
            $this->menus->update($id,$data);
            return redirect('menu')->with('succes','Data Berhasil diedit');
    }
}