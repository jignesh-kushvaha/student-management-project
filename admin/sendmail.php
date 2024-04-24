<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['btnsend']))
    {
        $emaildate=date('y-m-d');
        $emailto=$_POST['txtemailto'];
        $subject=$_POST['txtsubject'];
        $description=$_POST['txtdescription'];
        $query="insert into email(emaildate,emailto,subject,description) values('$emaildate','$emailto','$subject','$description')";
        $result=$dc->saveRecord($query);

        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'santinodantonio8866@gmail.com';
        $mail->Password = 'ujnqnkqudscbvyvy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom('santinodantonio8866@gmail.com');
        $mail->addAddress($_POST['txtemailto']);
        $mail->isHTML(true);
        $mail->Subject = $_POST['txtsubject'];
        $mail->Body = $_POST['txtdescription'];
        
        $mail->Send();

        echo
        "
        <script>
        alert('Send Successfully...');
        document.location.href = 'adminhome.php';
        </script>
        ";
    }
?>