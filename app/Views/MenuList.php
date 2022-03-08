<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<div class="container">
    <h3>Data Menu</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addmenu">Tambah Data</button>

    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stock</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stock']?></td>
                <td>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editmenu-<?=$row['id']?>">Edit</a>
                    <a href="<?=base_url('menucontroller/delete/'.$row['id'])?>"onclick="return confirm('Yakin Akan Dihapus')" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                 </td>
            </tr>
            <form action="<?=base_url('menu/edit/'.$row['id'])?>" method="post">
            <div class="modal fade" id="editmenu-<?=$row['id']?>" tabimdex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span> 
                            </button>
                     </div>
                     <from action="<?=base_url('menus')?>" method="post">
                     <div class="modal-body">
                         <div class="form-group">
                             <label>Nama</label>
                             <input type="text" class="form-control" name="nama" class="form-control" value="<?=$row['nama']?>">
                        </div>
                        <div class="form-group">
                             <label>Harga</label>
                             <input type="text" class="form-control" name="harga" class="form-control" value="<?=$row['harga']?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Menu</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan">
                                <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman">
                                <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="camilan">
                                <label class="form-check-label" for="flexRadioDefault3">Cemilan</label>
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stock" class="form-control" value="<?=$row['stock']?>">
                            </div>

                             <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
    </form>
            <?php
            $no++;
            endforeach?>
    </table>
</div>
<!-- Add product-->
<form action="/MenuController/simpan" method="post">
            <div class="modal fade" id="addmenu" tabimdex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span> 
                            </button>
                     </div>
                     
                     <div class="modal-body">
                         <div class="form-group">
                             <label>Nama</label>
                             <input type="text" class="form-control" name="nama" placeholder="Nama Menu">
                        </div>
                        <div class="form-group">
                             <label>Harga</label>
                             <input type="text" class="form-control" name="harga" placeholder="Harga Menu">
                        </div>
                        <div class="form-group">
                            <label>Jenis Menu</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault1" value="makanan">
                                <label class="form-check-label" for="flexRadioDefault1">Makanan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" value="minuman">
                                <label class="form-check-label" for="flexRadioDefault2">Minuman</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault3" value="camilan">
                                <label class="form-check-label" for="flexRadioDefault3">Cemilan</label>
                            </div>
                     </div>
                     <div class="form-group">
                         <label>Stok</label>
                         <input type="text" class="form-control" name="stock" placeholder="Stok Menu">
                    </div>
        </div>

        <div  class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </form>

<?= $this->endSection()?>

