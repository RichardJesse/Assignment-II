<?php

class Activate
{

    public function content($email)
    {
        ob_start();
?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow rounded-4" style="width: 70vw; height: 70vh;">

                <div class="card-body  d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <iframe src="https://lottie.host/embed/7f895a1f-e19c-4fce-b7db-e8cc43f2c05e/7mP4wDQVah.json"></iframe>
                    </div>
                    <div class="display-6 text-center" style="font-family: SUSE;">

                       A verification email has been sent to <span class="fw-bolder text-info"><?php echo $email ?></span>

                    </div>
                    <div class="text-secondary fs-5 ">
                            Follow the steps there to complete your registration
                    </div>
                </div>
            </div>
        </div>
<?php
        return ob_get_clean();
    }
}
