<div class ="container mt-5">
    <div class = "row">
    <div class = "col-md-12 mt-5">
            <div class = "card">
                <div class = "card-header">
                    <h3>List of Enquiries</h3>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Query</th>
                                <th>Edit/Cancel</th>
                            </tr>
                        </thead>
                        <tbody class="table-content">
                        <?php foreach($enquiry as $row) :?>
                            <tr>
                                <td><?= $row['firstname'] ?></td>
                                <td><?= $row['lastname'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['query'] ?></td>
                                <td>
                                    <a href="<?= base_url('edit_enquiry/'.$row['id']);?>" class = "btn btn-success btn-sm btn-block">Edit</a>
                                    <form action ="<?= base_url('delete/'.$row['id']);?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" id="cancel-btn" class = "btn btn-danger btn-sm btn-block">Resolve</button>
                                    </form> 
                                    <!--<a href="/* base_url('delete/'.$row['id']);?>" class = "btn btn-danger btn-sm btn-block">Resolve</a>-->
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>