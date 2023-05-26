<!DOCTYPE html>

<head>
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Audiowide&display=swap');

        * {
            overflow-x: hidden;
        }

        .npoudelp {
            font-family: 'Audiowide';
            overflow-y: hidden;
            margin-bottom: 0px;
        }

        .tagLine {
            font-family: 'Audiowide';
            text-transform: uppercase;
            margin-top: -10px;
        }

        .cover {
            overflow: hidden;
        }

        a {
            text-decoration: none;
        }

        .myIntro {
            font-family: 'Audiowide';
            color: #999999;
        }

        .firstSpan {
            
        }

        .firstSpan .secondSpan {
            visibility: hidden;
            width: 10%;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 10;
        }

        .firstSpan:hover .secondSpan {
            visibility: visible;
        }
    </style>
</head>