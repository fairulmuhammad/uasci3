<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Portal</title>
</head>
<body style="font-family: 'Segoe UI', Arial, sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); margin: 0; padding: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="background-color: #ffffff; width: 100%; max-width: 400px; padding: 40px; border-radius: 16px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); margin: 20px;">
        <div style="display: flex; flex-direction: column; align-items: center; gap: 24px;">
            <header style="text-align: center; margin-bottom: 10px;">
                <img src="<?php echo base_url('assets/images/logo_amikom_besar.png'); ?>" 
                     style="height: 80px; object-fit: contain;" 
                     alt="Logo" />
            </header>
            <?php if($this->session->flashdata('error')): ?>
            <div style="width: 100%; padding: 16px; margin: 8px 0; border-radius: 8px; background-color: #fee2e2; color: #991b1b; font-size: 14px; text-align: center; border: 1px solid #fecaca;">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>

            <form action="<?php echo site_url('Auth/login'); ?>" method="POST" style="width: 100%; display: flex; flex-direction: column; gap: 16px;">
                <div style="position: relative;">
                    <input type="text" 
                           name="nim" 
                           placeholder="Student ID Number (NIM)" 
                           required 
                           style="width: 100%; padding: 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                           onFocus="this.style.borderColor='#3b82f6'" 
                           onBlur="this.style.borderColor='#e5e7eb'" />
                </div>

                <div style="position: relative;">
                    <input type="password" 
                           name="password" 
                           placeholder="Password" 
                           required 
                           style="width: 100%; padding: 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                           onFocus="this.style.borderColor='#3b82f6'" 
                           onBlur="this.style.borderColor='#e5e7eb'" />
                </div>

                <button type="submit" 
                        style="width: 100%; padding: 14px; background: linear-gradient(to right, #3b82f6, #2563eb); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: transform 0.2s ease; margin-top: 8px;"
                        onMouseOver="this.style.transform='translateY(-1px)'" 
                        onMouseOut="this.style.transform='translateY(0)'">
                    Login
                </button>

            </form>

            <div style="width: 100%;">
                <!-- <button type="button"
                        style="width: 100%; padding: 14px; background-color: #fff; color: #059669; border: 2px solid #059669; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;"
                        onMouseOver="this.style.backgroundColor='#059669'; this.style.color='#fff'" 
                        onMouseOut="this.style.backgroundColor='#fff'; this.style.color='#059669'">
                    Register New Account
                </button> -->
                <button type="button" onclick="window.location.href='<?php echo site_url('Auth/register'); ?>'"
                        style="width: 100%; padding: 14px; background-color: #fff; color: #059669; border: 2px solid #059669; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;"
                        onMouseOver="this.style.backgroundColor='#059669'; this.style.color='#fff'" 
                        onMouseOut="this.style.backgroundColor='#fff'; this.style.color='#059669'">
                    Register New Account
                </button>
            </div>
        </div>
    </div>
</body>
</html>