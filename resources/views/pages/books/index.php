<?php
$content = '<div class="container"><ul>';

foreach($books as $book) {
    $content .= '<li>';
    $content .= '<div>';
    $content .= '<h2>' . htmlspecialchars($book['title']) . '</h2>';
    $content .= '<div>' . htmlspecialchars($book['description']) . '</div>';
    $content .= '<div>Pages: ' . $book['pages_count'] . '</div>';
    $content .= '<div>ISBN: ' . htmlspecialchars($book['isbn']) . '</div>';
    $content .= '</div>';
    $content .= '</li>';
}

$content .= '</ul></div>';

include __DIR__ . '/../../layouts/app.php';
?>

