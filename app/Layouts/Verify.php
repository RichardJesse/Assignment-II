<?php


class Verify
{

    public function content($content)
    {
        ob_start();
?>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <?php echo $content; ?>

        </div>


<?php

        return ob_get_clean();
    }
}
