<?php include "external\header.php"; ?>
<?php include "external\connection.php"; ?>
<h1 class="heading"> Admin <span> Payments </span> </h1>
<?php include "external\dashBtn.php"; ?>
<?php include "tablelinks.php"; ?>

 
 <body>
 <div class="container box">
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th> 
       <th>Doctor Fee</th>
       <th>Hospital Fee</th>
       <th>Lab Fee</th>
       <th>Laundary</th> 
       <th>Total</th>
       <th>Patient ID</th>
       <th>Issued By ID</th> 
       <th>Payment Recieved By ID</th>
       <th>Issued Time</th>
       <th>Recieved Time</th> 
       <th>Status</th>
       <th></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchPayments.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"updatePayment.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
  
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td contenteditable id="data9"></td>';
   html += '<td contenteditable id="data10"></td>';
   html += '<td contenteditable id="data11"></td>';
   html += '<td contenteditable id="data12"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var id = $('#data1').text();
   var doc_fee = $('#data2').text();
   var hos_fee = $('#data3').text();
   var lab_fee = $('#data4').text();
   var laundary = $('#data5').text();
   var total = $('#data6').text();
   var patient_id = $('#data7').text();
   var issued_by_id = $('#data8').text();
   var pay_reby_id = $('#data9').text();
   var issued_time = $('#data10').text();
   var recieved_time = $('#data11').text();
   var status = $('#data12').text();
  
   if(id != '' && doc_fee != ''&& hos_fee != ''lab_fee != '' && laundary != ''&& total != ''patient_id != '' && issued_by_id != ''&& pay_recby_id != ''issued_time != '' && recieved_time != ''&& status != '')
   {
    $.ajax({
     url:"insertPayment.php",
     method:"POST",
     data:{id:id, doc_fee:doc_fee, hos_fee:hos_fee,lab_fee:lab_fee, laundary:laundary, total:total,patient_id:patient_id, issued_by_id:issued_by_id, pay_recby_id:pay_recby_id, issued_time:issued_time, recieved_time:recieved_time, status:status},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"deletePayment.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>