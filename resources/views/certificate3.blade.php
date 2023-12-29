<html>
<head>
    <title>Reporte</title>
    <style>
        body {
            /* Ajusta el tamaño del cuerpo y otras propiedades según sea necesario */
            margin: 0;
            padding: 0;
          
            background-size: cover; /* Ajusta el tamaño de la imagen */
            /* Otros estilos según tus necesidades */
        }
    </style>
</head>
<body>
    <h1>Reporte con Fondo de Imagen</h1>
    <!-- Contenido del reporte -->
    <img src="{{ Storage::url($courses->image->url)}}" alt="">
    <img src="data:image/png;base64,{{ $imageData }}" alt="Mi imagen">

</body>
</html>