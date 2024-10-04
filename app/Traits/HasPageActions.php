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
    public function logOut($redirectPage){
        session_destroy();
        $this->redirect($redirectPage);

    }


    /**
     * Allows users to redirect to another page and
     * pass data to that page through query parameters
     * 
     * @param $redirectPage
     * @param $redirectData
     * @return void
     * 
     */
    public function redirectWith($redirectPage, $redirectData){
       
        $data = http_build_query($redirectData);
        header("Location: " . $redirectPage . "?$data");
        exit();

    }

}
