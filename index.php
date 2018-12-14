<?php require __DIR__.'/views/header.php'; ?>

   <main>
    <section class="login-section">

      <form action="/app/users/signin-app.php" class="user-action-form" method="post">
        <h3>Login</h3>

        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" required />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" autocomplete="off" placeholder="Your Password" required />

        <button type="submit" name="create">Login</button>

        <a href="signup.php">Don´t have an account ?</a>
        <a href="#">I forgot my account</a>
      </form>

    </section>
  </main>

<?php require __DIR__.'/views/footer.php'; ?>
