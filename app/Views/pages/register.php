<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 mb-5">
                <h3>Register</h3>
                <hr>
                <form action="/register" method="post">
                <?php if (isset($validation)):?>
                    <div class = "col-12">
                        <div class ="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class = "row">
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class = "form-control" name = "firstname" id = "firstname" value = "<?= set_value('firstname')?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class = "form-control" name = "lastname" id = "lastname" value = "<?= set_value('lastname')?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class = "form-control" name = "gender" id = "gender" value = "<?= set_value('gender')?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class = "form-control" name = "dob" id = "dob" value = "<?= set_value('dob')?>" placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                    <div class="col-12">  
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <input type="text" class="form-control" name="diagnosis" id = "diagnosis" value= "<?= set_value('diagnosis')?>" placeholder="Enter your Diagnosis">
                    </div>
                    </div> 
                    <div class="col-12">  
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id = "email" value= "<?= set_value('email')?>" placeholder="Enter your Email">
                    </div>
                    </div> 
                    <div class ="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id= "password" placeholder="Password">
                    </div>
                    </div>
                    <div class ="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id= "cpassword" placeholder="Confirm Password">
                    </div>
                    </div>
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="button-custom btn btn-primary btn-block" type="submit">Register</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/login">Already have an account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>