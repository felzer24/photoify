<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

  <ul class="navbar-nav">
      <li class="nav-item
      <?php
      if($page === 'index.php'){
          echo 'active';
      } elseif(empty($page)) {
          echo 'active';
      }?>">
          <a class="nav-link" href="index.php">Home</a>
      </li><!-- /nav-item -->

      <li class="nav-item <?= $page === 'about.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="about.php">About</a>
      </li><!-- /nav-item -->

      <li class="nav-item <?= $page === $navlink['href'] ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= $navlink['href'] ?>"><?= $navlink['link'] ?></a>
      </li><!-- /nav-item -->

  </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
