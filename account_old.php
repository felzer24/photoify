<?php

require __DIR__.'/views/header.php';

if (!isset($_SESSION['logedin'])) {
    redirect('/');
    exit();
}

?>

<main>
    <h3>Welcome <?= $_SESSION['logedin']['fullname'] ?></h3>

    <?php var_dump($_SESSION['logedin']); ?>

    <h3>User Account Created:

        <?php
        $datetime = date_create($_SESSION['logedin']['created_at'], timezone_open('UTC'));
        date_timezone_set($datetime, timezone_open($_SESSION['logedin']['timezone']));
        $my_timezone = date_timezone_get($datetime);

        echo date_format($datetime, 'Y-m-d H:i:s') . "\n";

        echo 'Timezone: '.timezone_name_get($my_timezone);

        ?>
    </h3>

    <div class="banner-messages <?= $_SESSION['banner']['class'] ?? '' ?>">
        <?= $_SESSION['banner']['message'] ?? '' ?>
    </div>

    <form action="app/users/update.app_users.php" method="post" enctype="multipart/form-data">

        <img src="assets/images/profiles/<?= $_SESSION['logedin']['profile_pic'] ?>" alt="Profile picture for <?= $_SESSION['logedin']['username'] ?>" />

        <label for="avatar">Upload your avatar here...<br />
        Accepted formats: jpg/jpeg/gif/png Max filezise: 2MB</label>
        <input id="avatar" type="file" accept=".jpg, .jpeg, .gif, .png" name="profile_pic" />

        <label for="biography">Update biography</label>
        <textarea id="biography" name="biography" rows="3" cols="80"></textarea>

        <label for="email">Update email</label>
        <input id="email" type="email" name="email" value="fredrik@leemann.se" required/>

        <label for="fullname">Update fullname</label>
        <input id="fullname" type="text" name="fullname" value="Fredrik Leemann" />

        <label for="opassword">Update password</label>
        <input id="opassword" type="password" name="opassword" placeholder="Password" />
        <input id="npassword" type="password" name="npassword" placeholder="New password" />
        <input id="rpassword" type="password" name="rpassword" placeholder="Repeat password" />

        <?php
        $my_timezone = $_SESSION['logedin']['timezone'];

        $timezones=[
            str_replace('_','',"$my_timezone") => $my_timezone,
            'Europe/Stockholm' => 'Europe/Stockholm',
            'Europe/London' => 'Europe/London',
            'America/New York' => 'America/New_York',
            'Asia/Dubai' => 'Asia/Dubai'
        ];

        $timezones = array_unique($timezones);

        ?>

        <label for="timezone">Timezone</label>
        <select name="timezone" id="timezone" />
            <?php foreach ($timezones as $display => $value): ?>
                <option value=<?= $value ?>><?= $display ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="update_profile-btn">Save Changes</button>
    </form>

    <a style="color: white;" href="app/users/logout.app_users.php?clicked=true" title="Logout">Logout</a>
</main>

<?php require __DIR__.'/views/footer.php'; ?>
