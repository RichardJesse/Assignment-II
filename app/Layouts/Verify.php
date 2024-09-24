<?php


class Verify
{

    use NeedsAuthentication;
   

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

    public function verificationSuccess(){

       echo "success";

    }

    public function verificationFail(){
        echo "fail";

    }
}
