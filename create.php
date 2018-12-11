<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="author" content="Fredrik Leemann" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="robots" content="index, follow, noodp, noydir" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css" type="text/css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="/assets/styles/mobile.css" type="text/css" />
  <link rel="stylesheet" href="/assets/styles/tablet.css" type="text/css" />
  <link rel="stylesheet" href="/assets/styles/desktop.css" type="text/css" />
  <meta name="description" content="Christmas project 2018 Photoify" />
  <meta name="keywords" content="Photoify, Project, Yrgo, School, Login, database, PHP"/>
  <title>Photoify</title>
</head>

<?php
    require __DIR__.'/app/autoload.php';
?>

<body>
  <header class="main-header">
    <div class="logo">
      <h1>PhotoifyApp.com</h1>
    </div>
  </header>
  <main>
    <section class="login-section">

      <form action="/app/users/create.php" class="user-action-form" method="post">
        <h3>Create Account</h3>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" placeholder="Your Email" required />

        <label for="fname">Firstname</label>
        <input id="fname" type="text" name="fname" placeholder="Firstname" required />

        <label for="lname">Lastname</label>
        <input id="lname" type="text" name="lname" placeholder="Lastname" required />

        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" required />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" autocomplete="off" placeholder="Create Password" required />

        <button type="submit" name="create">Create Account</button>

        <a href="index.php">Already have an account ?</a>
      </form>

    </section>
  </main>
</body>
</html>
