<?php 

namespace Library\Model;

class Tour extends AbstractEntity implements TourInterface {

	 protected $allowedFields = [
		'id', 'name', 'description',
		'pictureUrl', 'price', 'stopovers'
	];
	
	public function getId() {
		return $this->fields['id'];	
	}

	public function setId($id) {
		if (isset($this->fields['id'])) {
			throw new \BadMethodCallException("The ID is already set!");
		}
		if (!\is_int($id) || $id < 1) {
			throw new \InvalidArgumentException("Invalid ID!");
		}
		else {
			$this->fields['id'] = $id;
		}	
	}		
	
	public function getName() { 
		return $this->fields['name'];
	}

	public function setName($name) {
 		if(\strlen($name) > 2) {
			$this->fields['name'] = $name;
		}
		else {
			throw new \InvalidArgumentException("Too short for a name!");
		}
  }
	public function getDescription() {
		return $this->fields['description'];
	}

	public function setDescription($desc) {
		if(\strlen($desc) > 15) {
			$this->fields['description'] = $desc;
		}
		else {
			throw new \InvalidArgumentException("Too short for a description!");
		}
	}

	public function getPicture() {
		return $this->fields['pictureUrl'] = $pictureUrl;
  }

	public function setPicture($pictureUrl) {
			if (filter_var($pictureUrl, FILTER_VALIDATE_URL)) {
			$this->fields['pictureUrl'] = $pictureUrl;
		}
		else {
			throw new \InvalidArgumentException("Invalid picture url!"); 
		}
	}

	public function getPrice() {
		return $this->fields['price'];	
	}

	public function setPrice($price) {
		if (!\is_float($price) || $price <= 0) {
			throw new \InvalidArgumentException("Price cannot be less than 0");		
		}
		$this->fields['price'] = $price;
	}

	public function getStopovers() {
		return $this->fields['stopovers'];
	}

	public function setStopovers(array $stopovers) {
		if(count($stopovers) >= 1) {
			$this->fields['stopovers'] = $stopovers;
		}
		else { 
			throw new \InvalidArgumentException("Minimum one stopover should be there!");
		}
  }

	public function addStopover(Stopover $theStopover) {
		$this->fields['stopovers'][] = $theStopover;
	}

	public function removeStopover(Stopover $theStopover) {
				
		for ($i = 0, $term = count($this->fields['stopovers']); $i < $term; ++$i) {
  		if ($this->fields['stopovers'] == $theStopover) {
				 $index = $i;
			}
		}
		if(isset($index)) {
			unset($this->fields['stopovers'][$index]);		
		}	
		else {
			throw new \BadMethodCallException("No such stopover to remove!");		
		}
	}
}