<?php

class Income extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('IncomeModel');

        $this->db = new Database();
    }
    public function index()
    {
        $this->view('income/index');    // , $data
    }

    // For Income
    public function incomeData() {
        $income = $this->db->readAll('vw_categories_income');
        $json = array('data' => $income);
        echo json_encode($json);
    }
    public function create()
    {
        $category = $this->db->readAll('categories');
        // print_r($category);

        $type = $this->db->readAll('types');
        $data = [
            'categories' => $category,
            'types' => $type
        ];

        $this->view('income/create', $data);
        // redirect('income');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $amount = $_POST['amount'];
            $category_id = $_POST['category_id'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');

            $income = new IncomeModel();

            $income->setAmount($amount);
            $income->setCategoryId($category_id);
            $income->setUserId($user_id);
            $income->setDate($date);

            $incomeCreated = $this->db->create('incomes', $income->toArray());
            setMessage('success', 'Create successful!');
            redirect('income');
        }
    }

    public function edit($id)
    {
        $category = $this->db->readAll('categories');

        $income = $this->db->getById('incomes', $id);

        $data = [
            'categories' => $category,
            'incomes'    => $income
        ];
        $this->view('income/edit', $data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $category_id = $_POST['category_id'];
            $amount = $_POST['amount'];
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $date = date('Y/m/d');
            // echo $category_id;

            $income = new IncomeModel();
            $income->setId($id);
            $income->setAmount($amount);
            $income->setCategoryId($category_id);
            $income->setUserId($user_id);
            $income->setDate($date);

            $isUpdated = $this->db->update('incomes', $income->getId(), $income->toArray());
            setMessage('success', 'Update successful!');
            redirect('income');
        }
    }
    public function destroy($id)
    {
        $isdestroy = $this->db->delete('incomes', $id);
        if ($isdestroy) {
            setMessage('success', "Successfully Deleted!");
        } else {
            setMessage('error', "Delete Fail!");
        }
        setMessage('success', "Income Data has been Deleted");
        redirect('income');
    }

}