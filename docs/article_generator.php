<?php
require_once './vendor/autoload.php';

use OpenAI\OpenAI;

$api_key = 'your_openai_api_key'; // Replace with your OpenAI API key

$openai = new OpenAI([
    'key' => $api_key,
]);

$title = $_POST['title'];
$description = $_POST['description'];

$prompts = [
    "Title: $title\nDescription: $description\n\nContent:"
];

$response = $openai->completions->create([
    'model' => 'text-davinci-003',
    'prompt' => implode("\n", $prompts),
    'temperature' => 0.7,
    'max_tokens' => 200
]);

$generated_article = $response['choices'][0]['text'];

echo $generated_article;
?>
