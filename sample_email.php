<?php require($_SERVER['DOCUMENT_ROOT']."/mail/phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');
function sentMail($email_receiver){
	$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "jamorn.pe@kmitl.ac.th"; // gmail ที่ใช้ส่ง
$gmail_password = "Ja20093004"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "IT Support Science@KMITL"; // ชื่อผู้ส่ง
$email_sender = "noreply@kmitl.ac.th"; // เมล์ผู้ส่ง 
// $email_receiver = "sakda.tr@kmitl.ac.th"; // เมล์ผู้รับ ***

$subject = "ใบประกาศ"; // หัวข้อเมล์


$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title>ทดสอบการส่ง Email</title>
		</head>
		<body>
			
			<div style='padding:20px;'>
				
					<img src='https://www.science.kmitl.ac.th/apiUpload/newsPicture/iFvgKUJqL5KP1651216592872/fT4ydrDcuWr31651216592887.png' style='width:100%' />					
				
				<div style='margin-top:30px;'>
					<hr>
					<address>
						<h4>ติดต่อสอบถาม</h4>
						<p>Apple Thailand</p>
						<p>www.facebook.com/apple</p>
					</address>
				</div>
			</div>
			<div style='background: #3b434c;color: #a2abb7;padding:30px;'>
				<div style='text-align:center'> 
					2016 © Apple Thailand
				</div>
			</div>
		</body>
	</html>
";

//  ถ้ามี email ผู้รับ
if($email_receiver){
	$mail->msgHTML($email_content);


	if (!$mail->send()) {  // สั่งให้ส่ง email

		// กรณีส่ง email ไม่สำเร็จ
		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
	}else{
		// กรณีส่ง email สำเร็จ
		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
	}	
}
}




?>