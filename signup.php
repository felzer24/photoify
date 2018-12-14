<?php require __DIR__.'/views/header.php'; ?>

  <main>
    <section class="login-section">

      <form action="/app/users/signup-app.php" class="user-action-form" method="post">
        <h3>Create Account</h3>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Your Email" required />

        <label for="name">Fullname</label>
        <input id="name" type="text" name="name" placeholder="Firstname Lastname" required />

        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" required />

        <label for="password">Create Password</label>
        <input id="password" type="password" name="password" autocomplete="off" placeholder="New Password" required />

        <label for="rpassword">Confirm Password</label>
        <input id="rpassword" type="password" name="rpassword" autocomplete="off" placeholder="Repeat Password" required />

        <button type="submit" name="create">Create Account</button>

        <a href="index.php">Already have an account ?</a>
      </form>

    </section>
  </main>

<?php require __DIR__.'/views/footer.php'; ?>
