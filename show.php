<?php
require_once "connection.php";
class Show{
    static function getBugs($DBH){

        $STH=$DBH->query('SELECT id, code, type, message, application FROM bugreport ORDER BY id DESC ');
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        ?>
        <table border="1" cellpadding="15" rules="all">
            <tr>
                <td>ID</td>
                <td>Code</td>
                <td>Type</td>
                <td>Application</td>
                <td>Message</td>
            </tr>
        <?php while ($row=$STH->fetch()){ ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['code'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['message'] ?></td>
                <td><?php echo $row['application'] ?></td>
            </tr>
       <?php }?>
        </table>
   <?php }
}

Show::getBugs($DBH);