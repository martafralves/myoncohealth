<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 mb-5">
                <h3>Edit Patient Information</h3>
                <hr>
                <form action="<?=base_url('update/'.$patient['id'])?>" method="post">
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
                                <input type="text" class = "form-control" name = "firstname" id = "firstname" value = "<?= $patient['firstname']?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class = "form-control" name = "lastname" id = "lastname" value = "<?= $patient['lastname']?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class = "form-control" name = "gender" id = "gender" value = "<?= $patient['gender']?>">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class = "form-control" name = "dob" id = "dob" value = "<?= $patient['dob']?>" placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                    <div class="col-12">  
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <input type="text" class="form-control" name="diagnosis" id = "diagnosis" value= "<?= $patient['diagnosis']?>" placeholder="Enter diagnosis">
                    </div>
                    </div> 
                    <div class="col-12">  
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id = "email" value= "<?= $patient['email']?>" placeholder="Enter patient email">
                    </div>
                    </div> 
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Update patient</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/listpatients">Go back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>