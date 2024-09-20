<?php

namespace Auth;

class Authenticator
{
   use \NeedsAuthentication;

    /**
     * Page Guard for authenticated user
     *
     * @param $sessionVariable
     * @param $redirectPage
     * @return void
     */
    public function restrictedPageGuard($sessionVariable, $redirectPage){
        if($this->isLoggedIn($sessionVariable, $redirectPage)){
            return;
        }
    }


}