<?php
    require __DIR__.'/views/header.php';

    if (!isset($_SESSION['logedin'])) {
        redirect('/');
        exit();
    }
?>
    <main data-errors="<?= $_SESSION['page']['error'] ?? 'no' ?>">
        <!-- Start main container -->
        <div class="container">
            <!-- Start main row -->
            <div class="row text-center my-4">

                <!-- Start column 1 -->
                <div id="first-column" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-0 mb-lg-3">

                    <div class="my-radiusb-none alert <?= $_SESSION['banner']['class'] ?? 'alert-secondary' ?> m-0 d-flex align-items-center justify-content-center">
                        <small><strong><?= $_SESSION['banner']['message'] ?? 'Messages will appear here' ?></strong></small>
                    </div>

                    <!-- Start user-info column wrapper -->
                    <div id="wrapper-first-column" class="d-none d-lg-block">

                        <!-- Start section 1 in column 1 -->
                        <section class="position-relative">
                            <div class="container m-0 py-4 my-orange-color">
                                <div class="col-4 mx-auto">
                                    <img src="assets/images/profiles/<?= $profile_pic ?>" class="img-thumbnail img-fluid" alt="Profile picture for <?= $username ?>" />
                                </div>
                            </div>
                            <!-- Start section 1 for overlay in column 1 -->
                            <section id="edit-toggle-overlay" class="position-absolute mb-4 display-none">
                                <!-- Start container for column 1 overlay  -->
                                <div class="container m-0 p-0 border">
                                    <!-- Start jumbotron div for form -->
                                    <div class="jumbotron jumbotron-fluid py-3 m-0">
                                        <!-- Start container for form -->
                                        <div class="container">
                                            <!-- Start container for profile image -->
                                            <div class="container m-0 py-4 my-orange-color mb-3 position-relative">
                                                <div class="col-4 mx-auto">
                                                    <img src="assets/images/profiles/<?= $profile_pic ?>" class="img-thumbnail img-fluid" alt="Profile picture for <?= $username ?>" />
                                                </div>
                                            </div>
                                            <!-- End container for profile image -->
                                            <h4>Edit Account</h4>
                                            <form action="app/users/update.app_users.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <small class="filename-profile form-text text-muted text-left">Filename: <i>....</i></small>
                                                    <label for="profile_pic" class="profile-input-label bg-secondary text-light float-left">Upload your Avatar</label>
                                                    <input id="profile_pic" class="profile-input-file form-control-file" name="profile_pic" type="file" accept=".jpg, .jpeg, .gif, .png" />
                                                    <small class="form-text text-muted text-left">Accepted filetypes: .jpg .jpeg .png .gif Maxfilesize: 2MB</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="profile_bio" class="float-left">Update biography</label>
                                                    <textarea id="profile_bio" class="form-control" name="profile_bio" maxlength="100"
                                                    placeholder="<?= $_SESSION['errors']['profile_bio'] ?? 'Your biography' ?>"><?= $profile_bio ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="float-left">Update email</label>
                                                    <input id="email" class="form-control" name="email" type="text" value="<?= $email ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="fullname" class="float-left">Update fullname</label>
                                                    <input id="fullname" class="form-control" name="fullname" type="text" value="<?= $fullname ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label for="timezone" class="float-left">Timezone</label>
                                                    <select class="form-control" id="timezone" name="timezone" />
                                                        <?php foreach ($timezones as $display => $value): ?>
                                                            <option value=<?= $value ?>><?= $display ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="cpassword" class="float-left">Update password</label>
                                                    <input id="cpassword" class="form-control" name="cpassword" type="password" placeholder="Current password" />
                                                </div>
                                                <div class="form-group">
                                                    <input id="npassword" class="form-control" name="npassword" type="password" placeholder="Set a new password" />
                                                </div>
                                                <div class="form-group">
                                                    <input id="rpassword" class="form-control" name="rpassword" type="password" placeholder="Repeat new password" />
                                                </div>

                                                <button type="submit" class="btn btn-success my-2" name="update_profile-btn"><i class="fa fa-floppy-o pr-1" aria-hidden="true"></i>Save Changes</button>
                                                <button type="button" class="btn btn-dark my-2" id="edit-close-overlay-btn"><i class="fa fa-times-circle-o pr-1" aria-hidden="true"></i>Close Window</button>
                                            </form>
                                        </div><!-- End container for form -->
                                    </div><!-- End jumbotron div for form -->
                                </div><!-- End container for column 1 overlay  -->

                                <div class="jumbotron bg-warning warning-delete-account m-0">
                                    <h1 class="display-5 pb-4">DangerZone</h1>
                                    <p class="lead">By clicking the button below your account will get deleted together with all content such as posts, files and personal information</p>
                                    <hr class="my-4" />
                                    <button type="submit" class="btn btn-danger mt-2 mb-3"><i class="fa fa-trash-o pr-1" aria-hidden="true"></i>Delete Account</button>
                                </div>

                            </section>
                            <!-- End section 1 for overlay 1 in column 1 -->
                        </section>
                        <!-- End section 1 in column 1 -->

                        <!-- Start section 2 in column 1 -->
                        <section class="account-info" style="height: 225px;">
                            <div class="container m-0 p-0 bg-white border-right border-left h-100 d-block text-left p-3">
                                <button id="edit-account" type="button" class="edit-account-btn btn btn-info mt-2 mb-3">
                                <i class="fa fa-user-circle-o pr-1" aria-hidden="true"></i>Account</button>
                                <i class="font-weight-bold bg-light p-1 border d-inline-block d-lg-none fa fa-sign-out float-right" aria-hidden="true">
                                    <a class="text-dark" href="app/users/logout.app_users.php?clicked=true" title="Logout">Logout</a>
                                </i>

                                <br />
                                <dt>Welcome <?= $fullname ?></dt>
                                <hr />
                                <p class="lead mb-1">Biography:</p>
                                <small class="d-block" style="max-width: 380px"><?= $profile_bio ?></small>
                            </div>
                        </section>
                        <!-- End section 2 for column 1 -->
                            <section class="account-info">
                                <div class="container m-0 p-0">
                                    <ul class="list-group">
                                        <li class="list-group-item text-left">Username: <?= $username ?></li>
                                        <li class="list-group-item text-left">TimeZone: <?= timezone_name_get($my_timezone) ?></li>
                                        <li class="list-group-item text-left">Created: <?= date_format($datetime, 'Y-m-d H:i:s') ?></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div><!-- End user-info column wrapper -->

                    <!-- Start column 2 -->
                    <div id="second-column" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <!-- Start section 1 for column 2 -->
                        <section>
                            <!-- Start container for column 2 section 1 -->
                            <div class="my-post-module container m-0 p-0 border-right border-left border-top">
                                <!-- Start jumbotron for form -->
                                <div class="jumbotron jumbotron-fluid py-3 m-0">
                                    <!-- Start container for form -->
                                    <div class="container">
                                        <h4>Create a new post</h4>
                                        <form action="app/posts/store.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <small class="post-filename form-text text-muted text-left">Filename: <i>....</i></small>
                                                <label for="postfile" class="myfile-input-label bg-secondary text-light float-left">Upload image</label>
                                                <input id="postfile" class="myfile-input form-control-file" name="postfile" type="file" accept=".jpg, .jpeg, .gif, .png" />
                                                <small class="form-text text-muted text-left">Accepted filetypes: .jpg .jpeg .png .gif Maxfilesize: 4MB</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="postdesc" class="float-left">Add description</label>
                                                <textarea id="postdesc" class="form-control" name="postdesc" maxlength="100"
                                                placeholder="<?= $_SESSION['errors']['post_desc'] ?? 'Post description' ?>"></textarea>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit" name="timeline_post-btn"><i class="fa fa-arrow-circle-o-down pr-1" aria-hidden="true"></i>Post to timeline</button>
                                        </form>
                                    </div><!-- End container for form -->
                                </div><!-- End jumbotron for form -->
                            </div><!-- End container for column 2 section 1 -->
                        </section><!-- End section 1 for column 2 -->

                        <article class="mt-3">
                            <div class="card" style="width: 100%;">

                                <div class="card-header d-flex justify-content-between align-items-center px-2" style="height: 50px;">
                                    <img src="assets/images/profiles/<?= $profile_pic ?>" alt="Profile picture for <?= $username ?>" class="img-thumbnail" style="height: auto; max-width: 40px; display: block;" />
                                    <small>Posted: yyyy-mm-dd hh-mm-ss</small>
                                </div>

                                <div class="card-body p-0">
                                    <img class="card-img-top img-fluid" src="assets/images/profile_1-post_1.jpg" alt="Card image cap" />
                                    <p class="card-text text-left bg-light py-2 px-4 m-0">
                                        <small>Some quick example text to build on the card title and make up the bulk of the card's content.</small>
                                    </p>
                                    <!-- <div class="form-group m-0">
                                    <textarea class="form-control post-desc" readonly name="postdesc" style="border-radius: 0px; border: 0;" maxlength="100">Some quick example text to build on the card title and make up the bulk of the card's content.</textarea>
                                    </div> -->
                                </div>

                                <div class="card-footer d-flex justify-content-between align-items-center px-2">

                                    <button type="button" id="like-btn-1" class="p-1 border-0 bg-light btn">
                                        <i class="fa fa-heart" aria-hidden="true"><small class="pl-1">Like</small></i>
                                    </button>

                                    <!-- <button type="button" id="like-btn-2" class="p-1 border-0 bg-light btn">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"><small class="pl-1">Like</small></i>
                                    </button>

                                    <button type="button" id="dislike-btn" class="p-1 border-0 bg-light btn">
                                    <i class="fa fa-thumbs-down" aria-hidden="true"><small class="pl-1">Dislike</small></i>
                                    </button> -->

                                    <div>
                                        <button id="edit-post" type="button" class="btn-small btn-info"><i class="fa fa-pencil-square-o pr-1" aria-hidden="true"></i>Edit</button>
                                        <button id="delete-post" type="button" class="btn-small btn-danger disabled"><i class="fa fa-trash-o pr-1" aria-hidden="true"></i>Delete</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div><!-- End column 2 -->

            </div><!-- End main row -->
        </div><!-- End main container -->
    </main>

<?php require __DIR__.'/views/footer.php'; ?>
