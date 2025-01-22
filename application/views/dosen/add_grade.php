<!-- application/views/add_grade_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Nilai Mahasiswa</h2>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('dosen/add_grade'); ?>

        <div class="form-group">
            <label for="mahasiswa_id">ID Mahasiswa</label>
            <input type="number" class="form-control" name="mahasiswa_id" id="mahasiswa_id" required>
        </div>

        <div class="form-group">
            <label for="diskusi">Diskusi</label>
            <input type="number" class="form-control" name="diskusi" id="diskusi" value="<?php echo set_value('diskusi'); ?>" required>
            <?php echo form_error('diskusi'); ?>
        </div>

        <div class="form-group">
            <label for="praktikum">Praktikum</label>
            <input type="number" class="form-control" name="praktikum" id="praktikum" value="<?php echo set_value('praktikum'); ?>" required>
            <?php echo form_error('praktikum'); ?>
        </div>

        <div class="form-group">
            <label for="responsi">Responsi</label>
            <input type="number" class="form-control" name="responsi" id="responsi" value="<?php echo set_value('responsi'); ?>" required>
            <?php echo form_error('responsi'); ?>
        </div>

        <div class="form-group">
            <label for="uts">UTS</label>
            <input type="number" class="form-control" name="uts" id="uts" value="<?php echo set_value('uts'); ?>" required>
            <?php echo form_error('uts'); ?>
        </div>

        <div class="form-group">
            <label for="uas">UAS</label>
            <input type="number" class="form-control" name="uas" id="uas" value="<?php echo set_value('uas'); ?>" required>
            <?php echo form_error('uas'); ?>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai Akhir</label>
            <input type="text" class="form-control" name="nilai" id="nilai" value="<?php echo set_value('nilai'); ?>" required>
            <?php echo form_error('nilai'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>

        <?php echo form_close(); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
