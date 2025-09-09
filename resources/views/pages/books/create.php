
<?php
$content = <<<HTML
<h1>Create Book</h1>
<form action="/books/store" method="post">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="pages_count" placeholder="Page Count" required>
    <input type="number" name="isbn" placeholder="ISBN number" required>
    <input type="submit" value="Create">
</form>
HTML;

include __DIR__ . '/../../layouts/app.php';
?>