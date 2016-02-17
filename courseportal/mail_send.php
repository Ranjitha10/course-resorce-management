<?php
    
    require ('class.phpmailer.php');
                        $mail = new PHPMailer(); // create a new object
                        $mail->IsSMTP(); // enable SMTP
                         // debugging: 1 = errors and messages, 2 = messages only
                        $mail->SMTPAuth = true; // authentication enabled
                        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 587; // or 465
                        $mail->IsHTML(false);
                        $mail->Username = "noreplycourseportal@gmail.com";
                        $mail->Password = "courseportal";
                        //$mail->WordWrap = 50;
                        $mail->Subject = $_POST['name'];
						//$mail->Subject = "Pradeep";
					//	$mail->Body = "Working ah?";
                       $mail->Body = $_POST['message'];
                       // $idee = "vivekv573@gmail.com";
						//echo $_POST['name']."<br>";
						
						
                        $mail->AddAddress("pragav94@gmail.com");
                        if(!@$mail->Send())
                        {
                            echo "<script> alert(\"' Error! mail could not be sent because '.$mail->ErrorInfo\"); </script>";
                            header('Refresh:1,url= index.php');
                        }
                        else
                        {
                            echo "<script> alert(\"Message Sent\"); </script>";
                           // header('Refresh:1,url= index.php');
                        }
                   

?>
