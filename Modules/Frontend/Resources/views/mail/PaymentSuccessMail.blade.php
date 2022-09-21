<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        @font-face {
            font-family: &#x27;
            Postmates Std&#x27;
            ;
            font-weight: 600;
            font-style: normal;
            src: local(&#x27; Postmates Std Bold&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-bold.woff) format(&#x27; woff&#x27; );
        }

        @font-face {
            font-family: &#x27;
            Postmates Std&#x27;
            ;
            font-weight: 500;
            font-style: normal;
            src: local(&#x27; Postmates Std Medium&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-medium.woff) format(&#x27; woff&#x27; );
        }

        @font-face {
            font-family: &#x27;
            Postmates Std&#x27;
            ;
            font-weight: 400;
            font-style: normal;
            src: local(&#x27; Postmates Std Regular&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-regular.woff) format(&#x27; woff&#x27; );
        }
    </style>
    <style media="screen and (max-width: 680px)">
        @media screen and (max-width: 680px) {
            .page-center {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .footer-center {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }
    </style>
</head>

<body style="background-color: #f4f4f5;">
    <table cellpadding="0" cellspacing="0"
        style="width: 100%; height: 100%; background-color: #f4f4f5; text-align: center;padding:50px 0; ">
        <tbody>
            <tr>
                <td style="text-align: center;">
                    <table align="center" cellpadding="0" cellspacing="0" id="body"
                        style="background-color: #fff; width: 100%; max-width: 680px; height: 100%;">
                        <tbody>
                            <tr>
                                <td>
                                    <table align="center" cellpadding="0" cellspacing="0" class="page-center"
                                        style="text-align:center;padding-top: 33px;padding-bottom: 45px; width: 100%; padding-left: 75px; padding-right: 75px;">
                                        <tbody>
                                            <tr>
                                                <td style="color: #6a78c7;font-family: ui-monospace;font-size: 40px;font-style: normal;font-weight: 600;line-height: 40px;text-decoration: none;text-align: center;">Odda </td>
                                            </tr>
                                             <tr>
                                                {!! $emailContent !!}
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="padding-top: 22px; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; color: #000000; font-size: 28px; font-smoothing: always; font-style: normal; font-weight: 600; line-height: 40px; mso-line-height-rule: exactly; text-decoration: none;text-align: center;">Your Payment is Successfully Completed.</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top: 17px; padding-bottom: 20px;">
                                                    <table cellpadding="0" cellspacing="0" style="width: 100%">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="width: 100%; height: 1px; max-height: 1px; background-color: #d9dbe0; opacity: 0.81">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
