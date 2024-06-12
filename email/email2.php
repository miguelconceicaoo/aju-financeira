<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



//Load composer's autoloader
require 'vendor/autoload.php';

echo "<script>alert('E-mail enviado com sucesso!');location='../index.php'</script>";

$con = mysqli_connect("localhost:3307","root","","aju");

$nome = $_SESSION['nome'];
$tipo_servico = $_SESSION["tipo_servico"];
$email_cliente = $_SESSION["email_cliente"];
$status_servico = $_SESSION["status_servico"];



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try{
    //Server settings
    $mail->SMTPDebug = 2;  
                                  // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'aleluan2010@gmail.com';                 // SMTP username
    $mail->Password = 'sppayzohdfpgpmuh';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('aleluan2010@gmail.com', 'AJU Financeira');
    $mail->addAddress($email_cliente, $nome);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  

//----------------------------------------FINANCIAMENTO------------------------------------------------------------
    
if($tipo_servico == "financiamento" and $status_servico == "espera"){    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Financiamento em espera';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de financiamento foi cadastrada no sistema com sucesso!<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "financiamento" and $status_servico == "analise") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Financiamento dados em analise';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de financiamento estão em análise<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';

    $mail->AltBody = 'his is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "financiamento" and $status_servico == "reprovado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Financiamento reprovado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de financiamento foram reprovados<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "financiamento" and $status_servico == "andamento") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Financiamento em andamento';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de financiamento foram aprovados, seu serviço está em andamento<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "financiamento" and $status_servico == "finalizado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Financiamento finalizado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de financiamento foi finalizada com sucesso!<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//----------------------------------------REFINANCIAMENTO------------------------------------------------------------

}else if($tipo_servico == "refinanciamento" and $status_servico == "espera"){    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Refinanciamento em espera';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de refinanciamento foi cadastrada no sistema com sucesso!<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "refinanciamento" and $status_servico == "analise") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Refinanciamento dados em analise';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de refinanciamento estão em análise<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "refinanciamento" and $status_servico == "reprovado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Refinanciamento reprovado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de refinanciamento foram reprovados<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "refinanciamento" and $status_servico == "andamento") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Refinanciamento em andamento';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de refinanciamento foram aprovados, seu serviço está em andamento<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "refinanciamento" and $status_servico == "finalizado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Refinanciamento finalizado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de refinanciamento foi finalizada com sucesso!<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//----------------------------------------EMPRESTIMO----------------------------------------------------

}else if($tipo_servico == "emprestimo" and $status_servico == "espera"){    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Emprestimo em espera';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de empréstimo foi cadastrada no sistema com sucesso!<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "emprestimo" and $status_servico == "analise") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Emprestimo dados analise';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de empréstimo estão em análise<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "emprestimo" and $status_servico == "reprovado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Emprestimo reprovado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de empréstimo foram reprovados<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "emprestimo" and $status_servico == "andamento") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Emprestimo em andamento';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de empréstimo foram aprovados, seu serviço está em andamento<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "emprestimo" and $status_servico == "finalizado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Emprestimo finalizado';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de empréstimo foi finalizada com sucesso!<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//----------------------------------------ANTECIPACAO----------------------------------------------------

}else if($tipo_servico == "antecipacao" and $status_servico == "espera"){    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antecipacao de FGTS em espera';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de antecipação de FGTS foi cadastrada no sistema com sucesso!<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "antecipacao" and $status_servico == "analise") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antecipacao de FGTS dados em analise';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de antecipação de FGTS estão em análise<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "antecipacao" and $status_servico == "reprovado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antecipacao de FGTS reprovada';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de antecipação de FGTS foram reprovados<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "antecipacao" and $status_servico == "andamento") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antecipacao de FGTS em andamento';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Os dados da sua solicitação de antecipação de FGTS foram aprovados, seu serviço está em andamento<br><br>
    Manteremos você informado sobre o status de andamento do seu serviço<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

}else if($tipo_servico == "antecipacao" and $status_servico == "finalizado") {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antecipacao de FGTS finalizada';
    $mail->Body    = '"Olá '.$nome.'!<br><br>
    Sua solicitação de antecipação de FGTS foi finalizada com sucesso!<br><br>
    Caso alguma dúvida entre em contato conosco pelo telefone 79 9 9999-9999 ou pelo email aju_financeira@gmail.com<br><br>
    Atenciosamente, AJU Financeira."';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}


    $mail->send();
    
    echo 'E-mail enviado com sucesso!';
    $email_cliente=0;
    echo $email_cliente;
    

}catch(Exception $e){
    $email_cliente=0;
    echo 'E-mail não enviado.';
    echo 'Mailer Error: '.$mail->ErrorInfo;
}


