<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{__('ownershiptran.Ownership_Transfer_Process')}} </title>
<style>
.disabled-btn{
    pointer-events:none;
    opacity:0.7;
}
</style>
@include('includes.header-popup', ['page' => 'VP'])
	
	<div id="content">
		<div class="grid_container">

		<div id="usertable" class="grid_12">	
			

				<div style="float:right;margin-right: 0px;"  class="btn_24_blue">   
					<a href="#" id="" onclick="closeWindow()" class=""><span>{{__('common.Close')}}  </span></a> 
				</div>
			<br>

			<div class="grid_12 full_block">
				<div class="widget_wrap">
					<div class="widget_top">
						<!--<span class="h_icon list"></span>-->
						<h6>{{__('ownershiptran.Property_Inspection')}} </h6>
						<div id="top_tabby">
						</div>
					</div>
					<input type="hidden" value="" id="propertystatus" >
					<div class="widget_content">
						<!--<h3>Property Registration</h3>-->
						<form action="" id="propertyinspectionform" class="form_container left_label">
							@foreach ($owndetail as $owner)
							<fieldset title="Step 1">		
								<legend>{{__('ownershiptran.Owner_Address_Information')}} </legend>	
								<div id="tab3">
									
									<div class="grid_6 ">
										<ul>
										<li>
										<fieldset>
												<legend>{{__('ownershiptran.Owner_Information')}} </legend>
												<br><br><br>
												<div class="form_grid_12">
											<label class="field_title" id="lusername" for="username">{{__('ownershiptran.Owner_Application_Type')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="ownaplntype" name="ownaplntype" tabindex="1">
													<option></option>
													<option value='C'>CMK</option>
													<option value='K'>KAD</option>
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Type_Of_Owner')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="typeofown" name="typeofown" tabindex="1">
													<option></option>
													@foreach ($owntype as $rec)
														<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Number')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="ownnum" readonly="true" name="ownnum" value="{{$owner->TO_OWNNO}}" type="text" tabindex="1"  maxlength="15" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Name')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="ownname" readonly="true" value="{{$owner->TO_OWNNAME}}" name="ownname" tabindex="1" type="text"  maxlength="80" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 1<span class="req">*</span></label>
											<div  class="form_input">
												<input id="ownaddr1" readonly="true" name="ownaddr1"  tabindex="1"  type="text" value="{{$owner->TO_ADDR_LN1}}" maxlength="50" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 2</label>
											<div  class="form_input">
												<input id="ownaddr2" readonly="true" value="{{$owner->TO_ADDR_LN2}}" name="ownaddr2"  tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 3</label>
											<div  class="form_input">
												<input id="ownaddr3" readonly="true" name="ownaddr3" tabindex="1"  type="text" value="{{$owner->TO_ADDR_LN3}}" maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Owner_Addres')}} 4</label>
											<div  class="form_input">
												<input id="ownaddr4" readonly="true" value="{{$owner->TO_ADDR_LN4}}" name="ownaddr4" tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Postcode')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="ownpostcode" value="{{$owner->TO_POSTCODE}}" readonly="true" name="ownpostcode" tabindex="1" type="number"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.City')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="city"  name="city" tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.State')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="ownstate" name="ownstate" tabindex="1">
													<option></option>
													@foreach ($state as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
												<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Tel_No')}} <span class="req">*</span></label>
												<div  class="form_input">
													<input id="telno" readonly="true" name="telno" tabindex="1" type="text" value="{{$owner->TO_TELNO}}" maxlength="15" class=""/>
												</div>
												<span class=" label_intro"></span>
											</div>
											<div class="form_grid_12">
												<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Fax_No')}} <span class="req">*</span></label>
												<div  class="form_input">
													<input id="faxno" readonly="true" name="faxno" tabindex="1" type="text" value="{{$owner->TO_FAXNO}}" maxlength="15" class=""/>
												</div>
												<span class=" label_intro"></span>
											</div>
										
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Citizenship')}}<span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="citizen" name="citizen" tabindex="1">
													<option></option>
													@foreach ($citizen as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Race')}}<span class="req">*</span></label>
											<div  class="form_input"><select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="race" name="race" tabindex="1">
													<option></option>
													@foreach ($race as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Numerator')}}</label>
											<div  class="form_input">
												<input id="numerator" readonly="true" tabindex="1" name="numerator" value="{{$owner->TO_NUMETR}}" maxlength="5"  type="number" onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Denominator')}}</label>
											<div  class="form_input">
												<input id="demominator" onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;"  name="demominator" value="{{$owner->TO_DENOMTR}}" readonly="true"  type="number" tabindex="1"  maxlength="5" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										
									</fieldset>
										</li></ul>
									</div>

										<div class="grid_6 ">
										<ul>
										<li>
											<input type="hidden"  name="operation" id="owner_operation2">
											<input type="hidden" name="masterid" id="owner_masterid">
											<input type="hidden" name="owneraccnum" id="owneraccnum">
											<input type="hidden" value="0" name="ownerid" id="ownerid">
											<input type="hidden" value="0" name="tableindex" id="tableindex">
										
										<fieldset>
												<legend>{{__('ownershiptran.New_Owner_Information')}} </legend>

												<div class="form_grid_12">
													<label class="field_title">{{__('ownershiptran.Copy_Previous_Owner_Detail')}} </label>
													<div class="form_input">
														<span>
														<input name="field08" id="copydetail" onchange="copyDetail()" class="checkbox" type="checkbox"  tabindex="7">
														
														</span>
													</div>
												</div>
												<div class="form_grid_12">
											<label class="field_title" id="lusername" for="username">{{__('ownershiptran.Owner_Application_Type')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="nownaplntype" name="nownaplntype" tabindex="1">
													<option></option>
													<option value='C'>CMK</option>
													<option value='K'>KAD</option>
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Type_Of_Owner')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="ntypeofown" name="ntypeofown" tabindex="1">
													<option></option>
													@foreach ($owntype as $rec)
														<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Number')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="nownnum" name="nownnum"  type="text" tabindex="1"  maxlength="15" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Name')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="nownname" name="nownname" tabindex="1" type="text"  maxlength="80" />
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 1<span class="req">*</span></label>
											<div  class="form_input">
												<input id="nownaddr1" name="nownaddr1" tabindex="1"  type="text"  maxlength="50" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 2</label>
											<div  class="form_input">
												<input id="nownaddr2" name="nownaddr2" tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Owner_Addres')}} 3</label>
											<div  class="form_input">
												<input id="nownaddr3" name="nownaddr3" tabindex="1"  type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Owner_Addres')}} 4</label>
											<div  class="form_input">
												<input id="nownaddr4" name="nownaddr4" tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Postcode')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="nownpostcode"  name="nownpostcode" tabindex="1" type="number"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.City')}} <span class="req">*</span></label>
											<div  class="form_input">
												<input id="ncity"  name="ncity" tabindex="1" type="text"  maxlength="50" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.State')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="nownstate" name="nownstate" tabindex="1">
													<option></option>
													@foreach ($state as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
												<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Tel_No')}}<span class="req">*</span></label>
												<div  class="form_input">
													<input id="ntelno" name="ntelno" tabindex="1" type="text" value="" maxlength="15" class=""/>
												</div>
												<span class=" label_intro"></span>
											</div>
											<div class="form_grid_12">
												<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Fax_No')}} <span class="req">*</span></label>
												<div  class="form_input">
													<input id="nfaxno" name="nfaxno" tabindex="1" type="text" value="" maxlength="15" class=""/>
												</div>
												<span class=" label_intro"></span>
											</div>
										
										<div class="form_grid_12">
											<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Citizenship')}} <span class="req">*</span></label>
											<div  class="form_input">
												<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="ncitizen" name="ncitizen" tabindex="1">
													<option></option>
													@foreach ($citizen as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Race')}} <span class="req">*</span></label>
											<div  class="form_input"><select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="nrace" name="nrace" tabindex="1">
													<option></option>
													@foreach ($race as $rec)
															<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
													@endforeach	
												</select>
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Numerator')}} </label>
											<div  class="form_input">
												<input id="nnumerator" tabindex="1" name="nnumerator" value="0" maxlength="5"  type="number" onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;" />
											</div>
											<span class=" label_intro"></span>
										</div>
										<div class="form_grid_12">
											<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Denominator')}} </label>
											<div  class="form_input">
												<input id="demominator" onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;" name="demominator" value="0"  type="number" tabindex="1"  maxlength="5" class=""/>
											</div>
											<span class=" label_intro"></span>
										</div>

										
									</fieldset>
										</li></ul>
									</div>

								</div>	
							</fieldset>
							<script type="text/javascript">
								$(document).ready(function(){
									$("#ownstate").val('{{$owner->TO_STATE_ID}}');
									$("#race").val('{{$owner->TO_RACE_ID}}');
									$("#citizen").val('{{$owner->TO_CITIZEN_ID}}');
									$("#typeofown").val('{{$owner->TO_OWNTYPE_ID}}');
									$("#ownaplntype").val('{{$owner->TO_OWNERAPPLNTYPE_ID}}');

									$( "#addtrndate" ).datepicker({dateFormat: 'dd/mm/yy'});
						 			//$( "#addacceptdt" ).datepicker({dateFormat: 'dd/mm/yy'});
						 			$( "#reqdate" ).datepicker({dateFormat: 'dd/mm/yy'});
						 			$("#addacceptdt").val('{{$owner->otar_createdate}}');
						 			$("#addref").val('{{$owner->ma_fileno}}');
								});
							</script>
							@endforeach
							<fieldset title="Step 2">
								<legend>{{__('ownershiptran.Applicant_Information')}} </legend>
								<div>
									<div class="grid_12 ">
								<ul>
								<li>
									<input type="hidden"  name="operation" id="owner_operation2">
									<input type="hidden" name="masterid" id="owner_masterid">
									<input type="hidden" value="{{$account}}" name="owneraccnum" id="owneraccnum">
									<input type="hidden" value="{{$page}}" name="page" id="page">
									<input type="hidden" value="0" name="ownerid" id="ownerid">
									<input type="hidden" value="0" name="tableindex" id="tableindex">
								<div class="grid_6 ">
								<fieldset>
										<legend>{{__('ownershiptran.Applicant_Information')}} </legend>

										<div class="form_grid_12">
											<label class="field_title">{{__('ownershiptran.is_Applicant')}} </label>
											<div class="form_input">
												<span>
												<input name="field08" id="copyadddetail" onchange="copyAddDetail()" class="checkbox" type="checkbox"  tabindex="7">
												
												</span>
											</div>
										</div>
								
								
								<div class="form_grid_12">
									<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Name')}}<span class="req">*</span></label>
									<div  class="form_input">
										<input id="addname" name="addname" tabindex="1" type="text"  maxlength="80" />
									</div>
									<span class=" label_intro"></span>
								</div>
								

								<div class="form_grid_12">
									<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Address')}} 1<span class="req">*</span></label>
									<div  class="form_input">
										<input id="addaddr1" name="addaddr1" tabindex="1"  type="text"  maxlength="50" />
									</div>
									<span class=" label_intro"></span>
								</div>
								<div class="form_grid_12">
									<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Address')}} 2</label>
									<div  class="form_input">
										<input id="addaddr2" name="addaddr2" tabindex="1" type="text"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
									<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Address')}} 3</label>
									<div  class="form_input">
										<input id="addaddr3" name="addaddr3" tabindex="1"  type="text"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>
								<div class="form_grid_12">
									<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Address')}} 4</label>
									<div  class="form_input">
										<input id="addaddr4" name="addaddr4" tabindex="1" type="text"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
									<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Postcode')}} <span class="req">*</span></label>
									<div  class="form_input">
										<input id="addpostcode"  name="addpostcode" tabindex="1" type="number"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>
								<div class="form_grid_12">
									<label class="field_title" id="llevel" for="level">{{__('ownershiptran.State')}} <span class="req">*</span></label>
									<div  class="form_input">
										<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select" id="addstate" name="addstate" tabindex="1">
											<option></option>
											@foreach ($state as $rec)
													<option value='{{ $rec->tdi_key }}'>{{ $rec->tdi_value }}</option>
											@endforeach	
										</select>
									</div>
									<span class=" label_intro"></span>
								</div>


								</fieldset>
								</div>
								@if($page == 1)

								<fieldset>
										<legend>{{__('ownershiptran.General_Information')}} </legend>
								<div class="form_grid_12">
										<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Request_Date')}}<span class="req">*</span></label>
										<div  class="form_input">
										<input id="reqdate"  name="reqdate" class="" type="text"  maxlength="50" />
										</div>
										<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
										<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Accept_Date')}}<span class="req">*</span></label>
										<div  class="form_input">
										<input id="addacceptdt" readonly="" name="addacceptdt" class="" type="text"  maxlength="50" />
										</div>
										<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
										<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Transaction_Date')}}<span class="req">*</span></label>
										<div  class="form_input">
										<input id="addtrndate"  name="addtrndate" class="" type="text"  maxlength="50" />
										</div>
										<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
									<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Tranaction_Value')}}<span class="req">*</span></label>
									<div  class="form_input">
										<input id="addtrnvalue" value="0" name="addtrnvalue" tabindex="1" type="number"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
									<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Reference_No')}}<span class="req">*</span></label>
									<div  class="form_input">
										<input id="addref" readonly="" name="addref" tabindex="1" type="text"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>

								<div class="form_grid_12">
									<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Applicant_Reference_No')}} <span class="req">*</span></label>
									<div  class="form_input">
										<input id="addapplicatref"  name="addapplicatref" tabindex="1" type="text"  maxlength="50" class=""/>
									</div>
									<span class=" label_intro"></span>
								</div>
							</fieldset>
								@endif
								</li></ul>
							</div>

								</div>
							</fieldset>
							
							
							<input type="submit" onclick="transfer()" class="finish" id="finish" value="Kemaskini!"/>
						</form>
					</div>
				</div>
			</div>
			</div>	
	</div>
	<div class="" id="finishloader"></div>
	<span class="clear"></span>
	
</div>


	<div id="addDetail" style="display:none" class="grid_12">
					<div class="widget_wrap">
						
						<div class="widget_content">
							<h3 id="title">{{__('ownershiptran.Generate_Report')}} </h3>
							<form style="" id="generateform" method="GET" action="generateOwnershipreport">
					            @csrf
					            <input type="hidden" name="type" id="type">
					            <input type="hidden" name="accountnumber" id="accountnumber">
								<div  class="grid_12 form_container left_label">
									<ul>
										<li>
											
											<fieldset>
												<legend>{{__('ownershiptran.Additional_Information')}} </legend>
												
												<div class="form_grid_12">
													<label class="field_title" id="lposition" for="position">{{__('ownershiptran.Valuer_Tittle')}} <span class="req">*</span></label>
													<div  class="form_input">
														<select data-placeholder="Choose a Status..." style="width:100%" class="cus-select"  id="tittle" tabindex="7" name="tittle" tabindex="20">
																<option></option>
															@foreach ($userlist as $rec)
																	<option value='{{ $rec->usr_position }}'>{{ $rec->tbuser }}</option>
															@endforeach	
														</select>
													</div>
													<span class=" label_intro"></span>
												</div>
												
												<div class="form_grid_12">
													<label class="field_title" id="llevel" for="level">{{__('ownershiptran.Valuer_Name')}} <span class="req">*</span></label>
													<div  class="form_input">
														<input id="name" name="name"  type="text"  maxlength="50" class="required"/>
													</div>
													<span class=" label_intro"></span>
												</div>
											
											</fieldset>

					
										</li>
									</ul>
								</div>
								
								<div class="grid_12">							
									<div class="form_input">
										<button id="addsubmit" name="adduser" class="btn_small btn_blue"><span>{{__('common.Submit')}} </span></button>									
										
										<button id="close" name="close" type="button" class="btn_small btn_blue simplemodal-close"><span>{{__('common.Close')}} </span></button>
										<span class=" label_intro"></span>
									</div>								
									<span class="clear"></span>
								</div>
							</form>
						</div>
					</div>
				</div>
<script type="text/javascript">
	function closeWindow(){
	    try {
	        window.opener.HandlePopupResult(sender.getAttribute("result"));
	    }
	    catch (err) {}
	    window.close();
	    return false;
  	}

  	function copyAddDetail(){
		if($('#copyadddetail').prop("checked") == true){

			$('#addname').val($("#ownname").val());
			$('#addaddr1').val($("#ownaddr1").val());
			$('#addaddr2').val($("#ownaddr2").val());
			$('#addaddr3').val($("#ownaddr3").val());
			$('#addaddr4').val($("#ownaddr4").val());
			$('#addpostcode').val($("#ownpostcode").val());
			$('#addstate').val($("#ownstate").val());
			
        } else if($('#copyadddetail').prop("checked") == false){
           
			$('#addname').val('');
			$('#addaddr1').val('');
			$('#addaddr2').val('');
			$('#addaddr3').val('');
			$('#addaddr4').val('');
			$('#addpostcode').val('');
			$('#addstate').val('');
        }
		
	}

	function copyDetail(){
		if($('#copydetail').prop("checked") == true){
            $('#nownaplntype').val($("#ownaplntype").val());
			$('#ntypeofown').val($("#typeofown").val());
			//$('#lotnum').val($('#city'+id).val());
			$('#nownnum').val($("#ownnum").val());
			$('#nownname').val($("#ownname").val());
			$('#nownaddr1').val($("#ownaddr1").val());
			$('#nownaddr2').val($("#ownaddr2").val());
			$('#nownaddr3').val($("#ownaddr3").val());
			$('#nownaddr4').val($("#ownaddr4").val());
			$('#nownpostcode').val($("#ownpostcode").val());
			$('#nownstate').val($("#ownstate").val());
			$('#ncitizen').val($("#citizen").val());
			$('#nrace').val($("#race").val());
			$('#nnumerator').val($("#numerator").val());
			$('#ndemominator').val($("#demominator").val());
			$('#nfaxno').val($("#faxno").val());
			$('#ntelno').val($("#telno").val());

			$("#nownstate").val($("#ownstate").val());
			$("#nrace").val($("#race").val());
			$("#ncitizen").val($("#citizen").val());
			$("#ntypeofown").val($("#typeofown").val());
			$("#nownaplntype").val($("#ownaplntype").val());
        }
        else if($('#copydetail').prop("checked") == false){
            $('#nownaplntype').val('');
			$('#ntypeofown').val('');
			//$('#lotnum').val($('#city'+id).val());
			$('#nownnum').val('');
			$('#nownname').val('');
			$('#nownaddr1').val('');
			$('#nownaddr2').val('');
			$('#nownaddr3').val('');
			$('#nownaddr4').val('');
			$('#nownpostcode').val('');
			$('#nownstate').val('');
			$('#ncitizen').val('');
			$('#nrace').val('');
			$('#nnumerator').val('');
			$('#ndemominator').val('');

			$("#nownstate").val('');
			$("#nrace").val('');
			$("#ncitizen").val('');
			$("#ntypeofown").val('');
			$("#nownaplntype").val('');
			$('#nfaxno').val('');
			$('#ntelno').val('');
        }
			
	}

	function transfer(){
		//alert($('.reason:checked').length);
		var count=0;
		count = $('.reason:checked').length;
		$('#readsoncount').val(count);
		$("#propertyinspectionform").submit(function(e){
                //alert('submit intercepted');

                e.preventDefault(e);
		var formdata = {};
		$('#propertyinspectionform').serializeArray().map(function(x){formdata[x.name] = x.value;});

		
           
		//console.log(formdata);
			var noty_id1 = noty({
				layout : 'center',
				text: 'Are want to Update?',
				modal : true,
				buttons: [
					{type: 'button blue', text: 'Submit', click: function($noty) {
			  
						$noty.close();

						var d=new Date();
						$.ajax({ 
				  				type: 'GET', 
							    url:'ownertransfertrn',
							    headers: {
								    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
						        data:{jsondata:JSON.stringify(formdata),reasoncount:count,approval:'Yes'},
						        success:function(data){
						        	//$('#propertystatus').val('Registered');
									$('#finishloader').html('');
									
										msg = 'Updated';
										type = 'Fail';
									
						        	var noty_id = noty({
										layout : 'top',
										text: msg,
										modal : true,
										type : 'success', 
									});			
						        	if('{{$page}}'==1){
										$('#type').val(type);
										$('#accountnumber').val('{{$account}}');
										//$('#addDetail').modal();
									}
									window.opener.HandlePopupResult(sender.getAttribute("result"));
								
					        	},
						        error:function(data){
										
						        	$('#finishloader').html('');     	
						        		var noty_id = noty({
										layout : 'top',
										text: 'Problem while update!',
										modal : true,
										type : 'error', 
									});
					        	}
					    	});

						  }
					},
					{type: 'button pink', text: 'Cancel', click: function($noty) {
						$noty.close();
					  }
					}
					],
				 type : 'success', 
			 });
		

		
        });


	}

</script>
</body>
</html>