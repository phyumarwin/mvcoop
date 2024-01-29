<?php 

class CategoryModel
{
    private $id;
    private $name;
    private $description;
    private $type_id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function toArray()
    {
        return [
            'id'    => $this->getId(),
            'name'   => $this->getName(),
            'description'  => $this->getDescription(),
            'type_id'   => $this->getTypeId()
        ];
    }
}