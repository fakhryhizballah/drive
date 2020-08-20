<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('admcontent'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table bg-white">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">ID User</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <<<<<<< HEAD <th scope="col">Debit</th>
                    <th scope="col">Kredit</th>
                    <th scope="col">Update at</th>

                    =======
                    <th scope="col">No Telp</th>
                    <th scope="col">Jumlah Debit</th>
                    <th scope="col">Jumlah Kredit</th>
                    >>>>>>> b4639e18e00ccfff1a527ea8a861159aee54f473
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php $i = 1; ?>
            <?php foreach ($user as $u) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $u['id_user']; ?></td>
                    <td><?= $u['nama']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= $u['debit']; ?></td>
                    <td><?= $u['kredit']; ?></td>
                    <td><?= $u['updated_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->Links('user', 'admin_pagination') ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection('admcontent'); ?>