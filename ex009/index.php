<?php

    echo "Digite o valor me R$:";
    $stdin = fopen ("php://stdin","r");
    $numReal = fgets($stdin);

    // Inicializa o cURL
    $curl = curl_init();

    // Define a URL da API e as opções de solicitação
    $url = 'https://economia.awesomeapi.com.br/all/USD-BRL';
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // Retorna o resultado da solicitação em vez de exibi-lo
        CURLOPT_FOLLOWLOCATION => true,   // Segue qualquer redirecionamento recebido da API
        CURLOPT_SSL_VERIFYHOST => false,  // Desativa a verificação do host SSL
        CURLOPT_SSL_VERIFYPEER => false,  // Desativa a verificação do certificado SSL
        CURLOPT_HTTPHEADER => array(     // Define o cabeçalho da solicitação
            'Content-Type: application/json'
        ),
        CURLOPT_URL => $url             // Define a URL da API
    );

    // Define as opções de solicitação no cURL
    curl_setopt_array($curl, $options);

    // Executa a solicitação e armazena a resposta da API em uma variável
    $response = curl_exec($curl);

    // Verifica se houve algum erro durante a solicitação
    if (curl_error($curl)) {
        echo 'Erro ao fazer a solicitação: ' . curl_error($curl);
        exit;
    }

    // Converte a resposta JSON da API em um array associativo
    $data = json_decode($response, true);

    // Verifica se a resposta da API contém um valor de cotação válida
    if (!isset($data['USD']['high'])) {
        echo 'Não foi possível obter a cotação atual do dólar.';
        exit;
    }

    // Extrai o valor atual do dólar a partir da resposta da API
    $dolar = $data['USD']['high'];

    // Fecha o recurso cURL
    curl_close($curl);

    $valueDolar = number_format($numReal / $dolar,  2,  '.', ''); 

    echo "Seus R$$numReal equivalem a US$$valueDolar"

?>