<?php
$content = <<<HTML
HTML;

if (isset($error)) {
    $content .= '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
}

$content .= <<<HTML
<form action="/login" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
</form>
<p><a href="/register">Don't have an account? Register</a></p>
HTML;

include __DIR__ . '/../layouts/app.php';
?>