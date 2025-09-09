<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="/assets/css/pico.min.css">
    <title><?= $title ?? 'App' ?></title>
  </head>
  <body>
    <header class="container">
      <nav>
        <ul>
          <li><a href="/" class="contrast">Home</a></li>
          <li><a href="/books/create">Create a Book</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
          <li>
            <form action="/logout" method="post" style="display: inline;">
              <input type="submit" value="Logout" class="outline">
            </form>
          </li>
        </ul>
      </nav>
      <h1><?= $title ?? 'App' ?></h1>
    </header>

    <main class="container">
      <?= $content ?>
    </main>

    <footer class="container">
      <small>&copy; <?= date('Y') ?> mikaloel</small>
    </footer>

    <script src="/assets/js/app.js"></script>
  </body>
</html>
