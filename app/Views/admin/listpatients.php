<div class ="container mt-5">
    <div class = "row">
        <div class = "col-md-12 mt-5">
            <div class = "card">
                <div class = "card-header">
                    <h3>Patient Database
                    <a href="<?= base_url('/addpatient')?>" class="custom-btn btn btn-primary float-right">Add Patient</a>
                    </h3>
                    <?php if(session()->get('success')): ?>
                    <div class = "alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class = "card-body">
                    <table class = "table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Diagnosis</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $row) :?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['firstname'] ?></td>
                                <td><?= $row['lastname'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['dob'] ?></td>
                                <td><?= $row['diagnosis'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <a href="<?= base_url('editpatient/'.$row['id']);?>" class = "btn btn-success btn-sm btn-block">Edit</a>
                                    <a href="<?= base_url('delete/'.$row['id']);?>" class = "btn btn-danger btn-sm btn-block">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>