<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>
<body style="font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div style="background-color: rgba(255, 255, 255, 0.95); padding: 40px; border-radius: 16px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); width: 100%; max-width: 420px; backdrop-filter: blur(10px);">
        <h1 style="color: #2d3748; text-align: center; margin-bottom: 35px; font-size: 28px; font-weight: 600;">Add Account</h1>
        
        <?php if ($this->session->flashdata('register_success')): ?>
        <div id="success-alert" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; text-align: center; animation: fadeIn 0.5s;">
            <?php 
                echo $this->session->flashdata('register_success');
                // Add JavaScript redirect after showing message
                echo "<script>
                        setTimeout(function() {
                            window.location.href = '".site_url('admin/dashboard')."';
                        }, 3000);
                      </script>";
            ?>
            <div style="margin-top: 10px; font-size: 13px;">
                Redirecting to login page in 3 seconds...
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('register_error')): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px; text-align: center;">
            <?php echo $this->session->flashdata('register_error'); ?>
        </div>
        <?php endif; ?>

        <form method="post" action='<?= site_url('admin/add_user'); ?>' style="display: flex; flex-direction: column; gap: 20px;">
            <div style="position: relative;">
                <input type="text" name="username" placeholder="Username" required 
                    style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 15px; outline: none; transition: all 0.3s; background-color: #f8fafc; box-sizing: border-box;">
            </div>
            
            <div style="position: relative;">
                <input type="password" name="password" placeholder="Password" required 
                    style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 15px; outline: none; transition: all 0.3s; background-color: #f8fafc; box-sizing: border-box;">
            </div>
            
            <div style="margin-bottom: 10px;">
                <label style="display: block; margin-bottom: 8px; color: #4a5568; font-size: 15px; font-weight: 500;">Select Role:</label>
                <select name="role" id="role-select" required 
                    style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 15px; outline: none; transition: all 0.3s; background-color: #f8fafc; color: #4a5568; cursor: pointer; box-sizing: border-box;">
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <div id="mahasiswa-fields" style="display: none;">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #4a5568; font-size: 15px; font-weight: 500;">NIM:</label>
                    <input type="text" name="nim"
                        style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 15px; outline: none; transition: all 0.3s; background-color: #f8fafc; box-sizing: border-box;">
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #4a5568; font-size: 15px; font-weight: 500;">Kelas:</label>
                    <input type="text" name="kelas"
                        style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 15px; outline: none; transition: all 0.3s; background-color: #f8fafc; box-sizing: border-box;">
                </div>
            </div>
            
            <button type="submit" name="register" 
                style="background: linear-gradient(to right, #667eea, #764ba2); color: white; padding: 16px; border: none; border-radius: 8px; font-size: 16px; font-weight: 500; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);">
                Add Account
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 25px;">
        <button type="submit" name="register" 
                onclick="window.location.href='<?php echo site_url('admin/dashboard'); ?>'"
                style="background: linear-gradient(to right,rgb(224, 24, 18),rgb(173, 159, 32)); color: white; padding: 16px; border: none; border-radius: 8px; font-size: 16px; font-weight: 500; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);">
                Cancel
            </button>
        </div>
    </div>

    <script>
        // Enhanced field transitions
        document.getElementById('role-select').addEventListener('change', function() {
            const mahasiswaFields = document.getElementById('mahasiswa-fields');
            if (this.value === 'mahasiswa') {
                mahasiswaFields.style.display = 'block';
                mahasiswaFields.style.opacity = '0';
                setTimeout(() => {
                    mahasiswaFields.style.opacity = '1';
                    mahasiswaFields.style.transition = 'opacity 0.3s ease-in-out';
                }, 50);
            } else {
                mahasiswaFields.style.opacity = '0';
                setTimeout(() => {
                    mahasiswaFields.style.display = 'none';
                }, 300);
            }
        });

        // Add focus effects to all inputs
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('focus', function() {
                this.style.borderColor = '#667eea';
                this.style.boxShadow = '0 0 0 3px rgba(102, 126, 234, 0.1)';
            });
            element.addEventListener('blur', function() {
                this.style.borderColor = '#e2e8f0';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>