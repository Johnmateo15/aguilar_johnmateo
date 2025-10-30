<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: EmployerController
 *
 * Employer module: profile and quick links to job posting/applicants
 */
class EmployerController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    private function require_employee()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }
    }

    public function profile()
    {
        $this->require_employee();
        $this->call->model('UsersModel');

        $user = $this->UsersModel->get_user_by_id($_SESSION['user']['id']);

        if ($this->io->method() === 'post') {
            $data = [
                'username' => $this->io->post('username'),
                'email' => $this->io->post('email')
            ];

            $password = $this->io->post('password');
            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            if ($this->UsersModel->update($user['id'], $data)) {
                redirect('/jobs');
            }
        }

        $data = [];
        $data['user'] = $user;
        $data['logged_in_user'] = $_SESSION['user'];
        $this->call->view('employer/profile', $data);
    }
}


