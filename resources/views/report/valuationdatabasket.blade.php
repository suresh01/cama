<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>Valuation Data</title>

@include('includes.header', ['page' => 'report'])
	
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">	
					<br>
				<div class="breadCrumbHolder module">	
				<div id="breadCrumb3" style="/*float:right;*/" class="breadCrumb module grid_3">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Laporan</a></li>
						<li>Laporan Senarai Nilaian Pada Bakul</li>
					</ul>
				</div>
				</div>
				
				<div style="float:right;margin-right: 10px;"  class="btn_24_blue">	
					<a href="#" onclick="deleteProperty()">Jana Senarai Nilaian</a>				
					
					@include('report.search.search',['tableid'=>'proptble', 'action' => 'valuationdatatablebasket', 'searchid' => $msearchid])	
				</div>
				<br>				
				<div class="widget_wrap">					
					<div class="widget_content">						
						<table id="proptble" class="display select">
							<thead style="text-align: left;">
								<tr>
									<th></th>
									<th class="table_sno">
										S No
									</th>
									<th>
										Nama Penggal
									</th>
									<th>
										Penggal
									</th>
									<th>
										Nama Bakul
									</th>
									<th>
										Bilangan Harta
									</th>
									<th>			
								</tr>
							</thead>
							<tbody>			
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
				
		<form style="display: hidden;" id="generateform" method="post" action="generateValuationData" target="_blank">
            @csrf
            <input type="hidden" name="accounts" id="accounts">
            <input type="hidden" name="title" id="title">
		</form>
		
	</div>
	<span class="clear"></span>
	
	<script>
		
		function changeField(val){
			if(val == 'table'){
				$('#maxrow').removeAttr('style');
			} else {
				$('#maxrow').attr('style', "display:none;");
			}
		}
		
		function deleteProperty(){
			var table = $('#proptble').DataTable();
			var termdate = '';
//console.log(table.rows('.selected').data());termdate
			var account = $.map(table.rows('.selected').data(), function (item) {
				//console.log(item);
	        	termdate= item['termdate'];
	        	return item['id']
	   		});
			var type = "delete";
			if(account.length > 0) {
			//console.log(account.toString());
				var noty_id = noty({
					layout : 'center',
					text: 'Jana Senarai Nilaian?',
					modal : true,
					buttons: [
						{type: 'button pink', text: 'Jana Senarai Nilaian', click: function($noty) {
							$noty.close();
							$('#accounts').val(account.toString());
							var tilte = prompt("Report Title", "SENARAI NILAIAN PINDAAN DAN HARTA BARU HARTA MAJLIS PERBANDARAN HANG TUAH JAYA BAGI PENGGAL "+termdate);
							$('#title').val(tilte);
							$('#generateform').submit();
						}
						},
						{type: 'button blue', text: 'Cancel', click: function($noty) {
							$noty.close();
						}
						}
						],
					type : 'success', 
				});
			} else {
				alert('Sila Pilih Sekurang-kurangnya 1 Pilihan');
			}
		}
	

		


		function updateDataTableSelectAllCtrl(table){
		   var $table             = table.table().node();
		   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
		   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
		   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

			   // If none of the checkboxes are checked
		   if($chkbox_checked.length === 0){
		      chkbox_select_all.checked = false;
		      if('indeterminate' in chkbox_select_all){
		         chkbox_select_all.indeterminate = false;
		      }

		   // If all of the checkboxes are checked
		   } else if ($chkbox_checked.length === $chkbox_all.length){
		      chkbox_select_all.checked = true;
		      if('indeterminate' in chkbox_select_all){
		         chkbox_select_all.indeterminate = false;
		      }

		   // If some of the checkboxes are checked
		   } else {
		      chkbox_select_all.checked = true;
		      if('indeterminate' in chkbox_select_all){
		         chkbox_select_all.indeterminate = true;
		      }
		   }
		}

$(document).ready(function (){

var table = $('#proptble').DataTable({
		        "processing": false,
		        "serverSide": false,
		        /*"dom": '<"toolbar">frtip',*/
		       /* "ajax": {
		            "type": "GET",
		            "url": 'http://localhost:8000/valuationdatatable',
		            "contentType": 'application/json; charset=utf-8',
				    "headers": {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
		        },*/
									
		       // ajax: '{{ url("inspectionproperty") }}',
		        /*"ajax": '/bookings/datatables',*/
		        "columns": [
			        {"data": "id", "orderable": false, "searchable": false, "name":"id" },
			        {"data": null, "name": "sno"},
			        {"data": "termaname", "name": "account number"},
			        {"data": "termdate", "name": "zone"},
			        {"data": "l_group", "name": "zone"},
			        {"data": "propertycount", "name": "subzone"}
		   		],
		   		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
			        $("td:nth-child(2)", nRow).html(iDisplayIndex + 1);
			        return nRow;
			    },
			    "sPaginationType": "full_numbers",
			"iDisplayLength": 100,
			"oLanguage": {
		        "sLengthMenu": "<span class='lenghtMenu'> _MENU_</span><span class='lengthLabel'>Entries per page:</span>",	
		    },
		    'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      },
        	"bAutoWidth": false,
			"sDom": '<"table_top"fl<"clear">>,<"table_content"t>,<"table_bottom"p<"clear">>'
			});
   // Array holding selected row IDs
   var rows_selected = [];
   
    
   

   // Handle click on checkbox
   $('#proptble tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = $('#proptble').DataTable().row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl($('#proptble').DataTable());

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', $('#proptble').DataTable().table().container()).on('click', function(e){
      if(this.checked){
        $('#proptble tbody input[type="checkbox"]').prop('checked', true);
         $('#proptble tbody tr').addClass('selected');
         $('#info').html(selectedrow() + " Row Selected");
      } else {
         $('#proptble tbody input[type="checkbox"]').prop('checked', false);
         $('#proptble tbody tr').removeClass('selected');
         $('#info').html(selectedrow() + " Row Selected");
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   $('#proptble').DataTable().on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl($('#proptble').DataTable());
   });

   // Handle form submission event

});


	</script>
</div>

</body>
</html>