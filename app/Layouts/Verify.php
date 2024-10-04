<?php


class Verify
{

    use NeedsAuthentication;
    use HasPageActions;
   

    public function content($code)
    {
        ob_start();
?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <?php $this->verifyActivationCode($code)?>

        </div>


<?php

        return ob_get_clean();
    }

    public function verifyActivationCode($code){
        
        if($this->verifyCode($code)){

            return $this->verificationSuccess();
        }

        return $this->verificationFail();

    }

    public function verificationSuccess() {
        ?>
    
        <div class="d-flex flex-column justify-content-center align-items-center">
            
            <iframe src="https://lottie.host/embed/3eef158f-c8ab-4ea9-9449-7ea876a4c2e7/0Af98jSGQT.json" style="border: none; width: 400px; height: 400px;"></iframe>
            
            
            <div class="display-4 text-success" style="font-family: SUSE;">
                Verified
            </div>
        </div>
    
       
        <script>
           
            setTimeout(function() {
                window.location.href = 'login.php'; 
            }, 3000); 
        </script>
    
        <?php
    }

    public function verificationFail(){
        ?>
    
        <div class="d-flex flex-column justify-content-center align-items-center">
            
        <iframe src="https://lottie.host/embed/42b1b8f7-d46a-4454-8f02-951c332c5df4/DZTMvu8L4L.json" style="border: none; width: 400px; height: 400px;"></iframe>
            
            
            <div class="display-4 text-danger" style="font-family: SUSE;">
                   Failed 

                   This link has already been used.
            </div>
        </div>
    
       
        
    
        <?php

    }
}
