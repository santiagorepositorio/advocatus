
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2; /* Color de fondo */
            background-image: url('https://cba.ucb.edu.bo/wp-content/uploads/2020/06/Paola-Veronica-Roque-Mercado_resize.jpg'); /* URL de la imagen de fondo */
            background-size: cover;
            background-position: center;
        }
        .certificate {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
            background-color: white; /* Color de fondo del certificado */
            opacity: 0.9; /* Opacidad para combinar con la imagen de fondo */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333; /* Color del título */
        }
        .subtitle {
            font-size: 24px;
            color: #666; /* Color del subtítulo */
        }
        .info {
            margin-top: 30px;
            color: #2a2a2a; /* Color de la información */
        }
        .info p {
            margin: 5px 0;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .qr-code img {
            width: 100px; /* Ajuste del tamaño del código QR */
            height: 100px;
        }
        @page {
            size: landscape; /* Formato horizontal */
            margin: 20px; /* Márgenes cortos */
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="header">
            <div class="title">CERTIFICADO</div>
            <div class="subtitle">Por la presente se certifica que:</div>
        </div>
        <div class="visible-print text-center">
            {!! QrCode::size(100)->generate(Request::url()); !!}
            <p>Escanéame para volver a la página principal.</p>
        </div>
        <?php
        $url = 'https://example.com'; // La URL o texto que deseas codificar en el QR
$qrCode = '<img src="data:image/png;base64,' . base64_encode(QrCode::format('png')->size(200)->generate($url)) . '">';
echo $qrCode;
        
        ?>
    
      
        <div class="info">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <!-- Otros datos que desees mostrar -->
            <p><strong>Curso:</strong> {{ $courses->title }}</p>
            <!-- Otros datos del curso -->
        </div>
    </div>
</body>
</html>