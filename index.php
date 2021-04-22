<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$products = [
    [
        'id' => 1,
        'name' => 'A guide to brewing the perfect Duvel',
        'price' => 3.5,
        'tax' => 0.21,
    ],
    [
        'id' => 2,
        'name' => 'The secrets of the world wide web',
        'price' => 9000,
        'tax' => 0.21,
    ]
];

$articles = [
    [
        'id' => '1',
        'title' => 'Cake ipsum',
        'slug' => 'cake-ipsum',
        'content' => 'Soufflé marzipan bear claw marshmallow pastry chocolate bar topping. Jelly biscuit cotton candy pudding sweet roll cupcake. Jelly-o oat cake candy canes cotton candy cake caramels. Carrot cake chocolate cake bear claw apple pie chocolate bar gummi bears pastry brownie.',
    ],
    [
        'id' => '2',
        'title' => 'Tiramisu muffin macaroon',
        'slug' => 'tiramisu-muffin-macaroon',
        'content' => 'Powder icing candy canes tiramisu muffin macaroon sesame snaps. Jelly halvah donut chocolate cake brownie cake gingerbread donut icing. Pie jelly chupa chups caramels danish soufflé. Tart liquorice bear claw cheesecake powder. Sweet jelly powder apple pie bear claw. Wafer donut pudding powder pie soufflé. Macaroon jelly beans croissant ice cream wafer sweet sugar plum bear claw gingerbread.',
    ],
    [
        'id' => '3',
        'title' => 'Koen sleep statistics',
        'slug' => 'koen-sleep-statistics',
        'content' => 'We are still waiting for data to come him. He might have fallen asleep while sending them.'
    ],
    [
        'id' => '4',
        'title' => 'Lamarr 4 breaks coding world record',
        'slug' => 'lamarr-4-breaks-coding-world-record',
        'content' => 'We don\'t know how they managed it, but they sure did.'
    ]
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php // TODO: a dynamic title, changing per page would be better right? ?>
    <title>Home</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php?page=articles">Articles</a></li>
        <li><a href="index.php?page=products"> Products</a></li>
    </ul>
</nav>
<?php if (!empty($_GET['page'])) : ?>
    <?php if ($_GET['page'] == 'articles') : ?>
        <?php foreach ($articles as $article) : ?>
            <div>
                <h2><?= $article['title'] ?></h2>
                <a href="index.php?page=article-detail&article_slug=<?= $article['slug'] ?>">Tell me more</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($_GET['page'] == 'products') : ?>
        <?php foreach ($products as $product) : ?>
            <div>
                <h2><?= $product['name'] ?></h2>
                <p>Price (tax included): €<?= round($product['price'] * (1 + $product['tax']), 2) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($_GET['page'] == 'article-detail' && !empty($_GET['article_slug'])) : ?>
        <?php
        $article = null;

        foreach ($articles as $articleToCheck) {
            if ($articleToCheck['slug'] === $_GET['article_slug']) {
                $article = $articleToCheck;
            }
        }
        ?>
        <article>
            <h2><?= $article['title'] ?></h2>
            <p><?= $article['content'] ?></p>
        </article>
    <?php endif; ?>
<?php endif ?>
</body>
</html>