<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title><?php echo $title;?></title>
</head>
<body>
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col index_page text-center bg-light"><b>MINIMAL</b></div>
    </div>
    <div class="row">
        <div class="col-3">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/tree">Работа с иерархическами структурами</a></li>
            </ul>
        </div>
        <div class="col-9">
            <?php
            echo $content;
            ?>
        </div>
    </div>
</div>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/scripts.js"></script>
</body>
</html>