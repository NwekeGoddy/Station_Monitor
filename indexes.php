<?
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//echo md5(sha1( "default" ));

function sendmail($to,$nameto,$subject,$htmlmess,$altmess="")  {
  $mail = new PHPMailer(true);

  try {

    $from = "info@velhect.com";
    // $from = "velhiywf@server250.web-hosting.com";
    $fromName = "Velhect";
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    //$mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.velhect.com';                    // Set the SMTP server to send through
    //$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //$mail->Username   = 'info@velhect.com';                     // SMTP username
    //$mail->Password   = 'Technical@123';                               // SMTP password
    $mail->SMTPSecure = "ssl";         
    $mail->Port       = 465; 
                     
    $mail->setFrom($from, $fromName);
    $mail->addAddress('detunj@gmail.com');     // Add a recipient
    $mail->addAddress($to,$nameto);     // Add a recipient
    
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = $subject;
    $mail->Body    = $htmlmess;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $result = $mail->send();
      
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      exit;
  }  

}

$to = "Idris@bequestmutual.com";
$nameto = "Hidee";
$subject = "Station Monitor API Details";
$title = "Velhect Support";
$message = '<p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Hi Laalaa,</em></em></p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Please use this link to access the API: <a href="www.velhect.com/station_monitor/api/request.php?sn=testing123&user=5c18a705dd6e85b850675864d79529a7" target="_blank">www.velhect.com/station_monitor/api/request.php?sn=testing123&user=5c18a705dd6e85b850675864d79529a7</a></em></em></p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Please replace value for "sn" in the API link with the serial number of the device you want to access its data, the user value will remain the same for now.</em></em></p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Sample format: {"ac":0,"dc":0,"down_time":0}. Note that the down_time vlue will be in seconds.</em></em></p>

    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;">&nbsp;</p><p style="font-weight:400;text-align:left;color: #000000;font-size: medium;">&nbsp;</p><p style="font-weight:400;text-align:left;color: #000000;font-size: medium;">&nbsp;</p><p style="font-weight:400;text-align:left;color: #000000;font-size: medium;">&nbsp;</p><p style="font-weight:400;text-align:left;color: #000000;font-size: medium;">&nbsp;</p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Warm regards,</em></em></p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>idris L. Adesina, Engr.</em></em></p>
    <p style="font-weight:400;text-align:left;color: #000000;font-size: medium;"><em><em>Velhect Support</em></em></p>
    ';
$htmlmess = "
        <div class='par' style ='background: rgba(250, 75, 20, 0.2);'>
            <div
                class='sub-par'
                style=\"
                    margin: auto;
                    display: block;
                    background: #ffffff;
                    padding: 5% 0;
                    color: #777;
                    max-width: 1074px;
                    width: calc(100% - 25%);
                    background-image: url('https://www.velhect.com/station_monitor/logo/velhect_watermark.png');
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;
                    background-origin: content-box;
                \">


                <div style='text-align: center;'><img src='https://www.velhect.com/station_monitor/logo/velhect_signature.png' alt='Velhect' width='100%' ></div>

                <div style='padding:5%; margin-bottom: calc(10% + 50px)'>
                    $message
                </div>

                <div style='padding:0 5%;position: absolute;bottom: 10%;width: inherit;'>
                    <hr>
                    <p style='font-weight:400;text-align:left;color:#000000;font-size:medium'><em><em>Footer </em></em></p>
                </div>

            </div>
        </div>
        ";
     sendmail($to,$nameto,$subject,$htmlmess,$altmess="");

?>


<head>
    
    <link rel="shortcut icon" href="./vel_logo.png" />

</head>
<style>
    body{
        margin:0;
    }
</style>
<div style="height:auto; min-height:100%; color: #444; margin:0;font: normal 14px/20px Arial, Helvetica, sans-serif; height:100%; background-color: #a7a7a740;">     <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%;">
    <!-- <h1 style="margin:0; font-size:150px; line-height:150px; font-weight:bold;">404</h1> -->
    <h2 style="margin-top:20px;font-size: 30px;">Unauthorized access
    </h2>
    
    <p>Sorry, no access</p>
     <h5> Please contact support</h5> 
     <a href='mailto:detunj@gmail.com?subject='>Access denied to Velhect.com/station_monitor
        <h3>Velhect Support</h3>
    </a> 
</div></div>

<?



?>