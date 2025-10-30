<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ApplicantController
 *
 * Applicant module: account and profile/CV placeholder
 */
class ApplicantController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    private function require_job_seeker()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'job_seeker') {
            redirect('/auth/login');
            exit;
        }
    }

    public function account()
    {
        $this->require_job_seeker();
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
                redirect('/jobs/seeker');
            }
        }

        $data = [];
        $data['user'] = $user;
        $data['logged_in_user'] = $_SESSION['user'];
        $this->call->view('applicant/account', $data);
    }

    public function profile()
    {
        $this->require_job_seeker();
        $data = [];
        $data['logged_in_user'] = $_SESSION['user'];
        $this->call->view('applicant/profile', $data);
    }
}


