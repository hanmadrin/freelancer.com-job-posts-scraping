<?php 
$phpcontent=file_get_contents("https://www.freelancer.com/jobs/wordpress/?ngsw-bypass=&q=wordpress&w=f");
$phpcontent = removeparentNODE(getbyID($phpcontent,'project-list'));
$dom = new domDocument;
$dom->loadHTML($phpcontent);
$dom->preserveWhiteSpace = false;
$childdoma = $dom->childNodes;
foreach($childdoma as $child)
{
    //echo $dom->saveHTML($child);
    $child = $child->C14N();
    getTAG($child,'a');
    //print_r($child);
    //$child->getElementsByTagName('a');
    //$href = $a->attributes->getNamedItem('href');
    //echo $a->C14N();
}

echo $phpcontent;
function getTAG($content,$tag)
{
    $dom= new domDocument;
    echo $dom->loadHTML($content);
    $dom->preserveWhiteSpace = false;
    $doms = $dom->getElementsByTagName('a');
    //$i=0;
    foreach ($doms as $dom)
    {
        
            //echo $dom->nodeValue.'<br>';
            //$i++;
        
        //
    }
    
}
function removeparentNODE($content)
{
    $posbeg=1+strpos($content,'>');
    $content=strrev($content);
    $posend= 2+strpos($content,"/<");
    $content=strrev($content);
    $content=substr($content,$posbeg,(strlen($content)-$posend-$posbeg-3));
    return $content;
}
function getbyID($content,$id)
{
    $dom= new domDocument;
    $dom->loadHTML($content);
    $dom->preserveWhiteSpace = false;
    $dom = $dom->getElementById($id);
    $dom = $dom->C14N();
    return $dom;
}

