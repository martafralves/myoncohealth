<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3">
                <h3>Professional Login</h3>
                <hr>
                <?php if(session()->getTempdata('error')): ?>
                    <div class = "alert alert-danger" role="alert">
                        <?= session()->getTempdata('error') ?>
                    </div>
                    <?php endif; ?>
                <form action="/adminlogin" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id = "username" value= "<?= set_value('username')?>" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id= "password" placeholder="Password">
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="button-custom btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/">Back to homepage</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>