<?php
	include "../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from center where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){

		$array['id'] = $data['id'];
		$array['name'] = $data['name'];
		$array['project_owner'] = $data['project_owner'];
		$array['city'] = $data['city'];
		$array['status'] = $data['status'];
		$array['search_inquiry_date'] = (strtotime($data['search_inquiry_date'])>=1)?date('m/d/Y',strtotime($data['search_inquiry_date'])):"";
		$array['entry_date'] = (strtotime($data['entry_date'])>=1)?date('m/d/Y',strtotime($data['entry_date'])):"";
		$array['growth_type'] = $data['growth_type'];
		$array['agreement_type'] = $data['agreement_type'];
		$array['commercial_term'] = $data['commercial_term'];
		$array['rentable_area'] = $data['rentable_area'];
		$array['local_corporate_guarantee'] = $data['local_corporate_guarantee'];
		$array['corporate_plc_guarantee'] = $data['corporate_plc_guarantee'];
		$array['bank_guarantee'] = $data['bank_guarantee'];
		$array['cash_security_deposit'] = $data['cash_security_deposit'];
		$array['sign_date'] = (strtotime($data['sign_date'])>=1)?date('m/d/Y',strtotime($data['sign_date'])):"";
		$array['center_type'] = $data['center_type'];
		$array['gross_capex'] = $data['gross_capex'];
		$array['landlord_capex_contribution'] = $data['landlord_capex_contribution'];
		$array['net_corporate_capex'] = $data['net_corporate_capex'];
		$array['submit_date'] = (strtotime($data['submit_date'])>=1)?date('m/d/Y',strtotime($data['submit_date'])):"";
		$array['opening_date'] = (strtotime($data['opening_date'])>=1)?date('m/d/Y',strtotime($data['opening_date'])):"";
		$array['approve_date'] = (strtotime($data['approve_date'])>=1)?date('m/d/Y',strtotime($data['approve_date'])):"";
		$array['ws_num'] = $data['ws_num'];
		$array['usable_area'] = $data['usable_area'];
		$array['lead_broker'] = $data['lead_broker'];
		$array['execute_date'] = (strtotime($data['execute_date'])>=1)?date('m/d/Y',strtotime($data['execute_date'])):"";
		$array['center_num'] = $data['center_num'];
		$array['commence_date'] = (strtotime($data['commence_date'])>=1)?date('m/d/Y',strtotime($data['commence_date'])):"";
		$array['street_address'] = $data['street_address'];
		$array['latitude'] = $data['latitude'];
		$array['longitude'] = $data['longitude'];
		$array['comment'] = $data['comment'];
		$array['open_date'] = (strtotime($data['open_date'])>=1)?date('m/d/Y',strtotime($data['open_date'])):"";
		$array['cancel_reason'] = $data['cancel_reason'];
		$array['cancel_date'] = (strtotime($data['cancel_date'])>=1)?date('m/d/Y',strtotime($data['cancel_date'])):"";
		$array['rate'] = $data['rate'];
		$array['target_date'] = (strtotime($data['target_date'])>=1)?date('m/d/Y',strtotime($data['target_date'])):"";

	}
	echo json_encode($array);

?>
