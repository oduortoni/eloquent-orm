<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'App' ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/create">Create</a>
        </nav>
    </header>
    
    <main>
        <?= $content ?>
    </main>
</body>
</html>