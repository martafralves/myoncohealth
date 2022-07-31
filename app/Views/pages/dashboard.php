<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "jumbotron">
            <h2>Hello, <?= session()->get('firstname') ?></h2>
            <br>
            <hr>
            <br>
            <a class="btn btn-primary btn-lg" href="/profile" role="button">Update Profile</a>
            <a class="btn btn-primary btn-lg" href="/" role="button">Book appointment</a>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-6 border">
            <h3>My appointments</h3>
        </div>
    </div>
</div>