<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: JobsController
 *
 * Handles job postings and viewing for employees and job seekers.
 */
class JobsController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Employee dashboard: list their posted jobs
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('JobsModel');
        $employee_id = $_SESSION['user']['id'];
        $data['jobs'] = $this->JobsModel->get_jobs_by_employee($employee_id);
        $data['logged_in_user'] = $_SESSION['user'];

        // Use the new employer/jobs view with Tailwind layout
        $this->call->view('employer/jobs', $data);
    }

    public function seeker()
    {
        // Job seeker dashboard: list all available jobs
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'job_seeker') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('JobsModel');
        $this->call->model('ApplicationsModel');

        // Pagination
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $jobs = $this->JobsModel->page($q, $records_per_page, $page);
        $data['jobs'] = $jobs['records'];
        $total_rows = $jobs['total_rows'];

        // Pagination setup
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('custom');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'jobs/seeker?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $data['logged_in_user'] = $_SESSION['user'];
        
        // Check if user has resume
        $this->call->model('UsersModel');
        $user = $this->UsersModel->get_user_by_id($_SESSION['user']['id']);
        $data['has_resume'] = $this->check_user_resume($_SESSION['user']['id']);

        $this->call->view('jobs/seeker', $data);
    }

    private function check_user_resume($user_id)
    {
        // Check if user has resume in any previous application
        $applications = $this->ApplicationsModel->get_applications_by_user($user_id);
        foreach ($applications as $app) {
            if (!empty($app['resume_path']) && file_exists($app['resume_path'])) {
                return true;
            }
        }
        
        // Also check user table if resume_path field exists
        $this->call->model('UsersModel');
        $user = $this->UsersModel->get_user_by_id($user_id);
        if (isset($user['resume_path']) && !empty($user['resume_path']) && file_exists($user['resume_path'])) {
            return true;
        }
        
        return false;
    }

    public function create()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        if ($this->io->method() === 'post') {
            $this->call->model('JobsModel');

            $data = [
                'title' => $this->io->post('title'),
                'description' => $this->io->post('description'),
                'company' => $this->io->post('company'),
                'location' => $this->io->post('location'),
                'salary' => $this->io->post('salary'),
                'posted_by' => $_SESSION['user']['id'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->JobsModel->insert($data)) {
                redirect('/jobs');
            } else {
                echo 'Failed to post job.';
            }
        } else {
            $data['logged_in_user'] = $_SESSION['user'];
            $this->call->view('jobs/create', $data);
        }
    }

    public function update($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('JobsModel');
        $job = $this->JobsModel->get_job_by_id($id);

        if (!$job || $job['posted_by'] != $_SESSION['user']['id']) {
            echo "Job not found or access denied.";
            return;
        }

        if ($this->io->method() === 'post') {
            $data = [
                'title' => $this->io->post('title'),
                'description' => $this->io->post('description'),
                'company' => $this->io->post('company'),
                'location' => $this->io->post('location'),
                'salary' => $this->io->post('salary')
            ];

            if ($this->JobsModel->update($id, $data)) {
                redirect('/jobs');
            } else {
                echo 'Failed to update job.';
            }
        } else {
            $data['job'] = $job;
            $data['logged_in_user'] = $_SESSION['user'];
            $this->call->view('jobs/update', $data);
        }
    }

    public function delete($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('JobsModel');
        $job = $this->JobsModel->get_job_by_id($id);

        if (!$job || $job['posted_by'] != $_SESSION['user']['id']) {
            echo "Job not found or access denied.";
            return;
        }

        if ($this->JobsModel->delete($id)) {
            redirect('/jobs');
        } else {
            echo 'Failed to delete job.';
        }
    }
}
