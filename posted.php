<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Express Approval Application</title>
</head>
<?php
error_reporting(0);	
require('fpdm.php');
require 'PHPMailerAutoload.php';
$fields = array(
    'COMPLETE LEGAL COMPANY NAME' => $_POST['legal'],
    'DBA NAME if applicable' => $_POST['dba'],
	'BILLING ADDRESS' => $_POST['billing'],
	'CITY' => $_POST['billingcity'],
	'STATE' => $_POST['billingstate'],
	'ZIP' => $_POST['zip'],
	'PHYSICAL ADDRESS' => $_POST['physicaladdress'],
	'CITY_2' => $_POST['physicalcity'],
	'STATE_2' => $_POST['physicalstate'],
	'ZIP_2' => $_POST['physicalzip'],
	'EQUIPMENT LOCATION' => $_POST['equipmentlocation'],
	'CITY_3' => $_POST['equipmentcity'],
	'STATE_3' => $_POST['equipmentstate'],
	'ZIP_3' => $_POST['equipmentzip'],
	'COUNTY' => $_POST['Country'],
	'BUSINESS PHONE' => $_POST['BusinessPhone'],
	'BUSINESS FAX' => $_POST['BusinessFax'],
	'CONTACT CELL' => $_POST['ContactCell'],
	'NATURE OF BUSINESS' => $_POST['natureof'],
	'radioselect' => $_POST['condition1'],
	'allstates' => $_POST['allstates'],
	'FEDERAL ID' => $_POST['federalid'],
	'STATEUBI' => $_POST['stateubi'],
	'BUSINESS START DATE' => $_POST['businessstartdate'],
	'CURRENT OWNERSHIP yrs' => $_POST['currentownership'],
	'EMAIL ADDRESS' => $_POST['emailaddress'],
	'WEB SITE ADDRESS' => $_POST['websiteaddress'],
	'NAME 1' => $_POST['Name'],
	'TITLE' => $_POST['title'],
	'OWNED' => $_POST['Owned'],
	'SSN' => $_POST['SSN'],
	'HOME PHONE' => $_POST['homephone'],
	'STREET' => $_POST['Street'],
	'CITY_4' => $_POST['City'],
	'ST' => $_POST['State'],
	'ZIP_4' => $_POST['ZIP'],
	'NAME 2' => $_POST['Name2'],
	'TITLE_2' => $_POST['Title2'],
	'OWNED_2' => $_POST['Owned2'],
	'SSN_2' => $_POST['SSN2'],
	'HOME PHONE_2' => $_POST['homephone2'],
	'STREET_2' => $_POST['Street2'],
	'CITY_5' => $_POST['City2'],
	'ST_2' => $_POST['State2'],
	'ZIP_5' => $_POST['ZIP2'],
	'NAME 3' => $_POST['Name3'],
	'TITLE_3' => $_POST['Title3'],
	'OWNED_3' => $_POST['Owned3'],
	'SSN_3' => $_POST['SSN3'],
	'HOME PHONE_3' => $_POST['homephone3'],
	'STREET_3' => $_POST['Street3'],
	'CITY_6' => $_POST['City3'],
	'ST_3' => $_POST['State3'],
	'ZIP_6' => $_POST['ZIP3'],
	'WWT0' => $_POST['Bankruptcy'],
	'WWT1' => $_POST['Bankruptcy2'],
	'WWT' => $_POST['Bankruptcy3'],
	'BANK NAME' => $_POST['bankname'],
	'ACCOUNT NUMBER' => $_POST['accountnumber'],
	'CONTACT PERSON' => $_POST['contactperson'],
	'BANK PHONE NUMBER' => $_POST['bankphonenumber'],
	'COMPANY NAME' => $_POST['companyname'],
	'ACCOUNT NUMBER_2' => $_POST['accountnumber2'],
	'CONTACT PERSON_2' => $_POST['contactperson2'],
	'PHONE NUMBER' => $_POST['phonenumber2'],
	'COMPANY NAMERow1' => $_POST['companyname2'],
	'PHONE Row1' => $_POST['phoneno2'],
	'ACCOUNT Row1' => $_POST['accountno3'],
	'CONTACTRow1' => $_POST['Contact2'],
	'COMPANY NAMERow2' => $_POST['companyname3'],
	'PHONE Row2' => $_POST['phoneno3'],
	'ACCOUNT Row2' => $_POST['accountno4'],
	'CONTACTRow2' => $_POST['Contact3'],
	'LANDLORD NAME' => $_POST['landlordname'],
	'CONTACT PERSON_3' => $_POST['contactperson4'],
	'PHONE' => $_POST['phoneno5'],
	'DESCRIPTION' => $_POST['Description1'],
	'QUANTITY' => $_POST['Quantity'],
	'MODEL' => $_POST['modelno1'],
	'condition' => $_POST['condition'],
	'EQUIPMENT COST' => $_POST['equipmentcost'],
	'LEASE TERM REQUESTED' => $_POST['leasetermrequested'],
	'CONTACT PERSON_4' => $_POST['salesman'],
	'Signature' => $_POST['signature'],
	'Date' => $_POST['Date4'],
	'Title' => $_POST['Title'],
	'Signature_2' => $_POST['signature1'],
	'Date_2' => $_POST['Date1'],
	'Title_2' => $_POST['Title'],
	'DOB1' => $_POST['dateofbirth'],
	'DOB2' => $_POST['dateofbirth2'],
	'DOB3' => $_POST['dateofbirth3']
);

$pdf = new FPDM('creditapp.pdf');
$pdf->Load($fields, false); 
$pdf->Merge();	
$mail = new PHPMailer;	
$mail->IsSMTP(); 
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "quotes@nwbus.com";
$mail->Password = "quotes123!";
$mail->SetFrom("quotes@nwbus.com");
$mail->addAddress('jack@nwbus.com', 'Sales');
$mail->Subject  = 'Credit Application';
$mail->Body     = 'Attached is a credit application';
$attachment= $pdf->Output('creditapp.pdf', 'S');
$mail->AddStringAttachment($attachment, 'creditapp.pdf');

if(!$mail->send()) {
  echo "Mailer Error: ". $mail->ErrorInfo;
} else {
  header('Location: http://www.nwbus.com/');
}
?>
<body>
</body>
</html>