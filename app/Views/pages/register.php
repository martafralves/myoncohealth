<section>
<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 mb-5 pt-3 pb-3">
                <h3>Sign Up</h3>
                <hr>
                <form action="">
                    <div class="form-group" action="/register" method="post"> 
                    <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="fullname">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name')?>"/>
                                </div>    
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="phone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= set_value('phone')?>"/>
                                </div>    
                            </div>   
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="dob">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" id="dob"/>
                                </div>    
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="gender">Gender</label>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Select</option>
                                        <option name="gender" value="Male">Male</option>
                                        <option name = "gender" value="Female">Female</option>
                                        <option name = "gender" value="Other">Other</option>
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="diagnosis">Diagnosis</label>
                                    <input type="text" class="form-control" name="diagnosis" id="diagnosis" value="<?= set_value('diagnosis')?>"/>
                                </div>    
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for ="nationality">Nationality</label>
                                    <input type="text" class="form-control" name="nationality" id="nationality" value="<?= set_value('nationality')?>"/>
                                </div>    
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="medhistory">Medical History</label>
                                    <textarea class="form-control" aria-label="With textarea" id = "med_hx" name ="med_hx" value="<? set_value('med_hx')?>"></textarea> 
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= set_value('address')?>"/>
                                </div>
                            </div>
                        </div> 
                        <div class = "row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email')?>"/>
                                </div>
                            </div>  
                            <div class="col-12 col-sm-6">
                                <div class = "form-group">
                                    <label for ="password">Password</label>
                                    <input type="password" class = "form-control" name = "password" id = "password">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class = "form-group">
                                    <label for ="cpassword">Confirm Password</label>
                                    <input type="password" class = "form-control" name = "cpassword" id = "cpassword">
                                </div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col-12 col-sm-4">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                            <div class="col-12 col-sm-8 text-right">
                                <a href="/">Already have an account?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>