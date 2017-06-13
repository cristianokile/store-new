<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>RBC Global Business | Formulário de Contato</title>
	<meta charset="UTF-8"/>
	<?php session_start(); ?>
	<link href="css/msgBoxLight.css" rel="stylesheet"> 
	<script src="js/jquery-3.1.1.min.js"></script>
  	<script src="js/jquery.msgBox.js"></script>
</head>
<body>
<div style='display:block; height: 480px; width: 640px;'></div>	

<?php 
if(isset($_POST['contato-nome'])){
		$contato_nome = $_POST['contato-nome'];
};
if(isset($_POST['contato-telefone'])){
		$contato_telefone = $_POST['contato-telefone'];
};
if(isset($_POST['contato-email'])){
		$contato_email = $_POST['contato-email'];
}; 
if(isset($_POST['contato-messagem'])) {
		$contato_mensagem = $_POST['contato-messagem'];
}; ?>
S
<?php  $cart_box = "
	<table style='width: 50%; margin: auto; border: 1px solid black; border-collapse: collapse;'>
		<tr>
			<td colspan='2' style='text-align: center; padding: 10px;'><strong>INFORMAÇÕES DE CONTATO</strong></td>
		</tr>
		<tr>
			<td style='width: 20%; border: 1px solid black; border-collapse: collapse; padding: 10px;'><strong>Nome</strong></td>
			<td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> $contato_nome </td>
		</tr>
		<tr>
			<td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'><strong>Telefone</strong></td>
			<td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> $contato_telefone </td>
		</tr>
		<tr>
			<td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'><strong>E-mail</strong></td>
			<td style='border: 1px solid black; border-collapse: collapse; padding: 10px;'> $contato_email </td>
		</tr>
		<tr>
			<td colspan='2' style='text-align: center; border: 1px solid black; border-collapse: collapse; padding: 10px;'><strong>Mensagem</strong></td>
		</tr>
		<tr>
			<td style='border: 1px solid black; border-collapse: collapse;' colspan='2' padding: 10px;>$contato_mensagem</td>
		</tr>
	</table>
"?>


<?php // -------------------- ?>


<?php 
$mailbody = null;
$mailbody = $cart_box; ?>	

		
	</table>


<?php 
// ENVIO DE E-MAIL
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.chiapadesign.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cristiano@chiapadesign.com.br';                 // SMTP username
$mail->Password = '5sydkzavg2ckcg99';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('cristiano@chiapadesign.com.br', 'RBC Global Business');
//$mail->addAddress('bruno.carvalho@rbcglobalbusiness.com', 'Bruno Carvalho');     // Add a recipient
$mail->addAddress('bruno.carvalho@rbcglobalbusiness.com', 'Bruno Carvalho');     // Add a recipient
$mail->addReplyTo(" ' " . $form_email . " ' ", " ' " . $form_nome. " ' ");
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'RBC - Formul&aacute;rio de Contato';
$mail->Body    = $mailbody;

if(!$mail->send()) { ?>
    
    <script type="text/javascript">
		$(document).ready(function(){
			jQuery.msgBox({
				title: "Falha ao Enviar!",
				content: "Por favor, revise as informações preenchidas.<br><small><?php echo 'Código do Erro: ' . $mail->ErrorInfo; ?></small>",
				showButtons: false,
				autoClose:false
			});
			setTimeout(function() {
				history.back();
			}, 5000);
		}); 
			
	</script> 

<?php } else { ?>

	<script type="text/javascript">
		$(document).ready(function(){
			jQuery.msgBox({
				title: "Mensagem Enviada!",
				content: "Recebemos a sua mensagem! Assim que possível, entraremos em contato.",
				showButtons: false,
				autoClose:false
			});
		}); 
		setTimeout(function() {
			history.back();
		}, 5000);
	</script> 
	<?php
		session_destroy();
	?>
    
<?php } ?>



</body>
</html>
