<?php

class Toast
{
    /**
     * Skeleton Content for the toast
     * @return void
     */
    public function content(){
        ?>
        <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
            <div id="toast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" id="toast-message">

                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

      <?php
    }

}
