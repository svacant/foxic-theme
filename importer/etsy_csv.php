<?php


$file = new SplFileObject("catalog.csv");
$file->setFlags(SplFileObject::READ_CSV);
$file->setCsvControl(';', '"', '\\'); // this is the default anyway though


foreach ($file as $row) {
	
	$i++;
	
	if($i == 2){
		$headers = $row;

	}elseif($i > 2){
	
		$csvArr[] = array_combine($headers, $row);
	}
}



$a= 0;
foreach($csvArr as $val){
	$a++;
	
	$items[$a]['title'] = $val['TITLE'];
	$items[$a]['photo'] = $val['IMAGE1'];
	$items[$a]['photos'][] = $val['IMAGE2'];	
	$items[$a]['photos'][] = $val['IMAGE3'];		
	$items[$a]['photos'][] = $val['IMAGE4'];	
	$items[$a]['photos'][] = $val['IMAGE5'];	
	$items[$a]['photos'][] = $val['IMAGE6'];	
	$items[$a]['photos'][] = $val['IMAGE7'];			
	$items[$a]['price'] = $val['PRICE'];
	$items[$a]['code'] = $val['Variant SKU'];
	$items[$a]['description'] = $val['DESCRIPTION'];
	$items[$a]['category'] = $val['MATERIALS'];
	
	
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




	$phs = $product->appendChild($domtree->createElement('photos'));
	

   
    foreach($photos as $ps){
		if($ps){
			$phs->appendChild($domtree->createElement('photo', $ps));
		}
	}
     
 	

     $product->appendChild($domtree->createElement('price',$price));
 
     $descr = $domtree->createElement('content');
     $descr->appendChild($domtree->createCDATASection($description));
	 $product->appendChild($descr);

}

header("Content-type: text/xml");


 /* get the xml printed */
 echo $domtree->saveXML();

	
	
    /* create a dom document with encoding utf8 */
    $domtree = new DOMDocument('1.0', 'UTF-8');

 
    /* create the root element of the xml tree */
    $xmlRoot = $domtree->createElement("products");
    /* append it to the document created */
    $xmlRoot = $domtree->appendChild($xmlRoot);

