<?php


class Activation 
{
    /**
     * Generates unique code of a specified length
     * 
     */
    public function generateCode($length = 6){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        
        
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charactersLength - 1);
            $code .= $characters[$randomIndex];
        }
        

        static $generatedCodes = [];
        while (in_array($code, $generatedCodes)) {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $randomIndex = mt_rand(0, $charactersLength - 1);
                $code .= $characters[$randomIndex];
            }
        }
        
        $generatedCodes[] = $code;
    


        return $code;

    }

}