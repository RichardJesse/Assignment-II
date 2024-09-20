<?php

// include_once __DIR__ . '/../../autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__ . '/../Constants/Constants.php';

trait CanSendEmail
{
    protected $mail;

    
    /**
     * instanciates the php mailer instance
     *
     * @return $this
     */
    public function mail()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = MAIL_HOST; 
        $this->mail->SMTPAuth = true;
        $this->mail->Username = MAIL_FROM_ADDRESS; 
        $this->mail->Password = PHPMAILER_APP_KEY; 
        $this->mail->SMTPSecure = SMTP_SECURE;
        $this->mail->Port = MAIL_PORT;
        $this->mail->SMTPDebug = 0; 
        $this->mail->Debugoutput = 'html'; 
        $this->mail->isHTML(true);

      
        return $this;

    }

    /**
     * set from who the email is from
     *
     * @param $email
     * @return $this
     */
    public function from($email)
    {

        $this->mail->setFrom($email);
        return $this;
    }

    /**
     * set who the email is going to
     *
     * @param $email
     * @return $this
     */
    public function to($email)
    {
        $this->mail->addAddress($email);
        return $this;
    }

     /**
     * Add a subject to the email
     *
     * @param $subject
     * @return $this
     */
    public function subject($subject)
    {
        $this->mail->Subject = $subject;
        return $this;
    }

     /**
     * makes the html in the file the body of the email
     *
     * @param $path
     * @return $this
     */
    public function html($content)
    {
        $this->mail->msgHTML($content);
        return $this;
    }

     /**
     * add an attachment to the email
     *
     * @param $path
     * @return $this
     */
    public function attach($path)
    {
        $this->mail->addAttachment($path);
        return $this;
    }

    /**
     * sends the email
     *
     * @return string|true
     */
    public function send()
    {
        try {
            if (!$this->mail->send()) {

                throw new Exception('Mailer Error: ' . $this->mail->ErrorInfo);
                return 'sent';
            }
            return true;
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

}