<?php
if ($this->session->userdata('role') == 'admin') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body style="font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f2f5; color: #333; line-height: 1.6;">
    <div style="background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 15px 30px; position: fixed; width: 100%; top: 0; z-index: 1000;">
        <div style="max-width: 1400px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="margin: 0; color: #1a73e8; font-size: 24px; font-weight: 600;">
                <i class="fas fa-gauge-high" style="margin-right: 10px;"></i>Admin Dashboard
            </h1>
            <div style="display: flex; gap: 15px;">
                <button onclick="window.location.href='<?php echo site_url('admin/add_user'); ?>'"
                    style="background-color: #1a73e8; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; display: flex; align-items: center; gap: 8px; transition: all 0.3s;">
                    <i class="fas fa-user-plus"></i>Add User
                </button>
                <button onclick="window.location.href='<?php echo site_url('auth/logout'); ?>'"
                    style="background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; display: flex; align-items: center; gap: 8px; transition: all 0.3s;">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </button>
            </div>
        </div>
    </div>

    <div style="max-width: 1400px; margin: 100px auto 40px; padding: 0 30px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 40px;">
            <div style="background: linear-gradient(135deg, #1a73e8, #0d47a1); color: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h3 style="margin: 0; font-size: 16px; font-weight: 500; opacity: 0.9;">Total Admins</h3>
                        <p style="margin: 10px 0 0; font-size: 28px; font-weight: 600;"><?php echo $admin_count; ?></p>
                    </div>
                    <i class="fas fa-user-shield" style="font-size: 40px; opacity: 0.8;"></i>
                </div>
            </div>

            <div style="background: linear-gradient(135deg, #00c853, #009624); color: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h3 style="margin: 0; font-size: 16px; font-weight: 500; opacity: 0.9;">Total Dosen</h3>
                        <p style="margin: 10px 0 0; font-size: 28px; font-weight: 600;"><?php echo $dosen_count; ?></p>
                    </div>
                    <i class="fas fa-chalkboard-teacher" style="font-size: 40px; opacity: 0.8;"></i>
                </div>
            </div>

            <div style="background: linear-gradient(135deg, #ff6d00, #e65100); color: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h3 style="margin: 0; font-size: 16px; font-weight: 500; opacity: 0.9;">Total Mahasiswa</h3>
                        <p style="margin: 10px 0 0; font-size: 28px; font-weight: 600;"><?php echo $mahasiswa_count; ?></p>
                    </div>
                    <i class="fas fa-user-graduate" style="font-size: 40px; opacity: 0.8;"></i>
                </div>
            </div>
        </div>

        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden;">
            <div style="padding: 24px 30px; border-bottom: 1px solid #eef2f7;">
                <h2 style="margin: 0; color: #1a73e8; font-size: 20px; font-weight: 600;">
                    <i class="fas fa-users" style="margin-right: 10px;"></i>User Management
                </h2>
            </div>
            
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f8fafb;">
                            <th style="padding: 16px; text-align: left; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">ID</th>
                            <th style="padding: 16px; text-align: left; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">NIM</th>
                            <th style="padding: 16px; text-align: left; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Role</th>
                            <th style="padding: 16px; text-align: center; color: #5f6368; font-weight: 600; border-bottom: 2px solid #eef2f7;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr style="transition: all 0.3s;" onmouseover="this.style.backgroundColor='#f8fafb'" onmouseout="this.style.backgroundColor='white'">
                                <td style="padding: 16px; border-bottom: 1px solid #eef2f7;"><?php echo $user->id; ?></td>
                                <td style="padding: 16px; border-bottom: 1px solid #eef2f7;"><?php echo $user->username; ?></td>
                                <td style="padding: 16px; border-bottom: 1px solid #eef2f7;">
                                    <span style="padding: 6px 12px; border-radius: 50px; font-size: 13px; font-weight: 500;
                                        <?php
                                        switch($user->role) {
                                            case 'admin':
                                                echo 'background-color: #e8f0fe; color: #1a73e8;';
                                                break;
                                            case 'dosen':
                                                echo 'background-color: #e6f4ea; color: #00c853;';
                                                break;
                                            case 'mahasiswa':
                                                echo 'background-color: #fff4e5; color: #ff6d00;';
                                                break;
                                        }
                                        ?>
                                    ">
                                        <?php echo ucfirst($user->role); ?>
                                    </span>
                                </td>
                                <td style="padding: 16px; border-bottom: 1px solid #eef2f7; text-align: center;">
                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                        <a href="<?php echo site_url('admin/edit_user/' . $user->id); ?>"
                                            style="color: #1a73e8; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 500; background-color: #e8f0fe; transition: all 0.3s;">
                                            <i class="fas fa-edit" style="margin-right: 6px;"></i>Edit
                                        </a>
                                        <a href="<?php echo site_url('admin/delete_user/' . $user->id); ?>"
                                            onclick="return confirm('Are you sure you want to delete this user?');"
                                            style="color: #dc3545; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 500; background-color: #fce8e8; transition: all 0.3s;">
                                            <i class="fas fa-trash-alt" style="margin-right: 6px;"></i>Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
    echo "<div style='text-align: center; padding: 50px; font-family: Arial, sans-serif; color: #dc3545; font-size: 24px;'>Access Denied</div>";
}
?>