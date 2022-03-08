<?=$this->extend('layouts/admin')?>
<?=$this->section('content')?>
<div class="container">
<h3> <strong>Laporan</strong> </h3>

<table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>User Id</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>No Meja</th>
            <th>Nama Pemesan</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['user_id']?></td>
                <td><?=$row['tgl']?></td>
                <td><?=$row['total_harga']?></td>
                <td><?=$row['no_meja']?></td>
                <td><?=$row['nama_pemesan']?></td>
                <td>
                <a href="<?=base_url('LaporanController/delete'.$row['id'])?>" onclick="return confirm('Yakin akan dihapus')" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                </td>
            </tr>
            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
</div>
<?= $this->endSection()?>
