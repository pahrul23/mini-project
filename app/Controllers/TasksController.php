<?php namespace App\Controllers;

use App\Models\TasksModel;

class TasksController extends BaseController
{
    public function index()
    {
        $model = new TasksModel();
        $data['tasks'] = $model->findAll();
        return view('tasks/index', $data);
    }

    public function addTask()
    {
        $model = new TasksModel();

        if ($this->request->isAJAX()) {
            $judul = $this->request->getPost('judul');
            $data = ['judul' => $judul, 'status' => 0];

            if ($model->insert($data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Task added successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add task']);
            }
        }
    }

    public function updateStatus($id)
    {
        $model = new TasksModel();

        if ($this->request->isAJAX()) {
            $status = $this->request->getPost('status');
            $data = ['status' => $status];

            if ($model->update($id, $data)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Status updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update status']);
            }
        }
    }

}
