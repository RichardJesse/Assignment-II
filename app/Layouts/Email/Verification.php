<?php

class Verification
{
    public function content($activationLink, $username)
    {
        ob_start();
?>
        <!DOCTYPE html>
        <html>

        <head>

            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <title>Email Confirmation</title>

            <style type="text/css">
                /**
                 * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
                 */
                @media screen {
                    @font-face {
                        font-family: 'Source Sans Pro';
                        font-style: normal;
                        font-weight: 400;
                        src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
                    }

                    @font-face {
                        font-family: 'Source Sans Pro';
                        font-style: normal;
                        font-weight: 700;
                        src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
                    }
                }

                /**
                 * Avoid browser level font resizing.
                 * 1. Windows Mobile
                 * 2. iOS / OSX
                 */
                body,
                table,
                td,
                a {
                    -ms-text-size-adjust: 100%;
                    /* 1 */
                    -webkit-text-size-adjust: 100%;
                    /* 2 */
                }

                /**
                 * Remove extra space added to tables and cells in Outlook.
                 */
                table,
                td {
                    mso-table-rspace: 0pt;
                    mso-table-lspace: 0pt;
                }

                /**
                 * Better fluid images in Internet Explorer.
                 */
                img {
                    -ms-interpolation-mode: bicubic;
                }

                /**
                 * Remove blue links for iOS devices.
                 */
                a[x-apple-data-detectors] {
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    color: inherit !important;
                    text-decoration: none !important;
                }

                /**
                 * Fix centering issues in Android 4.4.
                 */
                div[style*="margin: 16px 0;"] {
                    margin: 0 !important;
                }

                body {
                    width: 100% !important;
                    height: 100% !important;
                    padding: 0 !important;
                    margin: 0 !important;
                }

                /**
                 * Collapse table borders to avoid space between cells.
                 */
                table {
                    border-collapse: collapse !important;
                }

                a {
                    color: #1a82e2;
                }

                img {
                    height: auto;
                    line-height: 100%;
                    text-decoration: none;
                    border: 0;
                    outline: none;
                }
            </style>

        </head>

        <body style="background-color: #e9ecef;">


            <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
                Time to verify your account today and start living the life you dream of.
            </div>



            <table border="0" cellpadding="0" cellspacing="0" width="100%">


                <tr>
                    <td align="center" bgcolor="#e9ecef">

                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                            <tr>
                                <td align="center" valign="top" width="600">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td align="center" valign="top" style="padding: 36px 24px;">
                                                <a href="https://www.blogdesire.com" target="_blank" style="display: inline-block;">
                                                    <iframe src="https://lottie.host/embed/0e79806a-2936-4fec-9588-9072b9235f22/wFnUGCMjRH.json"></iframe>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <tr>
                    <td align="center" bgcolor="#e9ecef">

                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                            <tr>
                                <td align="center" valign="top" width="600">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                        <tr>
                                            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                                                <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Verifiy your email address, <?php echo $username ?></h1>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>



                <tr>
                    <td align="center" bgcolor="#e9ecef">

                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                            <tr>
                                <td align="center" valign="top" width="600">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">


                                        <tr>
                                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                                <p style="margin: 0;">Tap the button below to confirm your email address. If you didn't create an account with <a href="http://localhost/Assignment-II/app/signUp">Paste</a>, you can safely delete this email.</p>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td align="left" bgcolor="#ffffff">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                                                        <a href="<?php echo $activationLink; ?>" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Activate Account</a>
                                                                    </td>
                                                                </tr>
                                                                </t able>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                                <p style="margin: 0;">If that doesn't work, copy and paste the following link in your browser:</p>
                                                <p style="margin: 0;"><a href="<?php echo $activationLink; ?>" target="_blank"><?php echo $activationLink; ?></a></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
                                                <p style="margin: 0;">Cheers,<br> Paste</p>
                                            </td>
                                        </tr>


                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <td align="center" bgcolor="#e9ecef" style="padding: 24px;">

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">


                                        <tr>
                                            <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                                <p style="margin: 0;">You received this email because we received a request for activation for your account. If you didn't request to create an account you can safely delete this email.</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                                <p style="margin: 0;">To stop receiving these emails, you can <a href="random page" target="_blank">unsubscribe</a> at any time.</p>
                                                <p style="margin: 0;">Madaraka Ole Sangale Road</p>
                                            </td>
                                        </tr>


                                    </table>

                                </td>
                            </tr>


                        </table>


        </body>

        </html>

<?php
        return ob_get_clean();
    }
}
