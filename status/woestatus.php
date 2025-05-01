<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status da WoE</title>
    <style>
        @font-face {
            font-family: 'Vanthian Ragnarok';
            src: url('caminho/para/VanthianRagnarok.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Vanthian Ragnarok', sans-serif;
            background-color: #6ea1fa;
            margin: 0px;
            border: 0px;
            border: none;
            overflow: hidden;
        }

        table {
            font-size: 20px; /* Aumente o valor para um tamanho maior */
        }

        #offline-image, #online-image {
            width: 28px;
            height: 28px;
        }

        #online-image {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        function showImages() {
            $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
            $day = $now->format('w');
            $hour = $now->format('G');
            $minute = $now->format('i');

            // Dias da semana: 0=Domingo, 1=Segunda-Feira, 2=Terça-feira, 3=Quarta-Feira, 4=Quinta-feira, 5=Sexta-Feira, 6=Sábado
            $allowedDays = [0, 2, 4]; // 0-Domingo, 2-Terça-feira, 4-Quinta-feira,

            if (($day == 4 && $hour == 21 && $minute >= 0 && $minute < 60) || 
                (in_array($day, [0, 2]) && $hour == 20 && $minute >= 0 && $minute < 60)) {
                echo '<img id="online-image" src="online.png" alt="Online">';
            } else {
                echo '<img id="offline-image" src="offline.png" alt="Offline">';
            }
        }

        showImages();
    ?>
</body>
</html>
