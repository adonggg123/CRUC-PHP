<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="container mt-4">
    <div class="box1 mb-3">
        <h2>All Students</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM students";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query Failed: " . mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td>
                        <button 
                            class="btn btn-success editBtn" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-fname="<?php echo $row['first_name']; ?>" 
                            data-lname="<?php echo $row['last_name']; ?>" 
                            data-age="<?php echo $row['age']; ?>"
                            data-toggle="modal" 
                            data-target="#updateModal"
                        >
                            Update
                        </button>
                        </td>
                        <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <?php 
    if (isset($_GET['message'])) {
        echo "<h6>" . htmlspecialchars($_GET['message']) . "</h6>";
    }
    ?>
     <?php 
    if (isset($_GET['insert_msg'])) {
        echo "<h6>" . htmlspecialchars($_GET['insert_msg']) . "</h6>";
    }
    ?>

    <!-- Modal -->
    <form action="insert_data.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="form-group">
                            <label for="f_name">First Name</label>
                            <input type="text" name="f_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="l_name">Last Name</label>
                            <input type="text" name="l_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age"></label>
                            <input type="text" name="age" class="form-control">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- click -->
    <script>
        $(document).ready(function(){
            $('.editBtn').click(function(){
                var id = $(this).data('id');
                var fname = $(this).data('fname');
                var lname = $(this).data('lname');
                var age = $(this).data('age');

                $('#update-id').val(id);
                $('#update-fname').val(fname);
                $('#update-lname').val(lname);
                $('#update-age').val(age);
            });
        });
    </script>
    
    <!-- Update Modal -->
    <form action="update_page_1.php" method="post">
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <input type="hidden" name="id" id="update-id">
                        <div class="form-group">
                            <label for="f_name">First Name</label>
                            <input type="text" name="f_name" id="update-fname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="l_name">Last Name</label>
                            <input type="text" name="l_name" id="update-lname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" id="update-age" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <!-- End of Modal -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
