<body>
    <header class="main-header">

    <div class="logo">
        <h1>PhotoifyApp.com</h1>
      </div>

      <?php if (isset($_SESSION['login-success'])): ?>
          <div class=" banner success">
              <p><?php echo $_SESSION['login-success']; ?></p>
          </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['login-error'])): ?>
          <div class="banner error">
              <p><?php echo $_SESSION['login-error']; ?></p>
          </div>
      <?php endif; ?>

    </header>
