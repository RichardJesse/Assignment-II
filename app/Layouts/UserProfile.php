<?php

class UserProfile
{

    public function content($currentUser)
    {
        ob_start();
        
?>
        <form id="signup-form" class="w-100 align-items-center" method="post" action="update_logic.php">
            
            <div class="form-floating mb-3 w-75 mx-auto">
                <input name="username" class="form-control focus-ring focus-ring-info" type="text" placeholder="Username" aria-label="Username" value="<?php echo $currentUser['username'] ?>" required>
                <label for="floatingInput">Username</label>     
            </div>

            <div class="form-floating mb-3 w-75 mx-auto">
                <input name="email" class="form-control  focus-ring focus-ring-info" type="email" placeholder="Email" aria-label="Email" value="<?php echo $currentUser['email'] ?>" required>
                <label for="floatingInput">Email</label>
                
            </div>

            <div class="form-floating mb-3 w-75 mx-auto">
                <input name="password" class="form-control  focus-ring focus-ring-info" type="password" placeholder="Password" aria-label="Password"  required>
                <label for="floatingInput">Password</label>
                
            </div>

            <div class="mb-3 w-75 mx-auto">
                <button type="submit" class="btn btn-outline-info w-100">Edit</button>
            </div>
        </form>

<?php
        return ob_get_clean();
    }
}
