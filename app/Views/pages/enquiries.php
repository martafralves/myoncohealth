<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 mb-5">
                <h3>Contact us</h3>
                <?php if(session()->get('success')): ?>
                    <div class = "alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <hr>
                <form action="/enquiries" method="post">
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
                                <input type="text" class = "form-control" name = "firstname" id = "firstname" value = "">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class = "form-control" name = "lastname" id = "lastname" value = "">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class = "form-control" name = "phone" id = "phone" value = "">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id = "email" value= "" placeholder="Enter your email">
                          </div>
                        </div> 
                        <div class="col-12">  
                    <div class="form-group">
                        <label for="email">Query</label>
                        <textarea class="form-control" name="query" id = "query" placeholder="Enter your query"></textarea>
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                        </div>
                    </div>
                      </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>