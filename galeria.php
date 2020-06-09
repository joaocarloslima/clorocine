<?php include "cabecalho.php" ?>

<?php

$bd = new SQLite3("filmes.db");
$sql = "SELECT * FROM filmes";
$filmes = $bd->query($sql);

$filme1 = [
    "titulo" => "Vingadores",
    "nota" => 9.9,
    "sinopse" => "Depois dos eventos devastadores de “Guerra do Infinito”, o universo está em ruínas. Com a ajuda dos aliados que restam, os Vingadores juntam-se mais uma vez para tentar desfazer as ações de Thanos e restaurar a ordem ao universo.",
    "poster" => "https://image.tmdb.org/t/p/w300/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg"
];

$filme2 = [
    "titulo" => "Ad Astra",
    "nota" => 6.2,
    "sinopse" => "O astronauta Roy McBride viaja para lá dos limites do sistema solar para tentar encontrar o seu pai desaparecido e decifrar o mistério que ameaça a sobrevivência do planeta Terra.",
    "poster" => "https://image.tmdb.org/t/p/w300/wigZBAmNrIhxp2FNGOROUAeHvdh.jpg"
];

$filme3 = [
    "titulo" => "O auto da compadecida",
    "nota" => 10.0,
    "sinopse" => "As aventuras de João Grilo (Matheus Natchergaele), um sertanejo pobre e mentiroso, e Chicó (Selton Mello), o mais covarde dos homens. Ambos lutam pelo pão de cada dia e atravessam por vários episódios enganando a todos da pequena cidade em que vivem.",
    "poster" => "https://image.tmdb.org/t/p/w300/imcOp1kJsCsAFCoOtY5OnPrFbAf.jpg"
];

$filme4 = [
    "titulo" => "Star Wars: Episódio IX - A Ascensão de Skywalker",
    "nota" => 8.1,
    "sinopse" => "Uma jornada épica para uma galáxia muito, muito distante. A fascinante conclusão da saga Skywalker, onde vão nascer novas lendas e a batalha final pela liberdade ainda está para chegar.",
    "poster" => "https://image.tmdb.org/t/p/w300/lFx2i2pg1BoaD7grcpGDyHM1eML.jpg"
];

//$filmes = [$filme1, $filme2, $filme3, $filme4];


?>

<body>

    <nav class="nav-extended purple lighten-3">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li class="active"><a href="galeria.php">Galeria</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>CLOROCINE</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent purple darken-1">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#test2">Assistidos</a></li>
                <li class="tab"><a href="#test3">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">

    <?php while ($filme = $filmes->fetchArray()) :?>
    <div class="col s3">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="<?= $filme["poster"] ?>">
                    <a class="btn-floating halfway-fab waves-effect waves-light red">
                        <i class="material-icons">favorite_border</i>
                        <?= $filme["nota"] ?>
                    </a>
                </div>
                <div class="card-content">
                    <p class="valign-wrapper">
                        <i class="material-icons amber-text">star</i> 8,1
                    </p>
                    <span class="card-title"><?= $filme["titulo"] ?></span>

                    <p><?= $filme["sinopse"] ?></p>
                </div>
            </div>
        </div>   
        <?php endwhile ?>     
    </div>

    </div>



</body>

</html>