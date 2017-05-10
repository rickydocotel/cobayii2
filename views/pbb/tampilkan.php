<?php 

$this->title = 'Demo Active Record Yii2';

?>

<h1>Hasil Pencarian</h1>

<!-- <p>Data berikut diambil dengan menggunakan query builder:</p> -->
<p>==> Data <?= count($query1) ?> rows</p>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="btn-material-bluegrey">
            <th>Tahun</th>
            <th>Nama</th>
            <th>Kelurahan</th>
            <th>Alamat</th>
            <th>Tagihan</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>
    </thead>
    <tbody>
   <!--  THN_PAJAK_SPPT','NM_WP_SPPT','KELURAHAN_WP_SPPT','JLN_WP_SPPT' -->
        <?php foreach ($query1 as $team): ?>
            <?php 
                if ($team['STATUS_PEMBAYARAN_SPPT']==1) {
                    $status = "Wes Bayar";
                }elseif($team['STATUS_PEMBAYARAN_SPPT']==0){
                    $status = "Durong Bayar";
                }

                if (strtotime("now") <= strtotime($team['TGL_JATUH_TEMPO_SPPT'])) {
                    $denda = "0";
                }elseif(strtotime("now") > strtotime($team['TGL_JATUH_TEMPO_SPPT'])){
                    $denda = 2/100 * strtotime($team['TGL_JATUH_TEMPO_SPPT'])/12;
                }
            ?>

            <tr>
                <td><?= $team['THN_PAJAK_SPPT'] ?></td>
                <td><?= $team['NM_WP_SPPT'] ?></td>
                <td><?= $team['KELURAHAN_WP_SPPT'] ?></td>
                <td><?= $team['JLN_WP_SPPT'] ?></td>
                <td><?= $team['PBB_YG_HARUS_DIBAYAR_SPPT'] ?></td>
                <td><?= $team['TGL_JATUH_TEMPO_SPPT'] ?></td>
                <td><?= $status ?></td>
                <td><?= $denda ?></td>
                 
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>