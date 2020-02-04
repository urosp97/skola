<?php
    include("init.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
    <title>Files to download</title>
    <link href="filestodownload/css/bootstrap.min.css" rel="stylesheet"/>
	<?php
		include("head.php");
	?>
</head>

<body class="homepage">
	<?php include("headerMeni.php"); ?> 
	
	<br><br><br>
            <div class="bleja">

   
            <div class="container" style="margin-top: 350px; background-color: rgb(219,226,173);" >
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "filestodownload/config.php";
                $stmt = $db->prepare("select * from newfiles");
                $stmt->execute();
                while($row = $stmt->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['filename'] ?></td>
                    <td class="text-center"><a href="filestodownload/download.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Download</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
            
                 

</div>  


</body>
</html>