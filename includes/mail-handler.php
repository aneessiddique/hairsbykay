<?php

// Email Configuration Variables
$smtp_email = 'okaynaat@gmail.com'; // Main recipient email
$cc_email = 'owais3011@gmail.com'; // CC recipient

// Email Template Styles
$emailStyles = "
<style>
    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        color: #333333;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .email-container {
        max-width: 600px;
        margin: 20px auto;
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .email-header {
        background: #2c3e50;
        color: #ffffff;
        padding: 20px;
        text-align: center;
    }
    .email-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }
    .email-body {
        padding: 30px;
    }
    .info-section {
        background: #f8f9fa;
        border-radius: 6px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .info-row {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
    }
    .info-label {
        font-weight: 600;
        color: #2c3e50;
        width: 120px;
        flex-shrink: 0;
    }
    .info-value {
        color: #555555;
        flex-grow: 1;
    }
    .email-footer {
        background: #f8f9fa;
        padding: 20px;
        text-align: center;
        font-size: 14px;
        color: #666666;
        border-top: 1px solid #eeeeee;
    }
    .highlight {
        color: #e74c3c;
        font-weight: 600;
    }
</style>
";

function handleAppointment($data)
{
    global $smtp_email, $cc_email, $emailStyles;

    $subject = 'New Appointment Request - HairsByKay';

        $body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>New Appointment Request</title>
            $emailStyles
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h2>New Appointment Request</h2>
                </div>
                <div class='email-body'>
                    <div class='info-section'>
                        <div class='info-row'>
                            <div class='info-label'>Name:</div>
                            <div class='info-value'>{$data['name']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Email:</div>
                            <div class='info-value'>{$data['email']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Phone:</div>
                            <div class='info-value'>{$data['phone']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Service:</div>
                            <div class='info-value highlight'>{$data['service']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Date:</div>
                            <div class='info-value highlight'>{$data['date']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Time:</div>
                            <div class='info-value highlight'>{$data['time']}</div>
                        </div>
                    </div>";

        if (!empty($data['notes'])) {
            $body .= "
                    <div class='info-section'>
                        <div class='info-row'>
                            <div class='info-label'>Special Requests:</div>
                            <div class='info-value'>{$data['notes']}</div>
                        </div>
                    </div>";
        }

        $body .= "
                </div>
                <div class='email-footer'>
                    <p>This is an automated message from HairsByKay. Please do not reply directly to this email.</p>
                </div>
            </div>
        </body>
        </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: HairsByKay <{$smtp_email}>\r\n";
    $headers .= "Reply-To: {$data['email']}\r\n";
    $headers .= "Cc: {$cc_email}\r\n";

    $success = mail($smtp_email, $subject, $body, $headers);

    if ($success) {
        return [
            'status' => 'success',
            'message' => 'Your appointment request has been sent successfully!'
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Sorry, there was an error sending your request.'
        ];
    }
}

function handleContact($data)
{
    global $smtp_email, $cc_email, $emailStyles;

    $subject = 'New Contact Form Submission - HairsByKay';

        $body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>New Contact Form Submission</title>
            $emailStyles
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h2>New Contact Form Submission</h2>
                </div>
                <div class='email-body'>
                    <div class='info-section'>
                        <div class='info-row'>
                            <div class='info-label'>Name:</div>
                            <div class='info-value'>{$data['name']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Email:</div>
                            <div class='info-value'>{$data['email']}</div>
                        </div>
                        <div class='info-row'>
                            <div class='info-label'>Phone:</div>
                            <div class='info-value'>{$data['phone']}</div>
                        </div>
                    </div>
                    <div class='info-section'>
                        <div class='info-row'>
                            <div class='info-label'>Message:</div>
                            <div class='info-value'>{$data['message']}</div>
                        </div>
                    </div>
                </div>
                <div class='email-footer'>
                    <p>This is an automated message from HairsByKay. Please do not reply directly to this email.</p>
                </div>
            </div>
        </body>
        </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: HairsByKay <{$smtp_email}>\r\n";
    $headers .= "Reply-To: {$data['email']}\r\n";
    $headers .= "Cc: {$cc_email}\r\n";

    $success = mail($smtp_email, $subject, $body, $headers);

    if ($success) {
        return [
            'status' => 'success',
            'message' => 'Your message has been sent successfully!'
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Sorry, there was an error sending your message.'
        ];
    }
}
