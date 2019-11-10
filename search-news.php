<?php
	include('includes/config.php');
	if(isset($_POST['search']))
	{
		$startDate = $_POST['start_date'];
		$endDate = $_POST['end_date'];
		$query = "SELECT * FROM tblposts WHERE PostingDate BETWEEN '$startDate' AND '$endDate' ORDER BY PostingDate";
		$exec = mysqli_query($con,$query) or die(mysqli_error($con));
		$count = mysqli_num_rows($exec);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search News</title>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
</head>
<body>
	<h1 style="text-align: center;">Search Results</h1>
	<table id="posts" class="table table-bordered table-striped">
        <thead>
        	<tr>
          		<th>ID</th>
                <th>Posting Date</th>
                <th>Post Title</th> 
            </tr>
        </thead>
        <tbody>
        	<?php
        		if($count == 0)
        		{
        			echo "No Records Found";
        		}
        		else
        		{
        			while ($row = mysqli_fetch_array($exec)) {
        				?>
                            <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['PostingDate'];?></td>
                              <td><?php echo '<a href="news-details.php?nid=' . $row['id'] . '" target="_blank">' . $row['PostTitle'] . '</a>'; ?></td>
                            </tr>
                            <?php //quite god
                            //this clickable post titles.... should go to this page and show necessary data from here
        			}
        		}
        	?>
        </tbody>
    </table>
    <div>
    	<a href="index.php" style="text-align: center; margin-left: 40%" class="btn btn-primary">Back</a>
    </div>
</body>
</html



