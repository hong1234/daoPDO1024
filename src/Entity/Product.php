<?php
namespace Demo\Entity;

class Product
{
    private $id;
    private $name;
    private $features;

    public function __construct(string $name, int $id = 0, array $features = []){
        $this->name = $name;
        $this->id = $id;
        $this->features = $features;
    }

    public function addFeature(Feature $feature) {
        $this->features[] = $feature;
    }

    public function getFeatures() {
        return $this->features;
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
}