<?php

trait HasPageActions
{
    /**
     * Redirects user to another page
     *
     * @param $redirectPage
     * @return void
     */
    public function redirect($redirectPage){
        header("Location: " . $redirectPage);
        exit();
    }

    /**
     * Destroys the session and log out user
     *
     * @param $redirectPage
     * @return void
     */
    public  function logOut($redirectPage){
        session_destroy();
        $this->redirect($redirectPage);

    }

}
