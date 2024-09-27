<?php


class SignUpForm
{
    /**
     *
     * Skeleton Content for the form
     *
     * @param $extraContent
     * @return void
     */
    public function content( $extraContent = null){
        ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow rounded-4" style="width: 70vw; height: 70vh;">
                <div class="card-body h-100">
                    <div class="row h-100">
                        <div class="col-6 d-flex flex-column justify-content-center align-items-center  h-100 ">
                            <div>
                                <iframe src="https://lottie.host/embed/13f0de12-14a3-4189-b97f-f74898728784/GzzfHG6Chi.json"></iframe>
                            </div>
                            <p style="font-family: SUSE" class="display-6">What are you waiting for?</p>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-center h-100 p-5">
                            <h1 style="font-family: SUSE" class="mb-3 text-center">Start Your Journey 😉</h1>

                            <form id="signup-form" class="w-100 align-items-center" method="post" action="signUp_logic.php">
                                <div class="form-floating mb-3 w-75 mx-auto">
                                    <input name="username" class="form-control rounded-pill focus-ring focus-ring-info" type="text" placeholder="Username" aria-label="Username" required>
                                    <label for="floatingInput">Username</label>
                                    <div id="username-error" class="text-danger"></div> 
                                </div>

                                <div class="form-floating mb-3 w-75 mx-auto">
                                    <input name="email" class="form-control rounded-pill focus-ring focus-ring-info" type="email" placeholder="Email" aria-label="Email" required>
                                    <label for="floatingInput">Email</label>
                                    <div id="email-error" class="text-danger"></div> 
                                </div>

                                <div class="form-floating mb-3 w-75 mx-auto">
                                    <input name="password" class="form-control rounded-pill focus-ring focus-ring-info" type="password" placeholder="Password" aria-label="Password" required>
                                    <label for="floatingInput">Password</label>
                                    <div id="password-error" class="text-danger"></div>
                                </div>

                                <div class="mb-3 w-75 mx-auto">
                                    <button type="submit" class="btn btn-outline-info w-100">Sign up</button>
                                </div>
                            </form>

                            <span style="font-family: SUSE" class="fs-5">Already signed up?
                        <a href="login.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login</a>
                    </span>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        echo $extraContent
        ?>

        <script src="./js/SignUp.js"></script>

        <?php
    }


}