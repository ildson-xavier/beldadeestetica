 <?php   

    $passo = (isset($_GET['p'])) ? $_GET['p'] : "";
    switch ($passo) {
      case "cadContato":
        cadContato();
				break;
				
			case "cadEmail";
				cadEmail();
				break;
      
      default:
        getRetorno();
        break;
    }

    function getRetorno(){
      echo "getRetorno";
    }

    function cadContato(){      
		//Variaveis de POST, Alterar somente se necessário 
		//====================================================
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone']; 
		$mensagem = $_POST['mensagem'];
		//====================================================
		
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 
		$email_remetente = "machadopaiaro2@machadopaiaro.com.br"; // deve ser uma conta de email do seu dominio 
		//====================================================
		
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "machadopaiaro2@machadopaiaro.com.br"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "Solicitação de contato "; // Este será o assunto da mensagem
		//====================================================
		
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "Nome = $nome \n"; 
		$email_conteudo .= "Email = $email \n";
		$email_conteudo .= "Telefone = $telefone \n"; 
		$email_conteudo .= "Mensagem = $mensagem \n"; 
		//====================================================

		//Seta os Headers (Alerar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
		
		//Enviando o email 
		//==================================================== 
		if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
						echo "E-Mail enviado com sucesso!"; 
						} 
				else{ 
					echo "Desculpe, o envio do e-mail falhou"; 
				} 
		}
		
		function cadEmail(){

			$email = $_POST['email-chamada'];

			$email_remetente = "machadopaiaro2@machadopaiaro.com.br";

			$email_destinatario = "machadopaiaro2@machadopaiaro.com.br";
			$email_reply = "$email"; 
			$email_assunto = "Chamada de contato";

			$email_conteudo .= "Email = $email \n";

			$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
			
			if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
						echo "E-Mail enviado com sucesso!"; 
			} 
			else { 
						echo "Desculpe, o envio do e-mail falhou"; 
			} 
		}
  ?>

		