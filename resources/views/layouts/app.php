<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="/assets/css/pico.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <title><?= $title ?? 'App' ?></title>
  </head>
  <body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/books/create">Create A Book</a>
        </nav>
        <section>
            <h1><?= $title ?? 'App' ?></h1>
        </section>
    </header>
    
    <main class="container">
        <?= $content ?>
    </main>
    <script src="/assets/js/app.js"></script>
  </body>
</html>