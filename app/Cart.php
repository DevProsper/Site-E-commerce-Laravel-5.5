<?php 

namespace App;

class Cart{
	/*
	prix, quantité et l'objet
	A partir de cet item on poura récupérer les objets on base de données
	*/
	public $items = [];

	/*
	Quantité total
	*/
	public $totalQ = 0;

	/*
	Prix total
	*/
	public $totalP = 0;

	/*
	Si le panier contien déjà quelque chose, on initialise avec les
	actuels
	*/
	public function __construct($currentCard){
		if ($currentCard) {
			$this->items = $currentCard->items;
			$this->totalP = $currentCard->totalP;
			$this->totalQ = $currentCard->totalQ;
		}
	}

	/*
	*id du produit et le produit lui même
	*/
	public function add($id,$item){
		//$storedItem correspond a un item stocké dans notre tableau $items []
		$storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['quantity']++;
		$storedItem['price'] = $storedItem['quantity'] * $item->price;
		$this->items[$id] = $storedItem;
		$this->totalQ++;
		$this->totalP += $item->price;
	}

	public function reduceByOne($id){
		$this->totalQ--;
		$this->totalP -= $this->items[$id]['item']->price;
		$this->items[$id]['quantity']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']->price;

		if ($this->items[$id]['quantity'] <= 0) {
			unset($this->items[$id]);
		}
	}

	public function delete($id){
		$this->totalQ -= $this->items[$id]['quantity'];
		$this->totalP -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}