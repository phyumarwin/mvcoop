<?php

class Category extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('CategoryModel');
    
        $this->db = new Database();
    }

    public function index() {
        $category = $this->db->readAll('vw_categories_type');
        //print_r($category);
        $data = [
            'categories' => $category
        ];
        $this->view('category/table', $data);
    }

    public function create() {
        $types = $this->db->readAll('types');
        //print_r($types);
        $data = [
            'types' => $types,
            'index' => 'category'
        ];
        //print_r($data);
        $this->view('category/create', $data);
    }
    public function categoryData()
    {
        $category = $this->db->readAll('categories');
        $json = array('data' => $category);
        echo json_encode($json);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type_id = $_POST['type_id'];

            $category = new CategoryModel();

            $category->setName($name);
            $category->setDescription($description);
            $category->setTypeId($type_id);

            $categoryCreated = $this->db->create('categories', $category->toArray());
            setMessage('success', 'Create successful!');
            redirect('category');
        }
    }

    public function edit($id)
    {
        $types = $this->db->readAll('types');
        // print_r($types);

        $category = $this->db->getById('categories', $id);
        // print_r($category);

        $data = [
            'types' => $types,
            'categories' => $category
        ];

        $this->view('category/edit', $data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type_id = $_POST['type_id'];
            //echo $name;

            $category = new CategoryModel();
            $category->setId($id);
            $category->setName($name);
            $category->setDescription($description);
            $category->setTypeId($type_id);

            $isUpdated = $this->db->update('categories', $category->getId(), $category->toArray());
            // echo $isUpdated;
            setMessage('success', 'Update successful!');
            redirect('category');
        }
    }

    public function destroy($id)
    {
        $id = base64_decode($id);

        $category = new CategoryModel();
        $category->setId($id);

        $isdestroy = $this->db->delete('categories', $category->getId($id));
        redirect('category/table');
    }
}