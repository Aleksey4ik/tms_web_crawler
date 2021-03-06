<?php

require_once __DIR__.'/vendor/autoload.php';

use MyApp\Controller\CommentController;


if ($_POST['comment_text_expression'][0] != '.') {
    $_POST['comment_text_expression'] = '.'.$_POST['comment_text_expression']; 
}

if ($_POST['comment_author_expression'][0] != '.') {
    $_POST['comment_author_expression'] = '.'.$_POST['comment_author_expression']; 
}

$request = [
    'url' => $_POST['url'],
    'comment_expression' => $_POST['comment_expression'],
    'comment_text_expression' => $_POST['comment_text_expression'],
    'comment_author_expression' => $_POST['comment_author_expression']
];

// ТЕСТОВЫЕ ДАННЫЕ

// $request = [
//     'url' => "https://forum.onliner.by/viewtopic.php?t=19991115",
//     'comment_expression' => '//ul[@class="b-messages-thread"]/li[@id]',
//     'comment_text_expression' => './/div[@class="content"]',
//     'comment_author_expression' => './/big[starts-with(@class,"mtauthor-nickname userid")]//a[starts-with(@class,"_name")]',
// ];

$controller = new CommentController(new ForumCrawlerService(), new FileStorageService());

$result = $controller->crawlPage($request);
