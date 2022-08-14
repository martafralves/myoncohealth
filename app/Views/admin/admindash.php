<div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "jumbotron">
            <h2>Hello, <?= session()->get('adminuser') ?></h2>
            <br>
            <hr>
            <?php if(session()->get('success')): ?>
                    <div class = "alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
            <br>
            <a class="custom-btn btn btn-primary btn-lg" href="/listpatients" role="button">List of Patients</a>
            <a class="custom-btn btn btn-primary btn-lg" href="/listappointments" role="button">See Appointment List</a>
            <a class="custom-btn btn btn-primary btn-lg" href="/listenquiries" role="button">See Enquiry List</a>
            </div>
        </div>
    </div>
</div>