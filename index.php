<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container pt-5">
        <form id="frmprompt" method="POST">
            <input type="text" class="form-control" placeholder="ingresa pregunta" name="prompt" id="prompt">
            <button class="btn btn-primary" id="btn-pregunta">Enviar</button>
        </form>
        
        <div id="respuesta" class="container"></div>
    </div>


<script src="assets/gpt.js"></script>
</body>
</html>