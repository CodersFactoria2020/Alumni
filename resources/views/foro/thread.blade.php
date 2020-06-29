@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" type="text/css" href="../css/foro.css" media="screen" />
    <!-- Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- icons Awesome -->
    <script src="https://kit.fontawesome.com/68133e56f0.js" crossorigin="anonymous"></script>
</head>

@section('content')
<div class="container-block">
    <forum-search></forum-search>
</div>
<div class="container-block">
    <thread :auth_user='@json($auth_user)'></thread>
</div>

@endsection
