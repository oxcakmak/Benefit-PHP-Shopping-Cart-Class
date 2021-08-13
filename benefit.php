<?php
/*
* Author: Osman CAKMAK
* Username: oxcakmak
* E-Mail: info@oxcakmak.com
* Website: https://oxcakmak.com/
*/
if( !headers_sent() && session_status() == PHP_SESSION_NONE ){ session_start(); }
class benefit {
    /*
    * Initializing Cart
    */
    public function __construct(){
        if(isset($_SESSION['benefitCart'])){
            $_SESSION['benefitCart'] = $_SESSION['benefitCart'];
        }else{
            $_SESSION['benefitCart'] = array();
        }
    }
    /*
    * Get All Items
    */
    public function getAll(){
        return $_SESSION['benefitCart'];
    }
    /*
    * Get Item
    */
    public function fetch($item){
        return $_SESSION['benefitCart'][$item];
    }
    /*
    * Get Item Child
    */
    public function fChild($item, $key){
        return @$_SESSION['benefitCart'][$item][$key];
    }
    /*
    * Get Total Sum
    */
    public function tPrice($field){
        $price = 0;
        foreach($_SESSION['benefitCart'] as $item){ $price += $item[$field]; }
        return $price;
    }
    /*
    * Get Item Sum
    */
    public function tiPrice($item, $field){
        return $_SESSION['benefitCart'][$item]["quantity"]*$_SESSION['benefitCart'][$item][$field];
    }
    /*
    * Total Item Count
    */
    public function tItems(){
        return @count($_SESSION['benefitCart']);
    }
    /*
    * Check Item
    */
    public function check($item){
        return @($_SESSION['benefitCart'][$item])?count($_SESSION['benefitCart'][$item]):false;
    }
    /*
    * Check Item Child
    */
    public function cChild($item, $key){
        return @($_SESSION['benefitCart'][$item][$key])?count($_SESSION['benefitCart'][$item][$key]):false;
    }
    /*
    * Check Item Child Value
    */
    public function cChildValue($item, $key, $value){
       foreach($_SESSION['benefitCart'][$item][$key] as $child => $childValue){ if($childValue==$value){ return true; } }
       return false;
    }
    /*
    * Clear
    */
    public function clear(){
        $_SESSION['benefitCart'] = array();
    }
    /*
    * Remove
    */
    public function remove($item){
        if(array_key_exists($item, $_SESSION['benefitCart'])){
            unset($_SESSION['benefitCart'][$item]);
        }
        $this->put();
    }
    /*
    * Remove Child
    */
    public function rChild($item, $key, $value){
        if(array_key_exists($key, $_SESSION['benefitCart'][$item])){
            if($this->cChild($item, $key)>1){ unset($_SESSION['benefitCart'][$item][$key]); }else{ unset($_SESSION['benefitCart'][$item][$key]);}
        }
        $this->put();
    }
    /*
    * Insert
    */
    public function insert($item, $quantity = 1){
        ($quantity)?$quantity=$quantity:$quantity=1;
        if(array_key_exists($item, $_SESSION['benefitCart'])){
            $_SESSION['benefitCart'][$item]['quantity'] = @($_SESSION['benefitCart'][$item]['quantity']+$quantity);
        }else{
            $_SESSION['benefitCart'][$item]['quantity'] = $quantity;
        }
        $this->put();
    }
    /*
    * Field
    */
    public function field($item, $cf = array()){
        foreach($cf as $field => $key){ $_SESSION['benefitCart'][$item][$field] = $key; }
    }
    /*
    * Update
    */
    public function update($item, $cf = array()){
        foreach($cf as $field => $key){ $_SESSION['benefitCart'][$item][$field] = $key; }
        $this->put();
    }
    /*
    * Increment
    */
    public function inc($item){
        $itemQuantity = $_SESSION['benefitCart'][$item]['quantity'];
        if(array_key_exists($item, $_SESSION['benefitCart'])){
            $_SESSION['benefitCart'][$item]['quantity'] = ++$itemQuantity; 
        }
        $this->put();
    }
    /*
    * Decrement
    */
    public function dec($item){
        $itemQuantity = $_SESSION['benefitCart'][$item]['quantity'];
        if(array_key_exists($item, $_SESSION['benefitCart'])){
            $_SESSION['benefitCart'][$item]['quantity'] = --$itemQuantity; 
        }
        $this->put();
    }
    /*
    * Put
    */
    public function put(){
        $_SESSION['benefitCart'] = $_SESSION['benefitCart'];
    }
}
?>
