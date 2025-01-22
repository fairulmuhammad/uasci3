<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Inter', system-ui, -apple-system, sans-serif; background: linear-gradient(135deg, #f0f7ff, #e0f2fe); margin: 0; padding: 20px; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div style="background-color: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); width: 100%; max-width: 440px; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #3b82f6, #2563eb);"></div>
        
        <h1 style="color: #1e3a8a; text-align: center; margin-bottom: 2rem; font-size: 1.875rem; font-weight: 700; letter-spacing: -0.025em;">Create Account</h1>

        <?php if ($this->session->flashdata('register_success')): ?>
        <div id="success-alert" style="background-color: #ecfdf5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; animation: fadeIn 0.5s; border: 1px solid #6ee7b7; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
            <i class="fas fa-check-circle"></i>
            <?php 
                echo $this->session->flashdata('register_success');
                echo "<script>
                        setTimeout(function() {
                            window.location.href = '".site_url('auth/login')."';
                        }, 3000);
                      </script>";
            ?>
            <div style="margin-top: 0.5rem; font-size: 0.875rem; color: #047857;">
                Redirecting to login page in 3 seconds...
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('register_error')): ?>
        <div style="background-color: #fef2f2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; border: 1px solid #fecaca; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo $this->session->flashdata('register_error'); ?>
        </div>
        <?php endif; ?>

        <form method="post" action='<?= site_url('auth/register'); ?>' style="display: flex; flex-direction: column; gap: 1.25rem;">
            <div style="position: relative;">
                <i class="fas fa-user" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                <input type="text" name="username" placeholder="Username" required
                    style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; outline: none; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s; box-sizing: border-box;"
                    onFocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                    onBlur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
            </div>

            <div style="position: relative;">
                <i class="fas fa-lock" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                <input type="password" name="password" placeholder="Password" required
                    style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; outline: none; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s; box-sizing: border-box;"
                    onFocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                    onBlur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
            </div>

            <div style="margin-bottom: 0.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-size: 0.875rem; font-weight: 500;">Select Role</label>
                <div style="position: relative;">
                    <i class="fas fa-user-tag" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                    <select name="role" id="role-select" required
                        style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; outline: none; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M19 9l-7 7-7-7\"/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1rem; cursor: pointer; box-sizing: border-box;"
                        onFocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                        onBlur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="dosen">Dosen</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div id="mahasiswa-fields" style="display: none; gap: 1.25rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-size: 0.875rem; font-weight: 500;">NIM</label>
                    <div style="position: relative;">
                        <i class="fas fa-id-card" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="nim"
                            style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; outline: none; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s; box-sizing: border-box;"
                            onFocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                            onBlur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
                    </div>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 0.5rem; color: #475569; font-size: 0.875rem; font-weight: 500;">Kelas</label>
                    <div style="position: relative;">
                        <i class="fas fa-chalkboard" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                        <input type="text" name="kelas"
                            style="width: 100%; padding: 0.875rem 1rem 0.875rem 2.5rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; outline: none; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s; box-sizing: border-box;"
                            onFocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)';"
                            onBlur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='0 1px 2px rgba(0, 0, 0, 0.05)';">
                    </div>
                </div>
            </div>

            <button type="submit" name="register"
                style="background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; padding: 1rem; border: none; border-radius: 8px; font-size: 0.875rem; font-weight: 500; cursor: pointer; transition: all 0.3s; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06)';">
                Create Account
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="<?php echo site_url('auth/login'); ?>"
                style="color: #4b5563; text-decoration: none; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 0.5rem; transition: color 0.3s;"
                onmouseover="this.style.color='#3b82f6';"
                onmouseout="this.style.color='#4b5563';">
                <i class="fas fa-arrow-left" style="font-size: 0.75rem;"></i>
                Already have an account? Login
            </a>
        </div>
    </div>

    <script>
        document.getElementById('role-select').addEventListener('change', function() {
            var mahasiswaFields = document.getElementById('mahasiswa-fields');
            mahasiswaFields.style.display = this.value === 'mahasiswa' ? 'flex' : 'none';
        });
    </script>
</body>
</html>