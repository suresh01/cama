<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>Summary By Zon/Sub Zon</title>

@include('includes.header', ['page' => 'report'])
					
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">	
					<br>
				<div class="breadCrumbHolder module">	
				<div id="breadCrumb3" style="/*float:right;*/" class="breadCrumb module grid_6">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Laporan</a></li>
						<li><a href="#">Statistik</a></li>
						<li>Ringkasan  Mukim/Kawasan</li>
					</ul>
				</div>
				</div>
				
				<div style="float:right;margin-right: 10px;"  class="btn_24_blue">	
					<a  href="#" onclick="deleteProperty()" >Jana Laporan</a>				
					@include('report.statistical.zonesearch')
				</div>
				<br>
				
				<div id="addDetail" style="display:none;width: 80%;" class="grid_12">
					<div class="widget_wrap">
						
						<div class="widget_content">
							<h3 id="title">Jana Laporan</h3>
							{{-- <form style="" id="generateform" method="post" action="generatesummaryzone" target="_blank">
					            @csrf
								<div  class="grid_12 form_container left_label">
									<ul>
										<li>											
											<fieldset>
												<legend>Maklumat Tambahan</legend>
												
												<input type="hidden" name="termid" id="gtermid">
												<div class="form_grid_12">
													<label class="field_title" id="llevel" for="level">Tajuk<span class="req">*</span></label>
													<div  class="form_input">
														<input id="title" value="STATISTIK HARTA MENGIKUT KAWASAN SEHINGGA PENGGAL" name="title" type="text"  maxlength="50" class="required"/>
													</div>
													<span class=" label_intro"></span>
												</div>

											
											</fieldset>

					
										</li>
									</ul>
								</div>
								
								<div class="grid_12">							
									<div class="form_input">
										<button id="addsubmit" name="adduser" class="btn_small btn_blue"><span>Jana</span></button>									
										
										<button id="close" name="close" type="button" class="btn_small btn_blue simplemodal-close"><span>Tutup</span></button>
										<span class=" label_intro"></span>
									</div>								
									<span class="clear"></span>
								</div>
							</form> --}}
						</div>
					</div>
				</div>
				
				<div class="widget_wrap">					
					<div class="widget_content">						
						<table id="proptble" class="display select">
							<thead style="text-align: left;">
								<tr>
									<th><input name="select_all" value="1" type="checkbox"></th>
									<th class="table_sno">
										S No
									</th>
									<th>
										Mukim
									</th>
									<th>
										Taman/Kawasan
									</th>
									<th>
										Bil Harta
									</th>
									<th>
										NT
									</th>
									<th>
										Cukai
									</th>		
								</tr>
							</thead>
							<tbody>			
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<input type="hidden" name="termid" id="termid">
			
		<form style="display: hidden;" id="generateform" method="post" action="generatesummaryzone" target="_blank">
            @csrf
            <input type="hidden" name="subzone_id" id="subzone_id">
			<input type="hidden" name="idterm" id="idterm">
            <input type="hidden" name="titlereport" id="titlereport">
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
			//alert();
			var title = prompt("Report Title", "STATISTIK HARTA MENGIKUT KAWASAN SEHINGGA PENGGAL");
			var table = $('#proptble').DataTable();
//console.log(table.rows('.selected').data());
			var subzone = $.map(table.rows().data(), function (item) {
				//console.log(item);
	        	return item['subzone_id']
	   		});

			if (title == null || title == "") {
				return;
			} else {
				var id = $('#termid').val();
				
				// window.location = "generatesummaryzone?title="+tilte+"&termid="+id+"&subzone_id="+subzone;
				var noty_id = noty({
				layout : 'center',
				text: 'Jana Laporan?',
				modal : true,
				buttons: [
					{type: 'button pink', text: 'Jana', click: function($noty) {
						$noty.close();
						$('#subzone_id').val(subzone.toString());
						$('#idterm').val(id.toString());
						// var tilte = prompt("Report Title", "STATISTIK HARTA MENGIKUT KAWASAN SEHINGGA PENGGAL ");
						$('#titlereport').val(title.toString());
						// alert($('#idterm').val() + '/' + $('#titlereport').val() + '/' + $('#subzone_id').val());
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
			}
			//var type = "delete";
			
			
			
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
		        "retrieve": true,
		        /*"dom": '<"toolbar">frtip',*/
				"lengthMenu":  [100, 200, 500, 1000],
		        // ajax: '{{ url("inspectionproperty") }}',
		        /*"ajax": '/bookings/datatables',*/
		        "columns": [
			        {"data": "subzone_id", "orderable": false, "searchable": false, "name":"_id" },
			        {"data": null, "name": "sno"},
			        {"data": "zone", "name": "account number"},
			        {"data": "subzone", "name": "fileno"},
			        {"data": "propcount", "name": "zone", "className": "number_algin" },
			        {"data": "vt_approvednt", "name": "subzone","render": $.fn.dataTable.render.number( ',', '.', 2 ), "className": "number_algin" },
			        {"data": "vt_approvedtax", "name": "owner","render": $.fn.dataTable.render.number( ',', '.', 2 ), "className": "number_algin" }
		   		],
		   		"fnRowCallback": function (nRow, aData, iDisplayIndex) {
		   			var oSettings = this.fnSettings();
  	
			        $("td:nth-child(2)", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
			        return nRow;
			    },
			    "sPaginationType": "full_numbers",
			"iDisplayLength": 100,
			"oLanguage": {
		        "sLengthMenu": "<span class='lenghtMenu'> _MENU_</span><span class='lengthLabel'>Entries per page:</span>",	
		    },
		    'columnDefs': [{
         'targets': 0,
         'searchable': true,
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

   // Handle click on table cells with checkboxes
   $('#proptble').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', $('#proptble').DataTable().table().container()).on('click', function(e){
      if(this.checked){
         $('#proptble tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#proptble tbody input[type="checkbox"]:checked').trigger('click');
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