<?php include("init.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Files to download</title>
    <?php include("head.php"); ?> 
</head>
<body>
<?php include("headermeni.php"); ?> 

    <p><br/></p>
    <div class="container" style="margin-top: 100px; background-color: white;">
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fajl</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";
                $stmt = $db->prepare("select * from newfiles");
                $stmt->execute();
                while($row = $stmt->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['filename'] ?></td>
                    <td class="text-center"><a href="download.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>