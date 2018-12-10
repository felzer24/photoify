<?php require __DIR__.'/views/header.php'; ?>

<section>

    <form class="user-action-form" action="/app/users/create.php" method="post">

        <label for="fname">Firstname</label>
        <input id="fname" type="text" name="fname" placeholder="Firstname" required />

        <label for="lname">Lastname</label>
        <input id="lname" type="text" name="lname" placeholder="Lastname" required />

        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Your Email" required />

        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" required />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" autocomplete="off" required />

        <button type="submit" name="create">Create Account</button>

    </form>

</section>

<?php require __DIR__.'/views/footer.php'; ?>
