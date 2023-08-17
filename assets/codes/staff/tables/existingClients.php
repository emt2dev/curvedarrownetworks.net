<?php

// below, we do the same but show the SRs that haven't been assigned
$query = "SELECT * from presales where completeBool='1'";
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
                <th>Update Lead Stage</th>
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
                        <select name='completeBool' class='cbeExists' id='".$row['id']."'>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>";
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
        ";
    }
// below we close the table


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
                <th>Update Lead Stage</th>
                <th>Completed</th>
            </tr>
        </tfoot>
    </table>
";
?>