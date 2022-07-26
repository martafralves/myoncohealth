<div class ="container mt-5">
    <div class = "row">
    <div class = "col-md-12 mt-5">
            <div class = "card">
                <div class = "card-header">
                    <h3>My Appointments
                    <a href="<?= base_url('/book_appointment')?>" class="custom-btn btn btn-primary float-right">New Appointment</a>
                    </h3>
                </div>
                <?php if(session()->get('success')): ?>
                    <div class = "alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <div class = "card-body">
              <table class = "table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Reason</th>
                                <th>Observations</th>
                                <th>Edit/Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($bookings as $row) :?>
                            <tr>
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['time'] ?></td>
                                <td><?= $row['reason'] ?></td>
                                <td><?= $row['observations'] ?></td>
                                <td>
                                    <a href="<?= base_url('edit_appointment/'.$row['bid']);?>" class = "btn btn-success btn-sm btn-block">Edit</a>
                                    <a href="<?= base_url('delete/'.$row['bid']);?>" class = "btn btn-danger btn-sm btn-block">Cancel</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</div>