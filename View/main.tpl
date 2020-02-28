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
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
            <?=$this->section('content');?>
        </div>
    </div>
</div>

</body>
</html>