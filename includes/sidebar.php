
<div class="col-md-4 col-lg-4">
  <script>
function printPage() {
  window.print();
}
</script>


<input type="button" value="Print this page" onclick="printPage()" />



<!-- Google Translator -->
    <div class="card mb-4">
            <h5 class="card-header">Translator</h5>
            <div class="card-body">
              <?php include('includes/translator.php');?>
          </div>
        </div>

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
                    <div class="card-body">
                           <form name="search" action="search.php" method="post">
                                <div class="input-group">

                                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit">Go!</button>
                                        </span>
                               </div>
                            </form>
                    </div>
            </div>
         

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              
                
                  <ul class="list-unstyled mb-0">
                        <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
                            while($row=mysqli_fetch_array($query))
                                {
                        ?>

                    <li>
                      <a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                    </li>
                        <?php } ?>
                  </ul>
                
       
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Recent News</h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>
 </div>
 
