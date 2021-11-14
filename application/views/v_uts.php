<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Data Pegawai</title>
</head>

<body>
    <div class="container-lg bg-light">
        <form action="<?= base_url('Uts/cetak'); ?>" method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <th colspan="3">
                        Data Pegawai
                        <small>Power Control</small>
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th>Nip</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nip" placeholder="Masukkan Nip" size="25%">
                    </td>
                    <td><?php echo form_error('nip'); ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Pegawai" size="25%">
                    </td>
                    <td><?php echo form_error('nama'); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>:</td>
                    <td>
                        <input type="radio" name="status" value="Menikah"> Menikah
                        <input type="radio" name="status" value="Belum Menikah"> Belum Menikah
                    </td>
                    <td><?php echo form_error('status'); ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>:</td>
                    <td>
                        <select name=" jabatan" style="width: 241px; height: 30px;">
                            <option value=""">~Pilih~</option>
                        <option value=" Staff">Staff</option>
                            <option value="Sekertaris">Sekertaris</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </td>

                    <td><?php echo form_error('jabatan'); ?></td>
                </tr>
                <tr>
                    <th>Gaji</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="gaji" placeholder="" size="25%">
                    </td>
                    <td><?php echo form_error('gaji'); ?></td>
                </tr>
                <tr>
                    <th>Tunjangan</th>
                    <td>:</td>
                    <td>
                        <input type="text" name="tunjangan" placeholder="" size="25%">
                    </td>
                    <td><?php echo form_error('tunjangan'); ?></td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>:</td>
                    <td>
                        <input type="file" name="foto">
                    </td>
                    <td><?php echo form_error('foto'); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input class="btn btn-primary" type="submit" value="Simpan">
                        <input class="btn btn-danger" type="reset" value="Batal">
                    </td>
                </tr>
            </table>
        </form>
        <!--  -->
        <br>
        <br>
        <table class="table text-center" border="1pt">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nip</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Gaji</th>
                <th scope="col">Tunjangan</th>
                <th scope="col">Foto</th>
                <th colspan="2">Action</th>
            </tr>
            <?php



            $no = 1;
            foreach ($pegawai as $pegawai) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pegawai->nip; ?></td>
                    <td><?= $pegawai->nama; ?></td>
                    <td><?= $pegawai->status; ?></td>
                    <td><?= $pegawai->jabatan; ?></td>
                    <td><?= $pegawai->gaji; ?></td>
                    <td><?= $pegawai->tunjangan; ?>
                    <td>
                        <?php
                        if ($pegawai->foto == "") {
                        ?>
                            <img src="<?php echo base_url(); ?>assets/img/kali-strips.png" width="25%" height="25%">
                        <?php
                        } else {
                        ?>
                            <img width="50" height="50" src="<?php echo base_url(); ?>upload/<?= $pegawai->foto; ?>">
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?= base_url('Uts/edit/' . $pegawai->nip) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="<?= base_url('Uts/hapus/' . $pegawai->nip) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>