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
        $sql = "SELECT * FROM users WHERE activation_code = :code LIMIT 1";

        $db = $this->connectDatabase();
    
        try {
            $stmt = $db->prepare($sql); 
            $stmt->bindParam(':code', $code, PDO::PARAM_STR); 
            $stmt->execute(); 
    
        
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                if($user['activated'] == 1){
                    return false;
                }
                $this->updateActivationStatus($user['id'], 1);
                return true;
            }
            else{
                return false;
            }
            
        } catch (PDOException $e) {
            
            error_log("Database error: " . $e->getMessage());
            return false; 
        }
    }


     /**
     * Updates the activation status the specified user ID.
     *
     * @param int $userId
     * @param int $status
     */
    private function updateActivationStatus($userId, $status)
    {
        $sql = "UPDATE users SET activated = :status WHERE id = :id";
        $db = $this->connectDatabase();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error updating activation status: " . $e->getMessage());
        }
    }


}