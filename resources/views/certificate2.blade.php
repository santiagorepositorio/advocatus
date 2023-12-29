
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
        /* Establece la imagen de fondo */
        background-image: url(data:image/png;base64,{{ $imageData }});
        /* Ajusta la posición y tamaño de la imagen */
        background-size: cover; /* O ajusta según tus necesidades */
        background-position: center center; /* O ajusta según tus necesidades */
        /* Evita que la imagen de fondo se imprima en el PDF */
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
    }
        .certificate {
            width: 800px;
            margin: 0 auto;
            
           
            padding: 20px;
          
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
    <div class="certificate " >
        <div class="header">
  
            <div class="title">CERTIFICADO</div>
            <div class="subtitle">Por la presente se certifica que:</div>
        </div>
       
        <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR">
      
    
        <div class="info">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Email:</strong> {{ Storage::url($courses->image->url)}}</p>
            <!-- Otros datos que desees mostrar -->
            <p><strong>Curso:</strong> {{ $courses->title }}</p>
            <!-- Otros datos del curso -->
        </div>
        


    </div>
</body>
</html>

