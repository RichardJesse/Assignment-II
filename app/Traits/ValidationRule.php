<?php

trait ValidationRule {


     /**
     * Evaluates if a password meets specified rules.
     *
     * @param string $password The password to evaluate.
     * @return array An array containing the evaluation result and messages.
     */
    function evaluatePassword($password)
    {

        $result = [
            'isValid' => true,
            'messages' => []
        ];


        if (strlen($password) < 8) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must be at least 8 characters long.";
        }


        if (!preg_match('/[A-Z]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one uppercase letter.";
        }


        if (!preg_match('/[a-z]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one lowercase letter.";
        }


        if (!preg_match('/[0-9]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one number.";
        }


        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one special character.";
        }

        return $result;
    }

     /**
     * Validates if the email is in the correct format.
     *
     * @param string $email The email to validate.
     * @return bool Returns true if the email is valid, false otherwise.
     */
    function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    /**
     * Validates if the username follows specific format rules.
     *
     * @param string $username The username to validate.
     * @return array An array containing the evaluation result and messages.
     */
    function validateUsername($username)
    {
        $result = [
            'isValid' => true,
            'messages' => []
        ];


        if (strlen($username) < 4 || strlen($username) > 20) {
            $result['isValid'] = false;
            $result['messages'][] = "Username must be between 4 and 20 characters.";
        }


        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            $result['isValid'] = false;
            $result['messages'][] = "Username can only contain letters, numbers, and underscores.";
        }

        return $result;
    }



}