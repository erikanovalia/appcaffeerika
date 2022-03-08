<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailpesananModel extends Model{
    protected $table      = 'tb_detail_pesanan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['detail_id','transaksi_id','menu_id','jumlah'];
}