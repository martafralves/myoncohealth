<div class="container">
        <div class="row">
            <div class= "col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 mb-5">
                <h3>Book an appointment</h3>
                <hr>
                <form action="/book_appointment" method="post">
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
                                <label for="date">Select Date</label>
                                <input type="date" class = "form-control" name = "date" id = "date" value = "">
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                                <label for="time">Time Slot</label>
                                <select id="time" name="time" value="" class="form-control">
                                    <option selected>Choose a slot</option>
                                    <option>8.30-10 AM</option>
                                    <option>10-12 PM</option>
                                    <option>12-2 PM</option>
                                    <option>2-4 PM</option>
                                    <option>4-5.30 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class = "col-12 col-sm-6">
                            <div class = "form-group">
                            <label for="reason">Reason</label>
                                <select id="reason" name="reason" value="" class="form-control">
                                    <option selected>Select reason</option>
                                    <option>Blood tests</option>
                                    <option>Chemoterapy</option>
                                    <option>See a doctor</option>
                                    <option>See a nurse</option>
                                    <option>CT Scan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">  
                    <div class="form-group">
                        <label for="observations">Observations</label>
                        <textarea class="form-control" name="observations" id = "observations" placeholder="Enter any observations"></textarea>
                    </div>
                    <div class ="row">
                        <div class="col-12 col-sm-4">
                        <button class="btn btn-primary btn-block" type="submit">Book Appointment</button>
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