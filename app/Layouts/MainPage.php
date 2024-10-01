<?php

class MainPage
{
    public function content($extraContent = null)
    {
?>
        <?php echo $this->navigation() ?>
        


        <div id="loader">
            <div class="d-flex flex-column justify-content-center align-items-center vh-100">

                <iframe src="https://lottie.host/embed/f20f336c-0bf3-4263-86da-546b86efbc4a/rUYtruOTX8.json">
                    <span style="font-family: SUSE">
                        Loading.....

                    </span>
                </iframe>




            </div>
        </div>

        <?php echo  $this->loadProfileModal();  ?>
        <script>
            setInterval(function() {
                document.getElementById('loader').style.display = 'none';;
                document.getElementById('table-container').style.display = 'block';
            }, 3000);
        </script>

        <?php
        echo $extraContent
        ?>


    <?php
        return ob_get_clean();
    }

    public function profileSection()
    {
        $user = new \Entities\User();

        return  $user->current();
    }

    public function loadProfileModal()
    {
        $modal = new Modal();
        $profileView = new UserProfile();
        $currentUser =  $this->profileSection();
        $modalContent = $profileView->content($currentUser);

        return $modal->content($modalContent, "Your Profile");
    }



    public function navigation()
    {
        ob_clean()
    ?>
        <nav class="navbar navbar-expand-lg bg-light shadow">
            <div class="container-fluid">
                <div class="display-5" style="font-family: SUSE">


                    <strong class="text-info "><?php echo $this->profileSection()['username'] ?></strong>

                </div>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-center align-center">

                        <!--                        <li class="nav-item">-->
                        <!--                            <a class="nav-link" href="#">Features</a>-->
                        <!--                        </li>-->
                        <!--                        <li class="nav-item">-->
                        <!--                            <a class="nav-link" href="#">Pricing</a>-->
                        <!--                        </li> -->
                    </ul>
                    <div class="p-3 btn  rounded-full" style="font-family: SUSE;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> profile</div>
                    <span class="navbar-text">


                        <form action="logout.php" method="post">
                            <button type="submit" class="btn btn-info hover-btn-outline"><span style="font-family: SUSE">Logout</span></button>
                        </form>
                    </span>
                </div>
            </div>
        </nav>


        
<?php
        return ob_get_clean();
    }
}
