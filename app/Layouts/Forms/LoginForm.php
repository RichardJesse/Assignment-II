<?php


class LoginForm
{
    /**
     * Skeleton Content for the form
     *
     * @param $extraContent
     * @return void
     */
    public function content($extraContent = null){
        ?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow rounded-4" style="width: 70vw; height: 70vh;">
                <div class="card-body h-100">
                    <div class="row h-100">
                        <div class="col-6 d-flex flex-column justify-content-center align-items-center  h-100 ">

                            <div>
                                <iframe src="https://lottie.host/embed/e6558aa6-da42-4375-9ec8-c988add719b9/OneBCviQLR.json"></iframe>
                            </div>
                            <p style="font-family: SUSE" class="display-6">Time To Make It Rain🤑</p>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-center  h-100 p-5" >


                            <h1 style="font-family: SUSE" class="mb-3 text-center"> Get In!</h1>

                            <form action="login_logic.php" method="post" class="w-100 align-items-center" id="login-form">

                                <div  class="form-floating mb-3 w-75 mx-auto">
                                    <input class="form-control rounded-pill  focus-ring focus-ring-info" type="email" placeholder="Default input" aria-label="default input example" name="email">
                                    <label for="floatingInput">Email</label>
                                    <div id="email-error" class="text-danger text-center"></div>
                                </div>


                                <div  class="form-floating mb-3  w-75 mx-auto">
                                    <input class="form-control rounded-pill  focus-ring focus-ring-info " type="password" placeholder="Default input" aria-label="default input example" name="password">
                                    <label for="floatingInput">password</label>
                                </div>

                                <div class=" mb-3  w-75 mx-auto">
                                    <button type="submit" class="btn btn-outline-info ">Log in</button>
                                </div>


                            </form>


                            <span style="font-family: SUSE" class="fs-5">Not Yet Signed Up?
                        <a href="signUp.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Sign Up<a/>
                    </span>


                        </div>
                    </div>
                </div>
            </div>
        <?php
        echo $extraContent
        ?>

        <script src="./js/Login.js"></script>

        <?php
    }




}
