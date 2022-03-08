<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pesananmodel;
use App\Models\menumodel;
use App\Models\DetailpesananModel;
use CodeIgniter\HTTP\Request;

class Pesanancontroller extends Controller{
    /**
     * Instance of the main Request object.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
        $this->menu = new Menumodel();
        $this->session = session();
        $this->pesanan = new PesananModel();
        $this->detail = new DetailpesananModel();
    }
    public function tampil()
    {
        $data ['data']= $this->menu->select('id, nama')->findAll();
        if(session('cart')!=null)
        {
            $data['menu']=array_values(session('cart'));
        }else{
            $data['menu']=null;
        }
        return view('PesananList',$data);
    }
    public function addCart()
    {
        $id = $this->request->getPost('menu_id');
        $jumlah = $this->request->getPost('jumlah');
        $menu=$this->menu->find($id);
        if($menu){
        }
        $isi = array(
            'id_menu'=>$id,
            'nama'=>$menu['nama'],
            'harga'=>$menu['harga'],
            'jumlah'=>$jumlah
        );

        if($this->session->has('cart')){
            $index=$this->cek($id);
            $cart=array_values(session('cart'));
            if($index == -1){
                array_push($cart, $isi);
            }else{
                $cart[$index]['jumlah']+=$jumlah;
            }
            $this->session->set('cart', $cart);
        }else{
            $this->session->set('cart' , array($isi));
        }
        return redirect('pesanan')->with('success','Data Berhasil Ditambah'. $menu['nama']);
    }

    public function cek($id)
    {
        $cart = array_values(session('cart'));
        for($i=0; $i < count($cart); $i++){
            if($cart[$i]['id_menu'] == $id){
                return $i;
            }
        }
        return -1;
    }
    public function hapusCart($id)
{
    $index = $this->cek($id);
    $cart = array_values(session('cart'));
    unset($cart[$index]);
    $this->session->set('cart',$cart);
    return redirect('pesanan')->with('success','Data berhasil di hapus');
}
public function simpan()
{
    if(session('cart') !=null){
        $datapesan = array(
            'tanggal'=>date('Y/m/d'),
            'id_user'=>1,
            'no_meja'=>$this->request->getPost('no_meja'),
            'nama_pemesan'=>$this->request->getPost('nama_pemesan'),
            'total_harga'=>'0'
        );
        $id = $this->pesanan->insert($datapesan);
        $cart = array_values(session('cart'));
        $tHarga=0;
        foreach($cart as $row){
            $datadetail = array(
                'pesanan_id'=>$id,
                'id_menu'=>$row['id_menu'],
                'jumlah'=>$row['jumlah'],
            );
            $tHarga +=$row['jumlah']*$row['harga'];
            $this->detail->insert($datadetail);
        }
        $this->session->remove('cart');
        $dtHarga= array(
            'total_harga' =>$tHarga
        );
        $this->pesanan->update($id,$dtHarga);
        return redirect('pesanan')->with('success','Data berhasil disimpan');
    }
}
}


