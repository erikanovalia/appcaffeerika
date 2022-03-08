<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<div class="container">
    <h3>Data Detail Pesanan</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#adddetailpesanan">Tambah Data</button>

    <table class="table table-bordered">
        <thead>
            <th>Detail</th>
            <th>Transaksi</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($ddetailpesanan as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['detail_id']?></td>
                <td><?=$row['transaksi_id']?></td>
                <td><?=$row['menu_id']?></td>
                <td><?=$row['jumlah']?></td>
                <td>
                    <a href="" class="btn btn-info btn-sm btn-edit">Edit</a>
                    <a href="" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                 </td>
            </tr>
            <?php
            $no++;
            endforeach?>
    </table>
</div>
<!-- Add product-->
<form action="/DetailController/save" method="post">
            <div class="modal fade" id="adddetailpesanan" tabimdex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span> 
                            </button>
                     </div>
                     
                     <div class="modal-body">
                         <div class="form-group">
                             <label>Id Pesanan</label>
                             <input type="text" class="form-control" name="id_pesanan" placeholder="Id Pesanan">
                        </div>
                        <div class="form-group">
                             <label>Id Menu</label>
                             <input type="text" class="form-control" name="id_menu" placeholder="Id Menu">
                        </div>
                        <div class="form-group">
                             <label>Jumlah</label>
                             <input type="text" class="form-control" name="jumlah" placeholder="Jumlah                 ">
                        </div>
                        
                    </div> 
        

        <div  class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
    </form>

<?= $this->endSection()?>
