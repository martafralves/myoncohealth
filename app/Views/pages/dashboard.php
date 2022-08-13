<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "jumbotron">
            <h2>Hello, <?= session()->get('firstname') ?></h2>
            <br>
            <hr>
            <?php if(session()->get('success')): ?>
                    <div class = "alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
            <br>
            <a class="btn btn-primary btn-lg" href="/profile" role="button">Update Profile</a>
            <a class="btn btn-primary btn-lg" href="/book_appointment" role="button">Book appointment</a>
            <a class="btn btn-primary btn-lg" href="/my_appointments" role="button">My Appointments</a>
            </div>
        </div>
    </div>
</div>