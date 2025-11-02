<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados pessoais
    $nome = htmlspecialchars($_POST['Nome_Completo']);
    $cargo = htmlspecialchars($_POST['Cargo']);
    $email = htmlspecialchars($_POST['Email']);
    $telefone = htmlspecialchars($_POST['Telefone']);
    $empresa = htmlspecialchars($_POST['Empresa']);
    $tempo_empresa = htmlspecialchars($_POST['Tempo_na_Empresa']);
    
    // Coletar respostas das perguntas
    $q1 = intval($_POST['Q1_Fluxo_Definido']);
    $q2 = intval($_POST['Q2_Procedimentos']);
    $q3 = intval($_POST['Q3_Integracao_Areas']);
    $q4 = intval($_POST['Q4_Tempo_Monitorado']);
    $q5 = intval($_POST['Q5_Sistema_Atende']);
    $q6 = intval($_POST['Q6_Integracao_Sistema']);
    $q7 = intval($_POST['Q7_Controles_Estoque']);
    $q8 = intval($_POST['Q8_Indicadores']);
    $q9 = intval($_POST['Q9_Clareza_Lideres']);
    $q10 = intval($_POST['Q10_Engajamento']);
    $q11 = intval($_POST['Q11_Atuacao_Preventiva']);
    $q12 = intval($_POST['Q12_Valorizacao_Logistica']);
    $q13 = intval($_POST['Q13_Investimentos']);
    $q14 = intval($_POST['Q14_Ferramentas_Digitais']);
    $q15 = intval($_POST['Q15_Abertura_Inovacao']);
    
    // Coletar campos de texto
    $desafios = htmlspecialchars($_POST['Desafios_Principais']);
    $melhorias = htmlspecialchars($_POST['Melhorias_Urgentes']);
    $observacoes = htmlspecialchars($_POST['Observacoes_Adicionais']);
    
    // Calcular pontuação
    $pontuacao = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15;
    $iml = round(($pontuacao / 75) * 100);
    
    // Determinar nível
    if ($iml <= 40) {
        $nivel = "Inicial";
        $descricao = "Processos informais, controles manuais, foco operacional.";
        $cor = "#ff3333";
    } elseif ($iml <= 65) {
        $nivel = "Intermediário";
        $descricao = "Alguns controles e procedimentos, melhorias pontuais.";
        $cor = "#ffeb3b";
    } elseif ($iml <= 85) {
        $nivel = "Avançado";
        $descricao = "Processos padronizados, integração parcial, foco em eficiência.";
        $cor = "#1e90ff";
    } else {
        $nivel = "Excelência";
        $descricao = "Cultura logística consolidada, tecnologia integrada, visão estratégica.";
        $cor = "#28a745";
    }
    
    // Montar email formatado
    $assunto = "🎯 Nova Análise de Diagnóstico Logístico - " . $empresa;
    $mensagem = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                line-height: 1.6;
                color: #333;
                max-width: 800px;
                margin: 0 auto;
            }
            .header {
                background: linear-gradient(135deg, #0a1929 0%, #132f4c 100%);
                color: white;
                padding: 30px;
                text-align: center;
                border-radius: 8px 8px 0 0;
            }
            .header h1 {
                margin: 0;
                font-size: 28px;
            }
            .destaque { 
                background: {$cor};
                color: white; 
                padding: 20px;
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                margin: 20px 0;
                border-radius: 8px;
            }
            table { 
                border-collapse: collapse; 
                width: 100%; 
                margin: 20px 0;
                background: white;
            }
            th, td { 
                border: 1px solid #ddd; 
                padding: 12px; 
                text-align: left; 
            }
            th { 
                background-color: #0a1929; 
                color: white;
                font-weight: 600;
            }
            .secao {
                background: #f5f5f5;
                padding: 15px;
                margin: 20px 0;
                border-left: 4px solid #1e90ff;
                border-radius: 4px;
            }
            .secao h3 {
                margin-top: 0;
                color: #0a1929;
            }
            .footer {
                background: #f5f5f5;
                padding: 20px;
                text-align: center;
                margin-top: 30px;
                border-radius: 0 0 8px 8px;
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class='header'>
            <h1>📊 Diagnóstico de Maturidade Logística</h1>
            <p>JGM4 Consultoria Logística</p>
        </div>
        
        <div class='destaque'>
            🏆 Pontuação Total: {$iml}/100 pontos<br>
            Nível: {$nivel}
        </div>
        
        <div class='secao'>
            <h3>📋 Informações do Contato</h3>
            <table>
                <tr>
                    <th style='width: 30%;'>Nome</th>
                    <td>{$nome}</td>
                </tr>
                <tr>
                    <th>Cargo/Função</th>
                    <td>{$cargo}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{$email}</td>
                </tr>
                <tr>
                    <th>Telefone/WhatsApp</th>
                    <td>{$telefone}</td>
                </tr>
                <tr>
                    <th>Empresa</th>
                    <td><strong>{$empresa}</strong></td>
                </tr>
                <tr>
                    <th>Tempo na empresa</th>
                    <td>{$tempo_empresa}</td>
                </tr>
            </table>
        </div>
        
        <div class='secao'>
            <h3>📊 Avaliação Detalhada (Escala 1-5)</h3>
            <table>
                <tr>
                    <th colspan='2' style='background: #132f4c;'>Fluxo de Materiais</th>
                </tr>
                <tr>
                    <td>Fluxo bem definido e seguido</td>
                    <td style='text-align: center; font-weight: bold;'>{$q1}/5</td>
                </tr>
                <tr>
                    <td>Procedimentos padronizados</td>
                    <td style='text-align: center; font-weight: bold;'>{$q2}/5</td>
                </tr>
                <tr>
                    <td>Integração entre áreas</td>
                    <td style='text-align: center; font-weight: bold;'>{$q3}/5</td>
                </tr>
                <tr>
                    <td>Tempo monitorado e otimizado</td>
                    <td style='text-align: center; font-weight: bold;'>{$q4}/5</td>
                </tr>
                
                <tr>
                    <th colspan='2' style='background: #132f4c;'>Sistema e Controles</th>
                </tr>
                <tr>
                    <td>Sistema atende necessidades</td>
                    <td style='text-align: center; font-weight: bold;'>{$q5}/5</td>
                </tr>
                <tr>
                    <td>Integração entre sistemas</td>
                    <td style='text-align: center; font-weight: bold;'>{$q6}/5</td>
                </tr>
                <tr>
                    <td>Controles de estoque confiáveis</td>
                    <td style='text-align: center; font-weight: bold;'>{$q7}/5</td>
                </tr>
                <tr>
                    <td>Indicadores acompanhados</td>
                    <td style='text-align: center; font-weight: bold;'>{$q8}/5</td>
                </tr>
                
                <tr>
                    <th colspan='2' style='background: #132f4c;'>Liderança e Cultura</th>
                </tr>
                <tr>
                    <td>Clareza de metas dos líderes</td>
                    <td style='text-align: center; font-weight: bold;'>{$q9}/5</td>
                </tr>
                <tr>
                    <td>Equipe engajada</td>
                    <td style='text-align: center; font-weight: bold;'>{$q10}/5</td>
                </tr>
                <tr>
                    <td>Atuação preventiva</td>
                    <td style='text-align: center; font-weight: bold;'>{$q11}/5</td>
                </tr>
                <tr>
                    <td>Logística valorizada</td>
                    <td style='text-align: center; font-weight: bold;'>{$q12}/5</td>
                </tr>
                
                <tr>
                    <th colspan='2' style='background: #132f4c;'>Tecnologia e Inovação</th>
                </tr>
                <tr>
                    <td>Investimentos regulares</td>
                    <td style='text-align: center; font-weight: bold;'>{$q13}/5</td>
                </tr>
                <tr>
                    <td>Ferramentas digitais</td>
                    <td style='text-align: center; font-weight: bold;'>{$q14}/5</td>
                </tr>
                <tr>
                    <td>Abertura para inovação</td>
                    <td style='text-align: center; font-weight: bold;'>{$q15}/5</td>
                </tr>
                
                <tr style='background: {$cor}; color: white;'>
                    <th>PONTUAÇÃO TOTAL</th>
                    <th style='text-align: center; font-size: 18px;'>{$pontuacao}/75 ({$iml}/100)</th>
                </tr>
            </table>
        </div>
        
        <div class='secao'>
            <h3>💭 Percepção e Sugestões</h3>
            
            <h4 style='color: #0a1929; margin-top: 20px;'>Principais Desafios Logísticos:</h4>
            <p style='background: white; padding: 15px; border-radius: 4px; border-left: 3px solid #ff3333;'>{$desafios}</p>
            
            <h4 style='color: #0a1929;'>Melhorias Mais Urgentes:</h4>
            <p style='background: white; padding: 15px; border-radius: 4px; border-left: 3px solid #1e90ff;'>{$melhorias}</p>
            
            <h4 style='color: #0a1929;'>Observações Adicionais:</h4>
            <p style='background: white; padding: 15px; border-radius: 4px; border-left: 3px solid #28a745;'>{$observacoes}</p>
        </div>
        
        <div class='footer'>
            <p style='margin: 0; font-weight: 600;'>JGM4 Consultoria Logística</p>
            <p style='margin: 5px 0;'>Transformando operações logísticas em vantagem competitiva</p>
            <p style='margin: 5px 0; font-size: 12px;'>Data do diagnóstico: " . date('d/m/Y H:i:s') . "</p>
        </div>
    </body>
    </html>
    ";
    
    // Configurar headers do email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Diagnóstico JGM4 <noreply@jgm4.com.br>" . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Enviar email
    if (mail("btmuniz72@hotmail.com", $assunto, $mensagem, $headers)) {
        // Redirecionar para página de agradecimento
        header("Location: obrigado.html");
        exit();
    } else {
        echo "
        <html>
        <head>
            <style>
                body { font-family: Arial; background: #0a1929; color: white; padding: 40px; text-align: center; }
                .error { background: #ff3333; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto; }
            </style>
        </head>
        <body>
            <div class='error'>
                <h2>❌ Erro ao enviar análise</h2>
                <p>Desculpe, ocorreu um erro ao enviar suas respostas. Por favor, tente novamente ou entre em contato diretamente.</p>
                <a href='index.html' style='color: white; text-decoration: underline;'>Voltar ao site</a>
            </div>
        </body>
        </html>
        ";
    }
}
?>
