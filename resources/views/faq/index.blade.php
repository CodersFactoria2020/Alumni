@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faq - Preguntas frecuentes</title>
    <link rel="stylesheet" type="text/css" href="../css/faq.css" media="screen" />
    <!-- Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- icons Awesome -->
    <script src="https://kit.fontawesome.com/68133e56f0.js" crossorigin="anonymous"></script>
</head>

@section('content')
<div>
    <h1>FAQ - Preguntas frecuentes</h1>
</div>

    <div class="jumbotron" style="height: 60%;width: 80%;">
        <h2>¡Bienvenid@ a la plataforma Alumni de coders de Factoría F5!</h2>
        <h4>Por favor lee estas preguntas frecuentes para sacarle el máximo partido a la plataforma.<br>
            Esperamos que la disfrutes y te resulte de provecho.<br>
            Let's Go! (o let's PHP! o let's Java!... humor malo de coders, sorry ;-)</h4>
    </div>
    
<div class="box-faq">
    <div class="card-list" style="height: auto">
        <h2>¿Hay normas de etiqueta?</h2>
        <p>Pues sí, las habituales cuando se pretende mantener la concordia y el buen ambiente en cualquier comunidad.
            La mayoría las conocerás si ya te mueves por otros foros.
            Por favor, no abuses de mayúsculas, se entiende que equivale a gritar.
            Evita expresiones malsonantes o alusiones que puedan ser susceptibles de ofensivas.</p>
    </div>
    <div class="card-list" style="height: auto">
        <h2>¿Hay censura en las valoraciones a empresas?</h2>
        <p>No. Deseamos que las valoraciones sean lo más sinceras posibles, pero también justificadas.
            Ya sea positiva, neutral o negativa, por favor añade un mínimo comentario sobre qué criterios
            te han llevado a esa conclusión. Así, será más útil para otr@s coders.
            Algo que a algun@s les parece algo positivo, a otr@s les puede parecer positivo o irrelevante.
            Por ejemplo, si valoras una pizzería como "mala" porque solo sirve pizza con masa
            tipo Chicago (deep pan) es algo subjetivo. A lo mejor resulta que para otra persona es justo al revés
            o le da igual y le gustan todas.</p>
    </div>
    <div class="card-list" style="height: auto">
        <h2>¿Para qué sirve la sección Empresas?</h2>
        <p>Aquí l@s coders que hayan trabajado en empresas escriben sus valoraciones y experiencias sobre estas,
             con el fin de ayudar a otr@s coders en un futuro.</p>
    </div>
    <div class="card-list" style="height: auto">
        <h2>¿Para qué sirve la sección Proyectos?</h2>
        <p>Esta sección sirve para que l@s coders se apunten a proyectos de otr@s coders,
             para dar ideas y colaborar juntos. También puede contribuir a que l@s coders se conozcan entre ell@s.</p>
    </div>
</div>
@endsection
