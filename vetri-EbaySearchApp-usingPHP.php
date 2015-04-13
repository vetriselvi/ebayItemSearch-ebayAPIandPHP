<!DOCTYPE html>
<html>
<head>
    <title> EBay Item Search App - by Vetri </title>
        <script>
function clearForm(form){
	
var frm_elements = form.elements;

	for (i = 0; i < frm_elements.length; i++)
	{	
		field_type = frm_elements[i].type.toLowerCase();
		tag_type = frm_elements[i].tagName.toLowerCase();
		switch (field_type)
		{
		case "text":
		case "password":
		case "textarea":
		case "hidden":
			frm_elements[i].value = "";
			break;
		case "radio":
		case "checkbox":
			if (frm_elements[i].checked){
				frm_elements[i].checked = false;
			}
			break;
			
		default:
			break;
		}
		switch (tag_type)
		{
		case "select":
			frm_elements[i].selectedIndex = 0;
			break;
		default:
			break;	
		}
	}
}

     
function validate(){
	
var keyword=document.getElementById("keywords").value;

var pricemin = parseInt(form.startingprice.value);
var pricemax = parseInt(form.endingprice.value);

var hdays = document.getElementById("MaxHandlingTime").value;

	if(keyword == ""){
		alert("Please search using keywords");
		return false;
	}	
	if((pricemin != "") || (pricemax != "")){
		if((test_valid(pricemin)==0) || (test_valid(pricemax)==0) ){
			alert("Please enter only numeric values for Price Range.");
			return false;
		}
			}	
	if((pricemin != "") && (pricemax != "")){
		if(pricemin > pricemax){
			alert("Minimum value for price range should not be more than its maximum.");
			return false;
		}			
	}
	if(hdays != ""){
		if(!days_valid(hdays)){
			alert("Please enter a numeric value greater than 0.");
			return false;
		}

	}	
	
}
	
function test_valid(minmax){	
	var reg = /^[0-9]*[.]?[0-9]+$/;
		if((reg.test(minmax))){
			return true;
		}
		else
			return false;		
}

function days_valid(hdays){
	var reg = /^\d+$/;
	if((hdays > 0) && (reg.test(hdays))){
		return true;
	}
	else 
		return false;
}

    </script>
</head>
<!-- <body>-->
<body>
<div align="center">
	<table>
		<tr align="center">
			<td>
				<img src="http://cs-server.usc.edu:45678/hw/hw6/ebay.jpg" alt="ebay logo">
			</td>
			<td>
				<h1> Shopping </h1>
			</td>
		</tr>
	</table>
</div>
    <br/>
	
    
    <div border= 3px style="margin-left: auto; margin-right: auto;border-style: solid; padding:7px; width: 550px"> 
    	   <p><form name="myForm" method="POST" id="myForm"  onsubmit="return validate()"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  
   <tr>
   <td>
    	<b> Key Words*: </b> </td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <td><input type="text" id="keywords" size="50" name="keywords" value="<?php echo isset($_POST['(keywords)'])?$_POST['(keywords)']:''?>"> </td> </tr> 
	<hr/>
   
	
  <tr>
   <td>
    	<b> Price Range: </b> </td>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <td> from $ </td><td> <input type="text" size="4" id="MinPrice" name="MinPrice" value="<?php echo isset($_POST['MinPrice'])?$_POST['MinPrice']:''?>"> </td> <td> </td><td> to $ </td><td><input type="text" size="4" id="MaxPrice" name="MaxPrice" value="<?php echo isset($_POST['MaxPrice'])?$_POST['MaxPrice']:''?>"> </td> </tr>
		<hr/>
    	
	<td> <b>Condition:</b></td> 
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="Condition[1000]" id= "1000" value="1000" 
/* PHP part */
	<?php if(isset($_POST['Condition']['1000'])){if ($_POST['Condition']['1000'] === "1000") {echo 'checked="checked"';}}?>>&nbsp;New </td>
	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="Condition[3000]" id= "3000" value="3000" 
	<?php if(isset($_POST['Condition']['3000'])){if ($_POST['Condition']['3000'] === "3000") {echo 'checked="checked"';}}?>>&nbsp;Used </td>
	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="Condition[4000]" id= "4000" value="4000" 
	<?php if(isset($_POST['Condition']['4000'])){if ($_POST['Condition']['4000'] === "4000") {echo 'checked="checked"';}}?>>&nbsp;Very Good </td>
	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="Condition[5000]" id= "5000" value="5000" 
	<?php if(isset($_POST['Condition']['5000'])){if ($_POST['Condition']['5000'] === "5000") {echo 'checked="checked"';}}?>>&nbsp; Good </td>

	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="Condition[6000]" id= "6000" value="6000" 
	<?php if(isset($_POST['Condition']['6000'])){if ($_POST['Condition']['6000'] === "6000") {echo 'checked="checked"';}}?>>&nbsp; Acceptable </td>
	<br/><hr/>
	
	
	<td>	<b>Buying formats:</b>  </td>    <td> <input type="checkbox" name="buyingformat[FixedPrice]" id="FixedPrice" value="FixedPrice" 
												<?php if(isset($_POST['buyingformat']['FixedPrice'])){if($_POST['buyingformat']['FixedPrice'] === "FixedPrice") {echo 'checked="checked"';}}?>>&nbsp;Buy It Now</td>
											<td> <input type="checkbox" name="buyingformat[Auction]" id="Auction" value="Auction" 
												<?php if(isset($_POST['buyingformat']['Auction'])){if($_POST['buyingformat']['Auction'] === "Auction") {echo 'checked="checked"';}}?>>&nbsp;Auction</td>	
											<td> <input type="checkbox" name="buyingformat[Classified]" id="Classified" value="Classified" 
												<?php if(isset($_POST['buyingformat']['Classified'])){if($_POST['buyingformat']['Classified'] === "Classified") {echo 'checked="checked"';}}?>>&nbsp;Classified Ad</td>	
										<br/><hr/>
										
										
		<b>Seller:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ReturnsAcceptedOnly" value="NA" 
		<?php if(isset($_POST['ReturnsAcceptedOnly'])) echo 'checked="checked"'; ?> >&nbsp;Returned Accepted<br><hr>
					  
		<b>Shipping:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="FreeShippingOnly" id="FreeShippingOnly" value="NA" 
																								<?php if(isset($_POST['FreeShippingOnly'])) echo 'checked="checked"'; ?>>&nbsp;Free Shipping<br/>
				
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ExpeditedShippingType" id ="ExpeditedShippingType" value="NA"    
					 <?php if(isset($_POST['ExpeditedShippingType'])) echo 'checked="checked"'; ?>>&nbsp;Expedited Shipping available<br/>
					 
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Max handling time(days):&nbsp;<input type="text" size="5" name="MaxHandlingTime" id="MaxHandlingTime" 
					 value="<?php echo isset($_POST['MaxHandlingTime']) ? $_POST['MaxHandlingTime'] : '' ?>" > 
				
						<br/>
						<hr/>
						
		<b>Sort by:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name ="sortOrder" id="sortOrder">
		<option value="BestMatch" <?php if(isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'BestMatch') echo ' selected="selected"';?>  >Best Match</option>
		<option value="PriceHighest" <?php if(isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'PriceHighest') echo ' selected="selected"';?>  >Price: highest first</option>
		<option value="PriceAndShippingHighest" <?php if(isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'PriceAndShippingHighest') echo ' selected="selected"';?>  >Price + Shipping: highest first</option>
		<option value="PriceAndShippingLowest" <?php if(isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'PriceAndShippingLowest') echo ' selected="selected"';?>  >Price + Shipping: lowest first</option>
		</select>
		<br/>
		<hr/>
		<b>Results Per page:</b><select name="paginationInput" id ="paginationInput">
		<option value="5"  <?php if(isset($_POST['paginationInput']) && $_POST['paginationInput'] == '5') echo ' selected="selected"';?> >5</option>
		<option value="10" <?php if(isset($_POST['paginationInput']) && $_POST['paginationInput'] == '10') echo ' selected="selected"';?> >10</option>
		<option value="15" <?php if(isset($_POST['paginationInput']) && $_POST['paginationInput'] == '15') echo ' selected="selected"';?> >15</option>
		<option value="20" <?php if(isset($_POST['paginationInput']) && $_POST['paginationInput'] == '20') echo ' selected="selected"';?> >20</option>
		</select>
		
		<hr/>
<div style="float:right;padding-top:5px;padding-right:30px;">

	<button onclick="return clearForm(this.form);" style="width:80px;">Clear</button>

	<input type="submit" value="Search" name="search" style="width:80px;">

</div>
	<br/>
	</form>
	 </div>

	

<?php if(isset($_POST["search"])):

//  $url=$url . $keywords . $str2 . $MinPrice1 . $str3 . $MaxPrice1 . $str6 . $ReturnsAcceptedOnly . $str7 . $FreeShippingOnly . $str8 . $sortOrder . $str9 . $paginationInput;		
$url="http://svcs.ebay.com/services/search/FindingService/v1?siteid=0?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=StudentU-0374-4d5e-8d25-f9f6601e1dc6&GLOBAL-ID=EBAY-US&keywords=".$_POST['keywords']."&paginationInput.entriesPerPage=".$_POST['paginationInput']."&sortOrder=".$_POST['sortOrder']."";
    
	
$i =0;

	if(!empty($_POST['MaxPrice'])){

		$url .= "&itemFilter[$i].name=MaxPrice&itemFilter[$i].value=".$_POST['MaxPrice'];

		$i++;

		}

	if(!empty($_POST['buyingformat'])) {

	$j = 0;

	$url .= "&itemFilter[$i].name=ListingType";

	foreach($_POST['buyingformat'] as $varj) {

	$url .= "&itemFilter[$i].value[$j]=".$varj;

	$j++;

	}

	}

	if(!empty($_POST['MinPrice']))

	{

	$url .= "&itemFilter[$i].name=MinPrice&itemFilter[$i].value=".$_POST['MinPrice'];

	$i++;

	}

$objReturnsAcceptedOnly = isset($_POST['ReturnsAcceptedOnly']) && $_POST['ReturnsAcceptedOnly'] ? "true" : "false";

	if($objReturnsAcceptedOnly == "true"){

		$url .= "&itemFilter[$i].name=ReturnsAcceptedOnly&itemFilter[$i].value=".$objReturnsAcceptedOnly;
		$i++;

	}

	if(!empty($_POST['Condition'])){

		$j = 0;

		$url .= "&itemFilter[$i].name=Condition";

		foreach($_POST['Condition'] as $varj) {

		$url .= "&itemFilter[$i].value[$j]=".$varj;

		$j++;

	}

	$i++;

	}

$expShip = isset($_POST['ExpeditedShippingType']) && $_POST['ExpeditedShippingType'] ? "true" : "false";

	if($expShip == "true"){

	$url .= "&itemFilter[$i].name=ExpeditedShippingType&itemFilter[$i].value=".$expShip;
	$i++;

	}

	if(!empty($_POST['MaxHandlingTime'])){

	$url .= "&itemFilter[$i].name=MaxHandlingTime&itemFilter[$i].value=".$_POST['MaxHandlingTime'];
	$i++;

	}

$freeShip = isset($_POST['FreeShippingOnly']) && $_POST['FreeShippingOnly'] ? "true" : "false";

	if($freeShip == "true"){

	$url .= "&itemFilter[$i].name=FreeShippingOnly&itemFilter[$i].value=".$freeShip;
	$i++;

	}

$xmlData = simplexml_load_file($url);

	//$str4 . $condition . $str5 . $buyingFormats .
      
 		//echo "1";
		//echo $url;
		/*
		if(isset($_POST['Condition']))
		{
		$countCondition = count($Condition);
		$url = $url . "&itemFilter(0).name=Condition";
		echo "Conditionthing 2.1";
		echo $url;
			for($i=0;$i<$countCondition;$i++) {
				$url = $url . "&itemFilter(0).value(".$i.")=" . $Condition[$i];		// "." should come or not?
				echo "ConditionthingFOR 2.2";
				echo $url;
				}
		}
		if(isset($_POST['ListingType']))
		{
		$countListingType = count($ListingType);
		$url = $url . "&itemFilter(1).name=ListingType";
		echo "ListingTypeThing 3.1";
		echo $url;
			for($j=0;$j<$countListingType;$j++) {
				$url = $url . "&itemFilter(1).value(".$j.")=" . $ListingType[$j];		// "." should come or not?
				echo "listingForloop 3.2";
				echo $url;
				}
		}	
	
		$headers = get_headers($url);
		$errors = substr($headers[0], 9, 3); */
		//		$sxml = simplexml_load_file($url); 
				
		//		if($errors != "404"){ // if no errors occurred 
				
				//$xmlData = simplexml_load_string($url);
				//$retna = '';
			
			//	$Conditions = array();
					
										//}
								//}
					//	$woeids = array();
					
if(($xmlData->paginationOutput->totalEntries)==0):

			//echo "zerothlaw";
			//echo $xmlData->paginationOutput->totalEntries ;
					
		$totalEntries = $xmlData->paginationOutput->totalEntries;
		echo  "<p> <font size=4><b><center> No Results Found!! </center></b></font></p></br></br>";
						
			//echo  $totalEntries ; 					
			//echo ;
else:
			if ($xmlData->ack == "Success") {
				echo "<div style=\"border:solid 2px black;margin:100px;\">";

				 echo "<center> Total&nbsp;Results&nbsp;:&nbsp;". $xmlData->paginationOutput->totalEntries. "</center>";
				 foreach($xmlData->searchResult->item as $elementItem) {	
						echo '<table><tr>';					 
						echo "<div><td ><img src=\"{$elementItem->galleryURL}\" style=\"height:200px;width:200px\"></div></td>"; 
						echo "<td><div style=\"margin-left:230px;margin-top:170px;height:150;\"><a href=\"{$elementItem->viewItemURL}\">{$elementItem->title}</a>";
						 echo "<div style=\"margin-top:25px;\"><b>Condition:</b>{$elementItem->condition->conditionDisplayName}</div>";
						 //Batch - Only for elementItems which are top rated
						 if($elementItem->topRatedListing == "true"){
 echo "<div style=\"margin-top:-38px;margin-left:170px;\"><img src=\"http://cs-server.usc.edu:45678/hw/hw6/itemTopRated.jpg\" style=\"height:70px;width:80px\"></div>";
																}
						if($elementItem->listingInfo->listingType == "FixedPrice" || $elementItem->listingInfo->listingType == "StoreInventory") {
							  echo "<div style=\"margin-top:15px;\"><b>Buy It Now</b></div>";
						}
    
            if($elementItem->listingInfo->listingType == "Auction"){
				echo "<div style=\"margin-top:15px;\"><b>Auction</b></div>";      
				}
				
    		if($elementItem->listingInfo->listingType == "Classified"){           
              echo "<div style=\"margin-top:15px;\"><b>Classified&nbsp;Ad</b></div>";
				}
           	
           	if($elementItem->returnsAccepted == "true"){
                       echo "Seller Accepts returns";
                        }
            
            if($elementItem->shippingInfo->shippingServiceCost == "0.0") {
            	 echo "<br/>Free Shipping --";
           	           }
				else{
					 echo "<br/>Shipping not Free --";
					}
            
            if($elementItem->shippingInfo->expeditedShipping == "true") {
             echo "Expedited Shipping Available --";
				}
            
            echo "Handled for shipping in ".$elementItem->shippingInfo->handlingTime."day(s)";
            
         //   echo "<div style=\"margin-top:15px;\">";
            
            echo "</br><b>Price: \$".$elementItem->sellingStatus->convertedCurrentPrice ;
            
			//Additional shipping charges, addon charge
            if($elementItem->shippingInfo->shippingServiceCost > "0"){
              echo " (+ \$".$elementItem->shippingInfo->shippingServiceCost."for shipping)" ;
            }
            
            echo "</b>&nbsp;&nbsp;<i>" .$elementItem->location."</i>";
            
           
            
           // echo "</div>";
            
          echo "</div> ". "</td>";
            
           // echo "<div style=\"margin-top:25px;\"><hr/></div>";
		    echo "<hr/>";
								} //
			echo "</div>";
			}
			?>
    <?php endif;?>
    <?php endif;?>

<noscript>
</body>
</html>
								
								
						
