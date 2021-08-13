# Benefit-PHP-Shopping-Cart-Class
Benefit PHP Shopping Cart Class (Simple Lightweight)
<hr>

### Table of Contents
**[Initialization](#initialization)**  
**[Get All](#get-all)**  
**[Get Item](#get-item)**  
**[Get Item Child](#get-item-child)**  
**[Get Total Sum](#get-total-sum)**  
**[Get Item Sum](#get-item-sum)**  
**[Total Item Count](#total-item-count)**  
**[Check Item](#check-item)**  
**[Check Item Child](#check-item-child)**  
**[Check Item Child Value](#check-item-child-value)**  
**[clear](#clear)**  
**[Remove](#remove)**  
**[Remove Child](#remove-child)**  
**[Remove Child Value](#remove-child-value)**  
**[Insert](#insert)**  
**[Field](#field)**  
**[Update](#update)**  
**[Increment](#increment)**  
**[Decrement](#decrement)**  
**[Put](#put)**  

### Initialization
First you import the **benefit.php** file in your project

```php
include('benefit.php');
```

### Defining a new class
You can use the following code as an example
```php
/* BCC = Benefit Cart Class */
$bcc = new benefit;
```

### Get All
getAll() command pulls all products added to cart
```php
print_r($bcc->getAll());
/* **OR** */
foreach($bcc->getAll() as $key => $value){
  /*
  * $key = ProductID, hash, crc32
  * $value = array in quantity, amount, cf (custom fields -size, color and type or gender (male, female, child))
  * Usage: $value["quantity"], $value["price"], $value["color"] (array) 
  */
}
```

### Get Item
Bring the specified product from the basket
```php
$bcc->fetch($item);
```

### Get Item Child
Fetch the sub-features of the specified product from the basket
```php
$bcc->fChild($item, $key)
```

### Get Total Sum
Returns the total basket amount
```php
/*
* Field (Ex): price
*/
$bcc->tPrice($field);
```

### Get Item Sum
Returns the amount of the child product in the cart:
```php
/*
* Ex.: $item => 7ca36866, price
*/
$bcc->tiPrice($item, $field)
```

### Total Item Count
Returns the amount of products in the basket
```php
$bcc->tItems();
```

### Check Item
Checks if the product in the basket is available:
```php
$bcc->check($item);
```
### Check Item Child
Checks if the product in the basket has a child key
```php
/*
* 7ca36866 in color, size or type
*/
$bcc->cChild($item, $key);
```

### Check Item Child Value
Checks whether there is a feature or variation in the child element of the product in the basket
```php
$bcc->cChildValue($item, $key, $value);
```

### Clear
Clear cart
```php
$bcc->clear();
```

### Remove
Removes the specified product from the cart
```php
$bcc->remove($item);
```
### Remove Child
Removes the child element of the specified product
```php
$bcc->rChild($item, $key);
```

### Remove Child Value
Removes the value of the child element of the specified product
```php
$bcc->rChildValue($item, $key, $value);
```

### Insert
Adds the product to the basket
```php
/*
* The default quantity is 1
* Specify variation with field before using insert function
*/
$bcc->insert($item, $quantity);
```

### Field
Variation for the product to be added can be identified
```php
/*
* $cf is array()
* Ex:
* $data = ["color" = ["red", "green", "blue"], "size" = ["s", "m", "l", "xl"]]
*/
$bcc->field($item, $cf);
```

### Update
Updates the key value specified in the product
```php
$bcc->update($item, $key, $value);
```

### Increment
Increases the amount of the specified key
```php
$bcc->inc($item);
```

### Decrement
Decreases the amount of the specified key
```php
$bcc->dec($item);
```

### Put
Records the finished operations
```php
/*
* You usually don't need to use this command
*/
$bcc->put();
```
