<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AdminController
 *
 * Admin module: dashboard, users, categories, job approvals, reports
 */
class AdminController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    private function require_admin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            redirect('/auth/login');
            exit;
        }
    }

    public function dashboard()
    {
        $this->require_admin();

        $this->call->model('UsersModel');
        $this->call->model('JobsModel');
        $this->call->model('ApplicationsModel');

        $data = [];
        $data['logged_in_user'] = $_SESSION['user'];
        $data['total_users'] = count($this->UsersModel->get_all_user());
        $data['total_jobs'] = count($this->JobsModel->get_all_jobs());
        $data['total_applications'] = count($this->ApplicationsModel->get_applications_by_user(0)); // placeholder quick call

        $this->call->view('admin/dashboard', $data);
    }

    public function users()
    {
        $this->require_admin();
        redirect('/users');
    }

    public function categories()
    {
        $this->require_admin();
        $this->call->view('admin/categories');
    }

    public function approvals()
    {
        $this->require_admin();
        $this->call->model('JobsModel');

        // If jobs have a 'status' field, filter pending; else list all as placeholder
        $jobs = $this->JobsModel->get_all_jobs();
        $data['jobs'] = $jobs;
        $data['logged_in_user'] = $_SESSION['user'];

        $this->call->view('admin/approvals', $data);
    }

    public function reports()
    {
        $this->require_admin();

        $this->call->model('UsersModel');
        $this->call->model('JobsModel');
        $this->call->model('ApplicationsModel');

        $data = [];
        $data['logged_in_user'] = $_SESSION['user'];
        $data['employees'] = $this->UsersModel->get_employees();
        $data['job_seekers'] = $this->UsersModel->get_job_seekers();
        $data['jobs'] = $this->JobsModel->get_all_jobs();

        $this->call->view('admin/reports', $data);
    }
}


