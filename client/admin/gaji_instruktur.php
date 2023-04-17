<?php
include_once('../template/header.php');
include_once('../../api/auth/access_control.php');
user_access(['Super Admin', 'Admin Akademik']);

$sql = "SELECT g.*,i.nama nama_instruktur FROM gaji g
JOIN instruktur i ON g.id_instruktur = i.id_instruktur
JOIN jadwal j on i.id_instruktur = i.id_instruktur";
$data_gaji = $db->query($sql) or die($db-error);
$data_gaji->fetch_assoc();


$sql = "SELECT * FROM instruktur";
$data_instruktur = $db->query($sql) or die($db-error);
$data_instruktur->fetch_assoc();

?>
<div id="gaji" class="w-full min-h-screen flex">
    <?php include_once '../components/dashboard_sidebar.php' ?>
    <div class="w-full flex flex-col">
        <div class="p-4 sm:ml-64">
            <?php include_once '../components/dashboard_navbar.php';
            generate_breadcrumb([['title' => 'gaji', 'filename' => 'gaji.php']]);
            ?>

    <div class="flex items-center gap-5">
        <h4 class="my-7 font-semibold text-gray-800 dark:text-white">Gaji</h4>
        <form action="../../api/admin/gaji.php" method="post">
            <button type="submit" name="sync" class="btn">Update data gaji</button>
        </form>
        </div>


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3"></th>
                    
                            <th scope="col" class="px-6 py-3">Nominal (Rp)</th>
                            <th scope="col" class="px-6 py-3">Tanggal Penerimaan</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            <th scope="col" class="px-6 py-3">aksi</th>
                            <!-- <th scope="col" class="px-6 py-3">Instruktur</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data_gaji as $key => $gaji) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="px-6 py-4 text-amber-500"></th>

                                    <td class="px-6 py-4"><?= $gaji['nominal'] ?></td>
                                    <td class="px-6 py-4"><?= $gaji['tgl_penerimaan'] ?></td>
                                    <td class="px-6 py-4"><?= $gaji['nama_instruktur'] ?></td>
                                    <td class="px-6 py-4 <?= $gaji['status'] === null ? 'text-red-500' : 'text-green-500' ?>">
                                    <?= $gaji['status'] === null ? 'Belum Terbayar' : $gaji['status'] ?>
                                    
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($gaji['status'] !== 'Lunas') : ?>
                                        <button data-modal-target="edit<?= $gaji['id_gaji'] ?>" data-modal-toggle="edit<?= $gaji['id_gaji'] ?>" type="submit" class="btn btn--outline-green">Tandai sebagai diterima</button>
                                        <div id="edit<?= $gaji['id_gaji'] ?>" tabindex="-1" aria-hidden="true" class="modal">
                                            <div class="modal__backdrop">
                                                <!-- Modal content -->
                                                <div class="modal__content">
                                                    <!-- Modal header -->
                                                    <div class="modal__header">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Masukkan tanggal pembayaran
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit<?= $tunggakan['id_tunggakan'] ?>">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <form class="form" action="../../api/admin/gaji_instruktur.php" method="post">
                                                        <!-- Modal body -->
                                                        <div class="modal__body">
                                                            <label for="tgl_pembayaran">Tanggal pembayaran</label>
                                                            <?php
                                                            $bulan = date('m');
                                                            $hari = date('d');
                                                            $tahun = date('Y');
                                                            $hari_ini = "$tahun-$bulan-$hari";
                                                            ?>
                                                            <input type="hidden" name="status" value="Lunas">
                                                            <input class="input" type="date" name="tgl_pembayaran" id="tgl_pembayaran" value="<?= $hari_ini ?>">
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal__footer">
                                                            <button type="submit" name="update" value="<?= $gaji['id_gaji'] ?>" class="btn btn--blue">Tandai sebagai lunas</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </td>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include_once('../template/footer.php') ?>
