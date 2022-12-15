<?php



function csv_to_array($input, $delimiter=',')
{
    $header = null;
    $data = array();
    $csvData = str_getcsv($input, "\n");

    foreach($csvData as $csvLine){
        if(is_null($header)) $header = explode($delimiter, $csvLine);
        else{

            $items = explode($delimiter, utf8_encode($csvLine));

            for($n = 0, $m = count($header); $n < $m; $n++){
                $prepareData[$header[$n]] = $items[$n];
            }

            $data[] = $prepareData;
        }
    }

    return $data;
}

$csvArr = csv_to_array(file_get_contents('../catalog.csv'));

/*
    [Handle] => 49534
    [Title] => Powerbank 50000 mAh Schwarz microUSB/USB-C + LED Light (YK-Design YKP-029)
    [Body (HTML)] => 50000 mAh Powerbank zum Aufladen jedes Ger�tes  welches sich mit USB verbinden l�sst.
    [Vendor] => YK Design
    [Standardized Product Type] => 6970960824814
    [Custom Product Type] => 
    [Tags] => 
    [Published] => TRUE
    [Option1 Name] => 
    [Option1 Value] => 
    [Option2 Name] => 
    [Option2 Value] => 
    [Option3 Name] => 
    [Option3 Value] => 
    [Variant SKU] => 6970960824814
    [Variant Grams] => 1200
    [Variant Inventory Tracker] => 
    [Variant Inventory Qty] => 53
    [Variant Inventory Policy] => deny
    [Variant Fulfillment Service] => manual
    [Variant Price] => 46.48
    [Variant Compare At Price] => 
    [Variant Requires Shipping] => 
    [Variant Taxable] => TRUE
    [Variant Barcode] => 6970960824814
    [Image Src] => http://image.mkk-pack.com/49534_0.jpeg
    [Image Position] => 1
    [Image Alt Text] => Powerbank 50000 mAh Schwarz microUSB/USB-C + LED Light (YK-Design YKP-029)
    [Gift Card] => FALSE
    [SEO Title] => Powerbank 50000 mAh Schwarz microUSB/USB-C + LED Light (YK-Design YKP-029)
    [SEO Description] => 50000 mAh Powerbank zum Aufladen jedes Ger�tes  welches sich mit USB verbinden l�sst.
    [Google Shopping / Google Product Category] => Powerbank
    [Google Shopping / Gender] => 
    [Google Shopping / Age Group] => 
    [Google Shopping / MPN] => YKP-029 BLACK
    [Google Shopping / AdWords Grouping] => 
    [Google Shopping / AdWords Labels] => 
    [Google Shopping / Condition] => 
    [Google Shopping / Custom Product] => 
    [Google Shopping / Custom Label 0] => 
    [Google Shopping / Custom Label 1] => 
    [Google Shopping / Custom Label 2] => 
    [Google Shopping / Custom Label 3] => 
    [Google Shopping / Custom Label 4] => 
    [Variant Image] => 
    [Variant Weight Unit] => g
    [Variant Tax Code] => 
    [Cost per item] => 
    [Price / International] => 46.48
    [Compare At Price / International] => 
    [Status] => active
*/

$csvArr = array_slice($csvArr,0, 100);


foreach($csvArr as $val){
	
	$items[]['title'] = $val['Title'];
	$items[]['photo'] = $val['Image Src'];
	
	$items[]['price'] = $val['Variant Price'];
	$items[]['code'] = $val['Variant SKU'];
	$items[]['description'] = $val['SEO Description'];
	$items[]['category'] = $val['Google Shopping / Google Product Category'];
	
	
}



	
    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');



 
 
    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement("products");
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);



foreach($items as $item){
	extract($item);
	
	 $product = $domtree->createElement("product");
     $product = $xmlRoot->appendChild( $product);
  
	 $product->appendChild($domtree->createElement('code',$code));
     $product->appendChild($domtree->createElement('title',$title));
     $product->appendChild($domtree->createElement('category',$category));
     $product->appendChild($domtree->createElement('photo',$photo));
     if($lang == 'pl'){ $price = $price+((int)$price*0.2);  } //PLN
     $price = $price+((int)$price*0.2); //Penso ricarico no?
     $product->appendChild($domtree->createElement('price',$price));
 
     $descr = $domtree->createElement('content');
     $descr->appendChild($domtree->createCDATASection($description));
	 $product->appendChild($descr);

}

header("Content-type: text/xml");


 /* get the xml printed */
 echo $domtree->saveXML();

	$lang= $_GET['lang'] ? $_GET['lang'] : 'en'; //Dinamico
	$brand= $_GET['brand'] ? base64_encode($_GET['brand']) : 'UsOzxbxh'; //Manda il nome del brand
	
	
    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');
	$items = $dbm->catalog_temp->find(array("lang"=>$lang,"clear_brand"=>$brand)); //Extract from temporary
 
 
    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement("products");
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);



foreach($items as $item){
	extract($item);
	
	 $product = $domtree->createElement("product");
     $product = $xmlRoot->appendChild( $product);
  
	 $product->appendChild($domtree->createElement('code',$code));
     $product->appendChild($domtree->createElement('title',$title));
     $product->appendChild($domtree->createElement('category',$category));
     $product->appendChild($domtree->createElement('photo',$photo));
     if($lang == 'pl'){ $price = $price+((int)$price*0.2);  } //PLN
     $price = $price+((int)$price*0.2); //Penso ricarico no?
     $product->appendChild($domtree->createElement('price',$price));
 
     $descr = $domtree->createElement('content');
     $descr->appendChild($domtree->createCDATASection($description));
	 $product->appendChild($descr);

}

header("Content-type: text/xml");


 /* get the xml printed */
 echo $domtree->saveXML();
