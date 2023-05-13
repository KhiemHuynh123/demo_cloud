<?php
namespace ProductSpace;
Class Product{
    public $pNo;
    public $pName;
    public $pPrice;
    public $pStatus;
    public $pCat;

//     public function __construct()
//     {
//         $this->pNo = array();
//         echo "This is construct";
//     }
// }
const VAT = 0.1;

public function __construct($pNo, $pName, $pPrice)
{
    $this->pNo = $pNo;
    $this->pNname = $pName;
    $this->pPrice = $pPrice;
}
    public function total():float{
        //
        return $this->pPrice 
        +$this->pPrice*$this:: VAT;
    }
}
class stock{
    public $pName;
    public $pQuantity;
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
{
    echo $this->$name;
}
    function printName():string{
        return $this->pName;
    }
}
// $p1 = new product('P001','Iphone 14',799);
// echo $p1->total();
// $p1 = new product();
// echo "<br>";
// var_dump(is_null($p1->pNo));
// echo "<br>";
// var_dump(isset($p1->pNo));
// echo "<br>";
// var_dump(empty($p1->pNo));
// var_dump($p1 instanceof product);
?>