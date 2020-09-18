<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="js/parsley.js"></script>
<script src="build/js/slug.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/fastclick/lib/fastclick.js"></script>
<script src="vendors/nprogress/nprogress.js"></script>

<script src="build/js/custom.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
function mytoggle() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<script type="text/javascript">
        $("body").on('keypress', 'form input',function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
                }
            });
 </script>
<!--<script src="js/bootstrap.min.js"></script>-->
<script src="js/bootstrap-datepicker.js"></script> 
<script type="text/javascript">
            $(function () {
                $('#invoiceDate2').datetimepicker();
            });
        </script>
<?php 
//echo "=====".$page;

if($page=='sale_invoice' || $page=='purchase_return_invoice'  || $page=='update_sales_invoice' || $page=='sales_return_invoice' || $page=='update_sales_return_invoice') { ?>
<script src="js/ajax_sales.js"></script>
<?php }else{ ?>
<script src="js/ajax.js"></script>
<?php }?>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="width: 152px; top: 673px; left: 228px; display: none;"></ul>
<span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
<script type="text/javascript">
	//to check all checkboxes
	$( document ).on( 'change', '#check_all', function () {
		$( 'input[class=case]:checkbox' ).prop( "checked", $( this ).is( ':checked' ) );
	} );

	//deletes the selected table rows
	$( "#delete" ).on( 'click', function () {
		$( '.case:checkbox:checked' ).parents( "tr" ).remove();
		$( '#check_all' ).prop( "checked", false );
		calculateTotal();
	} );


	$( document ).ready( function () {
		//alert('df');
		$( "#datatable-checkbox" ).dataTable().fnDestroy();
		$( '#datatable-checkbox' ).DataTable( {
			"order": [
				[ 0, "desc" ]
			]
		} );
	} );
</script>
<script>
	var oTable;

	$( document ).ready( function () {


		$( '#demo-form2' ).submit( function () {
			oTable = $( '#datatable-checkbox' ).dataTable();
			var sData = oTable.$( 'input' ).serialize();
			$( '#spro' ).val( sData );
			return true;
		} );


	} );
</script>


<script>
	$( '#name' ).on( 'keyup', function () {

		var string = $( this ).val();

		getSlug( string );
		alert(string);
	} );



	function getSlug( string ) {

		var slug = _.str.slugify( string );

		$( '#slug' ).val( slug );

	};
</script>



<?php 
if ($page == "journal_vouchcer" || $page == "cash_payment_voucher"|| $page == "cash_recipt_voucher"|| $page == "debit_node"|| $page == "credit_node"|| $page == "edit_vouchcer" ) {?>


<script>

$totaldebit=0;
$totalcredit=0;
  var d = 1;
$("body").on('click', '#addfield',function(){
  
    var field = ' <tr><td><select class = "form-control" name = "acct_no[]" required ><?php  foreach($tran_accnt as $x2): ?> <option value = "<?php echo $x2->acc_id; ?>" ><?php  echo str_replace("'","/",$x2->title); ?> </option><?php endforeach; ?> </select></td>  <td ><div class = "col-md-12 col-sm-12 col-xs-12 p-0 "><input type = "text" class = "form-control" id="box' + d + '"  name = "particular[]" ></div> </td> <td><div class = "col-md-12 col-sm-12 col-xs-12 p-0" ><input type = "text" class = "form-control valid" id="qty' + d + '"  name = "checkno[]"  ></div> </td>  <td ><div class = "col-md-12 col-sm-12 col-xs-12 p-0 " ><input type = "text"class = "form-control" name = "debit[]"  id="debit' + d + '"  onkeyup="func2()" ></div> </td>  <td><div class="col-md-12 col-sm-12 col-xs-12 p-0 "><input type="text" class="form-control" id="credit' + d + '" onkeyup="func2()"  name="credit[]"></div></td></tr>';
                   
            if ($("#box").val() == "" || $("#box" + (d - 1)).val() == "" ) {
                alert("Please Fill all the fields");
            } 
            
            else {
                totalcredit=$("#creditTotal").val();
                totaldebit=$("#debitTotal").val();
                debit_val=$("#debit"+(d - 1)).val();
                credit_val=$("#credit"+(d - 1)).val();
                // credit_final=Number(totalcredit)+Number(credit_val);
                // debit_final=Number(totaldebit)+Number(debit_val);
                // $("#creditTotal").val(credit_final);
                // $("#debitTotal").val(debit_final);
                $("#addFldTbl tbody").append(field);
                d++;
              
            }
  })


</script>
<script type="text/javascript" language="javascript">
	function func2()
{ //alert("ok");
	dml=document.forms['calculator'];
        // get the number of elements from the document
    len = dml.elements.length;
	$total=0;
	$sub_total=0;
    $total1=0;
	$sub_total1=0;
    for( i=0 ; i<len ; i++)
{ 
     //check the textbox with the elements name
 if (dml.elements[i].name=='debit[]')
      {
		$quantity = dml.elements[i].value;
		//$single_price = dml.elements[i+1].value;
		$total=Number($quantity);
		$sub_total += $total;
        
	//	dml.elements[i+2].value = $total;
		//dml.total_amount.value = $sub_total;
	  }
      if (dml.elements[i].name=='credit[]')
      {
		$quantity1 = dml.elements[i].value;
		//$single_price = dml.elements[i+1].value;
		$total1=Number($quantity1);
		$sub_total1 += $total1;
        
	//	dml.elements[i+2].value = $total;
		//dml.total_amount.value = $sub_total;
	  }
}// for loop.
//alert($sub_total);
$("#debitTotal").val($sub_total);
$("#creditTotal").val($sub_total1);
 }
</script>

<?php }else if($page == "expense"){
?>
<script>
$totalcredit=0;
  var d = 1;
$("body").on('click', '#addfield',function(){
  
    var field = ' <tr><td><select class = "form-control" name = "acct_no[]" required ><?php  foreach($tran_accnt as $x2): ?> <option value = "<?php echo $x2->acc_id; ?>" ><?php  echo str_replace("'","/",$x2->title); ?> </option><?php endforeach; ?> </select></td>  <td ><div class = "col-md-12 col-sm-12 col-xs-12 p-0 "><input type = "text" class = "form-control" id="box' + d + '"  name = "particular[]" ></div> <td><div class="col-md-12 col-sm-12 col-xs-12 p-0 "><input type="text" class="form-control" id="credit' + d + '" onkeyup="func2()"  name="credit[]"></div></td></tr>';
    if ($("#box").val() == "" || $("#box" + (d - 1)).val() == "" ) {
                alert("Please Fill all the fields");
            }
                 else {
                totalcredit=$("#creditTotal").val();
                credit_val=$("#credit"+(d - 1)).val();
                //credit_final=Number(totalcredit)+Number(credit_val);
               // alert(credit_final);
               // $("#creditTotal").val(credit_final);
                $("#addFldTbl tbody").append(field);
                d++;
              
            }
  })


</script>
<script type="text/javascript" language="javascript">
	function func2()
{ //alert("ok");
	dml=document.forms['calculator'];
        // get the number of elements from the document
    len = dml.elements.length;
	$total=0;
	$sub_total=0;
    $total1=0;
	$sub_total1=0;
    for( i=0 ; i<len ; i++)
{ 
     //check the textbox with the elements name
 if (dml.elements[i].name=='debit[]')
      {
		$quantity = dml.elements[i].value;
		//$single_price = dml.elements[i+1].value;
		$total=Number($quantity);
		$sub_total += $total;
        
	//	dml.elements[i+2].value = $total;
		//dml.total_amount.value = $sub_total;
	  }
      if (dml.elements[i].name=='credit[]')
      {
		$quantity1 = dml.elements[i].value;
		//$single_price = dml.elements[i+1].value;
		$total1=Number($quantity1);
		$sub_total1 += $total1;
        
	//	dml.elements[i+2].value = $total;
		//dml.total_amount.value = $sub_total;
	  }
}// for loop.
//alert($sub_total);
$("#debitTotal").val($sub_total);
$("#creditTotal").val($sub_total1);
 }
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
	
</script>

<?php } ?>

<?php 
if($page == "dashboard"){ ?>

<script type="text/javascript">
  $('#short_reports').click(function(){
      $('#short_report_area').toggle('slow');
  });

</script>
<?php }?>