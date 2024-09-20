<?php


trait NeedsAuthentication
{
    use HasPageActions;


    /**
     * Checks If the user is logged in
     *
     * @param $sessionVariable
     * @param $redirectPage
     * @return true
     */
    public function isLoggedIn($sessionVariable, $redirectPage){

        if(!$this->isInSession($sessionVariable)){
            $this->redirect($redirectPage);
        }

        return true;


    }

    /**
     * Checks If user is in session
     *
     * @param $sessionVariable
     * @return bool
     */
    public function isInSession($sessionVariable){

        if (!isset($_SESSION[$sessionVariable])) {
            return false;
        }

        return true;
    }

}