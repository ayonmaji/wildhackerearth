
<?php
//fetch.php
include('includes/config.php');


$columns = array('id', 'PostingDate','PostTitle');

$query = "SELECT id, PostingDate, PostTitle FROM tblposts WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'PostingDate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR PostingDate LIKE "%'.$_POST["search"]["value"].'%"
  OR PostTitle LIKE "%'.$_POST["search"]["value"].'%")';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
    $sub_array[] = $row["PostingDate"];
 $sub_array[]= $row["PostTitle"];
 $data[] = $sub_array;
}

function get_all_data($con)
{
 $query = "SELECT id, PostingDate, PostTitle, PostUrl FROM tblposts";
 $result = mysqli_query($con, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>