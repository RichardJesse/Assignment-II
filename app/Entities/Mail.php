<?php

namespace Entities;

class Mail
{
    use \CanSendEmail;

    /**
     * Send email using a html template
     *
     * @param $to
     * @param $subject
     * @param $html
     * @param $from
     * @param $attachments
     * @return string|true
     */
    public function sendMailWithTemplate($to, $subject, $html = '', $from = ''){

        return $this->mail()
           
            ->to($to)
            ->from($from)
            ->subject($subject)
            ->html($html)
            ->send();


    }

}