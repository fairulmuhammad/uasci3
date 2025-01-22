<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body style="font-family: 'Inter', system-ui, -apple-system, sans-serif; background-color: #f8fafc; margin: 0; padding: 0; min-height: 100vh; display: flex; flex-direction: column; color: #334155;">
    <nav style="background: linear-gradient(135deg, #1e40af, #1e3a8a); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); padding: 1.25rem 2.5rem; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000;">
        <h1 style="margin: 0; color: white; font-size: 1.75rem; font-weight: 700; letter-spacing: -0.025em;">
            Student Grade Dashboard
        </h1>

        <a href="<?php echo site_url('Auth/logout'); ?>" class="logout-btn"
            style="background-color: rgba(252, 0, 0, 0.54); color: white; padding: 0.75rem 1.5rem; text-decoration: none; border-radius: 8px; font-size: 0.875rem; font-weight: 500; transition: all 0.2s; border: 1px solid rgba(255,255,255,0.2); cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-sign-out-alt"></i>
            Sign Out
        </a>
    </nav>

    <main style="flex: 1; padding: 2.5rem; max-width: 1400px; margin: 0 auto; width: 100%; box-sizing: border-box;">
        <div style="background-color: white; border-radius: 16px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); overflow: hidden;">
            <div style="padding: 2rem; background: linear-gradient(to right, #f8fafc, #f1f5f9); border-bottom: 1px solid #e2e8f0;">
                <h2 style="margin: 0; color: #1e3a8a; font-size: 1.5rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-chart-line" style="color: #3b82f6;"></i>
                    Student Performance Overview
                </h2>
            </div>

            <div style="overflow-x: auto; padding: 1.5rem;">
                <table style="width: 100%; border-collapse: separate; border-spacing: 0; min-width: 800px;">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="padding: 1.25rem; text-align: left; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Username</th>
                            <th style="padding: 1.25rem; text-align: left; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Student ID</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Diskusi</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Praktikum</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Responsi</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">UTS</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">UAS</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Grade</th>
                            <th style="padding: 1.25rem; text-align: center; color: #475569; font-weight: 600; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0; white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mahasiswa_scores)) : ?>
                            <?php foreach ($mahasiswa_scores as $score) : ?>
                                <tr style="transition: all 0.2s ease-in-out;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem;"><?php echo $score['username']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem;"><?php echo $score['student_id']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem; text-align: center;"><?php echo $score['diskusi']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem; text-align: center;"><?php echo $score['praktikum']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem; text-align: center;"><?php echo $score['responsi']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem; text-align: center;"><?php echo $score['uts']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.875rem; text-align: center;"><?php echo $score['uas']; ?></td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; font-weight: 600; text-align: center;">
                                        <span style="padding: 0.375rem 1rem; border-radius: 9999px; font-size: 0.75rem; display: inline-block; letter-spacing: 0.025em;
                                            <?php
                                            $color = '';
                                            switch ($score['nilai']) {
                                                case 'A':
                                                    $color = 'background-color: #dcfce7; color: #166534; border: 1px solid #86efac;';
                                                    break;
                                                case 'B':
                                                    $color = 'background-color: #e0f2fe; color: #075985; border: 1px solid #7dd3fc;';
                                                    break;
                                                case 'C':
                                                    $color = 'background-color: #fef9c3; color: #854d0e; border: 1px solid #fde047;';
                                                    break;
                                                default:
                                                    $color = 'background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5;';
                                            }
                                            echo $color;
                                            ?>">
                                            <?php echo $score['nilai']; ?>
                                        </span>
                                    </td>
                                    <td style="padding: 1.25rem; border-bottom: 1px solid #e2e8f0; text-align: center;">
                                        <button onclick="window.location.href='<?php echo site_url('mahasiswa/print_nilai'); ?>'"
                                            style="background: linear-gradient(135deg, #059669, #047857); color: white; padding: 0.75rem 1.25rem; border: none; border-radius: 8px; cursor: pointer; font-size: 0.875rem; display: flex; align-items: center; gap: 0.5rem; transition: all 0.3s; margin: 0 auto; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <i class="fas fa-print"></i>
                                            Print
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="9" style="padding: 4rem 2rem; text-align: center; color: #64748b; border-bottom: 1px solid #e2e8f0; font-size: 0.875rem;">
                                    <div style="display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                                        <i class="fas fa-clipboard-list" style="font-size: 2rem; color: #94a3b8;"></i>
                                        No grades available at the moment.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>