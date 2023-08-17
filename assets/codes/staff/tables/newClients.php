<?php

$id = $_SESSION['id'];
$query = "SELECT * from presales where completeBool='0'";
$query = mysqli_query($connection, $query);

echo "
    <table class='table table-success table-striped'>
        <thead>
            <tr>
                <th>Register Date</th>
                <th>Company Name</th>
                <th>Point of Contact</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Preferred Date</th>
                <th>Quantity</th>
                <th>Quote</th>
                <th>Lead Stage</th>
                <th>Update Lead</th>
                <th>Completed</th>
            </tr>
        </thead>
    <tbody>
";



/* THIS DISPLAYS SRs assigned to the logged in staff member */
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        echo "
            <tr>
                <td>".$row['created']."</td>
                <td>".$row['company']."</td>
                <td>".$row['leadName']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phoneNumber']."</td>
                <td>".$row['locatedAt']."</td>
                <td>".$row['preferredDate']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['quote']."</td>";

                echo"
                <form action='assets/codes/controller.php' method='post'>
                    <td class='mb-3'>
                        <textarea name='leadStage' id='' cols='15' rows='5' placeholder='".$row['leadStage']."'></textarea>
                    </td>
                    <td>
                        <input type='text' value='".$row['id']."' name='id' hidden />
                        <input type='submit' name='updateLeadStage__btn' />
                    </td>
                </form>

                <form action='assets/codes/controller.php' method='post'>
                <td>
                    <select name='completeBool' class='cbeNew' id='".$row['id']."'>
                        <option value='0'>No</option>
                        <option value='1'>Yes</option>";
                    echo "
                    </select>
                </td>
                </form>
            </tr>
        ";
    }
} else {
    echo "
        <tr>
            <td colspan='12'>No Leads Yet...</td>  
        </tr>
    </tbody>
    ";
}

echo "
        <tfoot>
            <tr>
                <th>Register Date</th>
                <th>Company Name</th>
                <th>Point of Contact</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Preferred Date</th>
                <th>Quantity</th>
                <th>Quote</th>
                <th>Lead Stage</th>
                <th>Update</th>
                <th>Completed</th>
            </tr>
        </tfoot>
    </table>
";