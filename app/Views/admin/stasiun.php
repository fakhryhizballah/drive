<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('admcontent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table bg-white">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">ID Mesin</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Geo</th>
                <th scope="col">Status</th>
                <th scope="col">Isi</th>
                <th scope="col">Indikator</th>

            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php $i = 1; ?>
            <?php foreach ($stasiun as $st) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $st['id_mesin']; ?></td>
                    <td><?= $st['lokasi']; ?></td>
                    <td><?= $st['geo']; ?></td>
                    <td><?= $st['status']; ?></td>
                    <td><?= $st['isi']; ?></td>
                    <td><?= $st['Indikator']; ?></td>
                </tr>
                <?php $i++;  ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection('admcontent'); ?>