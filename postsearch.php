
  <?php
  include('includes/config.php');
  ?>

  <html>
   <head>
    <title>All Press Releses</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <style>
     body
     {
      margin:0;
      padding:0;
      background-color:#f1f1f1;
     }
     .box
     {
      width:1080px;
      padding:20px;
      background-color:#fff;
      border:1px solid #ccc;
      border-radius:5px;
      margin-top:25px;
     }
        .container{
            margin-bottom:  10px;
        }
    </style>
    

   </head>
       <body> 
             
                
              
              
                   
         <!-- Navigation --> 
    
              <div class="container box">
                  
                  <h1 align="center">All Traffic Datas</h1><br />
                  <a align="left" href="index.php"> Back To Home </></a>
                  <script> function printPage() {window.print();} </script>


  <input type="button" value=" Print " onclick="printPage()" />

                  <div class="table-responsive"><br />
                      <div class="row">
                          <form method="POST" action="search-news.php">
                            <div class="input-daterange">
                                <div class="col-md-4">
                                    <label>From Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" />
                                </div>
                              <!--For responsive end date box-->
                                <div class="col-md-4">
                                    <label>To Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" />
                                </div>
                                <br>
                                <input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
                            </div>
                          </form>
                      </div>
                        <div class="col-md-4">

            <!-- Search Widget -->
            
              
              
                     <form name="search" action="search.php" method="post">
                <div class="input-group">
             
          <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                  </span>
                </form>
                </div>
              </div>
            </div>
            <br />


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
                            $query = "SELECT * FROM tblposts";
                            $exec = mysqli_query($con,$query) or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($exec)) {
                              ?>
                              <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['PostingDate'];?></td>
                                <td><?php echo '<a href="news-details.php?nid=' . $row['id'] . '" target="_blank">' . $row['PostTitle'] . '</a>'; ?></td>
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



  <!-- <script type="text/javascript" language="javascript" >
  $(document).ready(function(){
   
   $('.input-daterange').datepicker({
    todayBtn:'linked',
    format: "yyyy-mm-dd",
    autoclose: true
   });

   fetch_data('no');

   function fetch_data(is_date_search, start_date='', end_date='')
   {
    var dataTable = $('#posts').DataTable({
     "processing" : true,
     "serverSide" : true,
     "order" : [],
     "ajax" : {
      url:"fetch.php",
      type:"POST",
      data:{
       is_date_search:is_date_search, start_date:start_date, end_date:end_date
      }
     }
    });
   }

   $('#search').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    if(start_date != '' && end_date !='')
    {
     $('#posts').DataTable().destroy();
     fetch_data('yes', start_date, end_date);
    }
    else
    {
     alert("Both Date is Required");
    }
   }); 
   
  });
  </script> -->