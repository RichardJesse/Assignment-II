<?php


trait NeedsAuthentication
{
    use HasPageActions;
    use NeedsDatabase;


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
    
    /**
     * Verifies if the code that the code exists
     * 
     * @param $code
     * 
     */
    public function verifyCode($code){
        $sql = "SELECT id FROM users WHERE activation_code = :code LIMIT 1";

        $db = $this->connectDatabase();
    
        try {
            $stmt = $db->prepare($sql); 
            $stmt->bindParam(':code', $code, PDO::PARAM_STR); 
            $stmt->execute(); 
    
           
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
           
            return $user ? true : false;
        } catch (PDOException $e) {
            
            error_log("Database error: " . $e->getMessage());
            return false; 
        }
    }


}