
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
            
            background-position: center;

            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            /* Agrega la imagen de fondo y ajusta las propiedades */
            background-image: url('{{ $backgroundImage }}');
            
            background-size: cover;
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
          /* Estilos para el código QR */
          .qr-code {
            display: block;
            text-align: center;
        }
        .qr-code img {
            max-width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
    <div class="certificate">
        <div class="header">
  
            <div class="title">CERTIFICADO</div>
            <div class="subtitle">Por la presente se certifica que:</div>
        </div>
        <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR">
        <img src="data:image/png;base64,{{ base64_encode($backgroundImage) }}" >
  <div style="background-image: url('{{ $backgroundImage }}');">
        <!-- Contenido del certificado -->
    </div>

      
        <div class="info">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Email:</strong> {{ $backgroundImage }}</p>
            <!-- Otros datos que desees mostrar -->
            <p><strong>Curso:</strong> {{ $courses->title }}</p>
            <!-- Otros datos del curso -->
        </div>
        


    </div>
  
</body>
</html>
