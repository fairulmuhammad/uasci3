<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body style="font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f7fb; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 30px; background-color: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 2px solid #eef2f7;">
            <h1 style="margin: 0; color: #2c3e50; font-size: 28px;">Edit User</h1>
            <a href="<?php echo site_url('admin/dashboard'); ?>" 
               style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 14px; transition: background-color 0.3s;">
                Back to Dashboard
            </a>
        </div>

        <form action="<?php echo base_url('index.php/admin/edit_user/'. $user->id); ?>" method="post" style="display: flex; flex-direction: column; gap: 20px;">
            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
            
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <label for="username" style="font-weight: 600; color: #2c3e50;">Username:</label>
                <input type="text" 
                       id="username" 
                       name="username" 
                       value="<?php echo $user->username; ?>" 
                       required 
                       style="padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; outline: none; transition: border-color 0.3s;">
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <label for="password" style="font-weight: 600; color: #2c3e50;">Password:</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       style="padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; outline: none; transition: border-color 0.3s;">
                <small style="color: #6c757d; font-size: 12px; margin-top: 4px;">Leave blank if you don't want to change the password</small>
            </div>
            
            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" 
                        style="background-color: #28a745; color: white; padding: 12px 24px; border: none; border-radius: 5px; cursor: pointer; font-size: 14px; transition: background-color 0.3s;">
                    Update User
                </button>
                <a href="<?php echo site_url('admin/dashboard'); ?>" 
                   style="background-color: #6c757d; color: white; padding: 12px 24px; border: none; border-radius: 5px; text-decoration: none; font-size: 14px; transition: background-color 0.3s;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</body>
</html>
