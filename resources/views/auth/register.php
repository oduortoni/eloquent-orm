<?php
$content = <<<HTML
HTML;

if (isset($error)) {
    $content .= '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
}

$content .= <<<HTML
<form action="/register" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Register">
</form>
<p><a href="/login">Already have an account? Login</a></p>
HTML;

include __DIR__ . '/../layouts/app.php';
?>