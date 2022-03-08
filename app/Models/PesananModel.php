<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model{
    protected $table      = 'tb_pesanan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','user_id','tgl','total_harga','nama_pemesan','no_meja'];
}