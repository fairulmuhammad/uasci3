<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Arial, sans-serif; background-color: #f0f2f5; line-height: 1.6;">
    <div style="background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 15px 30px; position: fixed; width: 100%; top: 0; z-index: 1000;">
        <div style="max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="margin: 0; color: #1a73e8; font-size: 24px; font-weight: 600;">
                <i class="fas fa-chalkboard-teacher" style="margin-right: 10px;"></i>Dashboard Dosen
            </h1>
            <a href="<?php echo site_url('auth/logout'); ?>" 
               style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px; transition: all 0.3s;">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        </div>
    </div>

    <div style="max-width: 1400px; margin: 90px auto 40px; padding: 20px;">
        <?php if($this->session->flashdata('success')): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <i class="fas fa-check-circle" style="margin-right: 10px;"></i><?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i><?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div style="background: linear-gradient(135deg, #1a73e8, #0d47a1); color: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="margin: 0; font-size: 16px; font-weight: 500; opacity: 0.9;">Total Mahasiswa</h3>
                    <p style="margin: 10px 0 0; font-size: 28px; font-weight: 600;"><?php echo $mahasiswa_count; ?></p>
                </div>
                <i class="fas fa-user-graduate" style="font-size: 40px; opacity: 0.8;"></i>
            </div>
        </div>

        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 30px; margin-bottom: 30px;">
            <h2 style="color: #1a73e8; font-size: 20px; margin-bottom: 25px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-plus-circle"></i>Menambah Nilai Baru
            </h2>

            <form action="<?php echo site_url('dosen/add_grade'); ?>" method="POST">
                <div style="margin-bottom: 25px;">
                    <label style="display: block; margin-bottom: 8px; color: #5f6368; font-weight: 500;">Pilih Mahasiswa:</label>
                    <select name="mahasiswa_id" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; background-color: #f8fafb;">
                        <?php foreach ($mahasiswa_scores as $student) : ?>
                            <option value="<?php echo $student['student_id']; ?>"><?php echo $student['username']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 25px;">
                    <?php
                    $fields = [
                        'diskusi' => 'Diskusi',
                        'praktikum' => 'Praktikum',
                        'responsi' => 'Responsi',
                        'uts' => 'UTS',
                        'uas' => 'UAS',
                        'nilai' => 'Nilai Akhir'
                    ];
                    
                    foreach ($fields as $field => $label): ?>
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: #5f6368; font-weight: 500;"><?php echo $label; ?>:</label>
                            <input type="<?php echo ($field == 'nilai' ? 'text' : 'number'); ?>" 
                                   name="<?php echo $field; ?>" 
                                   required
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; transition: all 0.3s;max-width:180px"
                                   onFocus="this.style.borderColor='#1a73e8'; this.style.boxShadow='0 0 0 3px rgba(26,115,232,0.1)';"
                                   onBlur="this.style.borderColor='#ddd'; this.style.boxShadow='none';">
                        </div>
                    <?php endforeach; ?>
                </div>

                <button type="submit" style="background-color: #1a73e8; color: white; padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 500; display: flex; align-items: center; gap: 8px; transition: all 0.3s;">
                    <i class="fas fa-save"></i>Masukan Nilai
                </button>
            </form>
        </div>

        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden;">
            <div style="padding: 20px 30px; border-bottom: 1px solid #eef2f7;">
                <h2 style="color: #1a73e8; font-size: 20px; margin: 0; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-list"></i>List Nilai Mahasiswa
                </h2>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f8fafb;">
                            <th style="padding: 16px; text-align: left; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Username</th>
                            <th style="padding: 16px; text-align: left; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Student ID</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Diskusi</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Praktikum</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Responsi</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">UTS</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">UAS</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mahasiswa_scores)): ?>
                            <?php foreach ($mahasiswa_scores as $score): ?>
                                <tr style="transition: all 0.3s;" onmouseover="this.style.backgroundColor='#f8fafb'" onmouseout="this.style.backgroundColor='white'">
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7;"><?php echo $score['username']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7;"><?php echo $score['student_id']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;"><?php echo $score['diskusi']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;"><?php echo $score['praktikum']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;"><?php echo $score['responsi']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;"><?php echo $score['uts']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;"><?php echo $score['uas']; ?></td>
                                    <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center; font-weight: 600; color: #1a73e8;"><?php echo $score['nilai']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" style="padding: 20px; text-align: center; color: #666;">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>