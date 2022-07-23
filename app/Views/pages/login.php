<section>
    <div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3">
                <h3>Sign In</h3>
                <hr>
                <form action="">
                    <div class="form-group" action="" method="post">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id = "email" value= "<?= set_value('email')?>" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id= "password" placeholder="Password">
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/register">Don't have an account yet?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>