<div class ="container mt-5">
    <div class = "row">
    <div class = "col-md-12 mt-5">
            <div class = "card">
                <div class = "card-header">
                    <h3>List of Appointments
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
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Reason</th>
                                <th>Observations</th>
                                <th>Edit/Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($appts as $row) :?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['time'] ?></td>
                                <td><?= $row['reason'] ?></td>
                                <td><?= $row['observations'] ?></td>
                                <td>
                                    <a href="<?= base_url('editappt_admin/'.$row['bid']);?>" class = "btn btn-success btn-sm btn-block">Edit</a>
                                    <!--<a href="<= base_url('delete/'.$row['bid']);?>" class = "btn btn-danger btn-sm btn-block">Cancel</a>-->
                                    <form action ="<?= base_url('delete/'.$row['bid']);?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" id="cancel-btn" class =" btn btn-danger btn-sm btn-block">Cancel</button>
                                    </form> 
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>