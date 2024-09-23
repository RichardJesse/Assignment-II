<?php

class Activate
{

    public function content($email)
    {
?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow rounded-4" style="width: 70vw; height: 70vh;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    A verification email has been sent to <?php echo $email ?>
                </div>
            </div>
        </div>
<?php
    }
}
