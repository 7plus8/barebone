<?php

require __DIR__ . "/../vendor/autoload.php";

$app = new Silex\Application;

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider,
[
    'twig.path' => __DIR__ . '/../views'
]);

$app->register(new Silex\Provider\DoctrineServiceProvider,
[
    'db.options' =>
    [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'ajo',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ]
]);

$app->register(new BA\Providers\UploadcareProvider);

$app->get('/', function () use ($app){

    $posts = $app['db']->prepare("SELECT * FROM posts");
    $posts->execute();

    $posts = $posts->fetchAll(\PDO::FETCH_CLASS, \BA\Models\Image::class);
    foreach ($posts as $post)
    {
        //echo "<pre>";
        $tags = (json_decode($post->tags));
        foreach ($tags as $tag)
        {
        //    print_r($tag);
        }
    }
    require  __DIR__ . "/../app/Models/Post.php";
    $post = new BA\Models\Post;
    //$post->;
    //die();
    return $app['twig']->render('home.twig');
});
$app->run();
