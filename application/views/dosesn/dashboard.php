<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <style>
        /* Copy the CSS from your original file */
    </style>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;background-color: #FBD0FC;">
    <div style="max-width: 800px; margin: auto;">
        <?php if($this->session->flashdata('success')): ?>
            <div style="color: green; font-weight: bold;"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        
        <!-- Add Grade Form -->
        <h2>Menambah Nilai Baru</h2>
        <?php echo form_open('dosen/add_grade', ['style' => 'margin-bottom: 20px;']); ?>
            <!-- Form contents remain the same, just use form_* helpers -->
        <?php echo form_close(); ?>

        <!-- Student List Table -->
        <h2>List Nilai Mahasiswa</h2>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <!-- Table contents remain the same -->
        </table>

        <?php echo anchor('auth/logout', 'Logout', ['class' => 'logout-button']); ?>
    </div>
</body>
</html>