<?php
namespace Demo\Entity;

class Feature
{
    private $id;
    private $name;
    private $product_id;

    public function __construct(string $name, int $productId = 0){
        $this->name = $name;
        $this->product_id = $productId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getProductId(): int {
        return $this->product_id;
    }

    public function setProductId(int $productId) {
        $this->product_id = $productId;
    }
}