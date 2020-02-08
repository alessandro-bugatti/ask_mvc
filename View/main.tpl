<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title><?=$titolo?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>

<header class="sticky">
    <a href="#" class="logo" style="margin-left: 1rem;">Ask, the only application you need, stop.</a>
</header>
<!-- Stylized button to mimic the design of an Android app -->
<button class="primary circular" style="position: fixed; bottom: 3vh; right: 3vw;
    height:50px; width:50px; font-size: 25px; line-height: 1;z-index: 10"
        onclick="window.location.href = '/ask_mvc/question/add';">&#65291;</button>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
            <?=$this->section('content');?>
        </div>
    </div>
</div>

</body>
</html>