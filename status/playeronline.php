<?php
include("inc/config.php");

$Status = ServerStatus();

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players Online</title>
    <style>
        @font-face {
            font-family: 'Vanthian Ragnarok';
            src: url('caminho/para/VanthianRagnarok.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Vanthian Ragnarok', sans-serif;
			background-color: #76b2fa;
			font-size: 35px;
			color: #a3d900;
			margin: 0px;
			border: 0px;
			border: none;
			overflow: hidden;
        }
    </style>
</head>
<body>
<?php
$playerCount = PlayerCount();
$numero = 0; // número de usuários fake - utilizado apenas para configuração de espaço para casa de centena na visualização

// Soma o $número ao resultado da função PlayerCount()
$resultado = $playerCount + $numero;

// Exibe o resultado
echo $resultado;
?>
</body>
</html>

<?php
    function ServerStatus() {
        Global $Srv_Host, $Srv_Login, $Srv_Char, $Srv_Map, $Str_Online, $Str_Offline;
        error_reporting(0);
        
        $Status = array();
/*        $LoginServer = fsockopen($Srv_Host, $Srv_Login, $errno, $errstr, 1);
        $CharServer = fsockopen($Srv_Host, $Srv_Char, $errno, $errstr, 1);
        $MapServer = fsockopen($Srv_Host, $Srv_Map, $errno, $errstr, 1);
/*        if(!$LoginServer){ $Status[0]= $Str_Offline;  } else { $Status[0] = $Str_Online; };
        if(!$CharServer){ $Status[1] = $Str_Offline;  } else { $Status[1] = $Str_Online; };
        if(!$MapServer){ $Status[2] = $Str_Offline;  } else { $Status[2] = $Str_Online; }; */
        return $Status;
    }
    
    function PlayerCount() {
    global $Srv_Host,$Srv_Username,$Srv_Password,$Srv_Database;           

    // Conectar ao banco de dados
    $Connection = mysqli_connect($Srv_Host,$Srv_Username,$Srv_Password,$Srv_Database);

    // Verificar conexão
    if (!$Connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Consulta SQL
    $query = "SELECT COUNT(*) as total FROM `char` WHERE online = '1'";
    $cresult = mysqli_query($Connection, $query);

    // Verificar se a consulta foi bem-sucedida
    if (!$cresult) {
        die("Query failed: " . mysqli_error($Connection));
    }

    // Obter o resultado
    $resarray = mysqli_fetch_array($cresult);
    $playeronline = $resarray["total"];

    // Fechar a conexão
    mysqli_close($Connection);

    return $playeronline;
}
?>
