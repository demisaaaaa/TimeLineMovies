<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <!-- mvp.css -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <!-- editor de texto -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "insertdatetime"
            ],
            width: 700,
            height: 400});
    </script>
    <!-- fim editor de texto -->
    <?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
    }
    
    
    ?>
</head>