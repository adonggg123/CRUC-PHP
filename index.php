
 <?php include('header.php');?>
 <?php include('dbcon.php');?>
        <h2>All Students</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>LAST NAME</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $quert = "select * from students";

            $result = mysqli_query($connection, $quert);
            ?>
                <tr>
                    <td>3</td>
                    <td>Loys</td>
                    <td>Adavan</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Ralph</td>
                    <td>Juab</td>
                    <td>19</td>
                </tr>
            </tbody>
        </table>
<?php include('header.php');?>
    