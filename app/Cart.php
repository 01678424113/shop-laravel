<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add(Product$product, $id){
		$sanPhamCungLoai = [
		    'qty'       =>0,
            'price'     => $product->unit_price,
            'item'      => $product,
        ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$sanPhamCungLoai = $this->items[$id];
			}
		}
		$sanPhamCungLoai['qty']++;
		$sanPhamCungLoai['price'] = $product->unit_price * $sanPhamCungLoai['qty'];
		$this->items[$id] = $sanPhamCungLoai;
		$this->totalQty++;
		$this->totalPrice += $product->unit_price;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
