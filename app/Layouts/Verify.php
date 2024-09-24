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
            }, 2000); 
        </script>
    
        <?php
    }

    public function verificationFail(){
        echo "fail";

    }
}
