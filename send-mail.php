<?php
// PHPMailer setup for Hostinger SMTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendors/phpmailer/src/Exception.php';
require 'assets/vendors/phpmailer/src/PHPMailer.php';
require 'assets/vendors/phpmailer/src/SMTP.php';

header('Content-Type: application/json');

$to = 'jyoti@wegotem.in';
$cc = 'deepak@wegotem.in';
$uploadDir = __DIR__ . '/resume/';

$response = ['success' => false, 'message' => 'Unknown error'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : '';
    $mail = new PHPMailer(true);
    try {
        // SMTP config
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@wegotem.in';
        $mail->Password = 'Contact@wegotem25';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('contact@wegotem.in', 'WeGotEm Enquiry');
        $mail->addAddress($to);
        $mail->addCC($cc);


        // Color theme variables
        $primary = '#ff002a';
        $heading = '#062a26';
        $bodycolor = '#6a726f';
        $bg = '#fff';

        if ($formType === 'employee') {
            $mail->Subject = 'WeGotEm: New Job Seeker Application Received';
            $body = '<div style="background:'.$bg.';border-radius:10px;padding:32px 24px;font-family:Outfit,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;">
                <div style="text-align:center;margin-bottom:24px;">
                    <img src="https://wegotem.in/assets/images/resources/logo-2.png" alt="WeGotEm" style="height:48px;">
                </div>
                <h2 style="color:'.$primary.';font-family:Outfit,sans-serif;margin-bottom:8px;">New Job Seeker Enquiry</h2>
                <p style="color:'.$bodycolor.';margin-bottom:24px;">A new job seeker has submitted their details. Please find the information below:</p>
                <table style="width:100%;border-collapse:collapse;">
                    <tr><td style="color:'.$heading.';padding:6px 0;width:180px;"><b>Name:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_fname']).' '.htmlspecialchars($_POST['form_lName']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Email:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_email']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Mobile:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_mobile']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Address:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_address']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Education:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_education']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Skills:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_skills']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Experience:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_experience']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Personal Qualities:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_pqualities']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Additional Info:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_message']).'</td></tr>
                </table>
                <div style="margin-top:32px;text-align:center;color:'.$primary.';font-size:15px;">WeGotEm Job Consultancy</div>
            </div>';
        } elseif ($formType === 'employer') {
            $mail->Subject = 'WeGotEm: New Employer Job Listing Received';
            $body = '<div style="background:'.$bg.';border-radius:10px;padding:32px 24px;font-family:Outfit,sans-serif;max-width:600px;margin:auto;border:1px solid #eee;">
                <div style="text-align:center;margin-bottom:24px;">
                    <img src="https://wegotem.com/assets/images/resources/logo-2.png" alt="WeGotEm" style="height:48px;">
                </div>
                <h2 style="color:'.$primary.';font-family:Outfit,sans-serif;margin-bottom:8px;">New Employer Job Listing</h2>
                <p style="color:'.$bodycolor.';margin-bottom:24px;">A new employer has submitted a job listing. Please find the details below:</p>
                <table style="width:100%;border-collapse:collapse;">
                    <tr><td style="color:'.$heading.';padding:6px 0;width:180px;"><b>Company Name:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['company_name']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Website:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_website']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Industry:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_industry']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>State:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_state']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Address:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_address']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Contact Person:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_fname']).' '.htmlspecialchars($_POST['form_lname']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Landline:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_landline']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Mobile:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_mobile']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Email:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_email']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Specialisation:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_specialisation']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Position:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_position']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Location:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_location']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Pronoun:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_pronoun']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Pay Rate:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_rate']).'</td></tr>
                    <tr><td style="color:'.$heading.';padding:6px 0;"><b>Openings:</b></td><td style="color:'.$bodycolor.';">'.htmlspecialchars($_POST['form_openings']).'</td></tr>
                </table>
                <div style="margin-top:32px;text-align:center;color:'.$primary.';font-size:15px;">WeGotEm Job Consultancy</div>
            </div>';
        } else {
            throw new Exception('Invalid form type.');
        }
        $mail->isHTML(true);
        $mail->Body = $body;

        // Handle file upload (resume or job description) with validation
        $allowedExts = ['pdf','doc','docx','jpg','jpeg','png'];
        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/png',
            'image/jpg'
        ];
        if (!empty($_FILES)) {
            foreach ($_FILES as $file) {
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $filename = basename($file['name']);
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $type = $file['type'];
                    if (!in_array($ext, $allowedExts) || !in_array($type, $allowedTypes)) {
                        echo json_encode(['success' => false, 'file_error' => 'Invalid file type. Only PDF, DOC, DOCX, JPG, JPEG, PNG allowed.']);
                        exit;
                    }
                    if ($file['size'] > 5 * 1024 * 1024) {
                        echo json_encode(['success' => false, 'file_error' => 'File size must be less than 5MB.']);
                        exit;
                    }
                    $targetPath = $uploadDir . $filename;
                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $mail->addAttachment($targetPath);
                    }
                }
            }
        }
        $mail->send();
        $response = ['success' => true, 'message' => 'Your enquiry has been sent successfully!'];
    } catch (Exception $e) {
        $response = ['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo];
    }
}
echo json_encode($response);
