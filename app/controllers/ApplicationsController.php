<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ApplicationsController
 *
 * Handles job applications.
 */
class ApplicationsController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Employee dashboard: view applications for their jobs
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('ApplicationsModel');
        $employee_id = $_SESSION['user']['id'];
        $data['applications'] = $this->ApplicationsModel->get_applications_by_employee($employee_id);
        $data['logged_in_user'] = $_SESSION['user'];

        $this->call->view('applications/index', $data);
    }

    public function apply($job_id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'job_seeker') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('ApplicationsModel');
        $this->call->model('JobsModel');

        $job = $this->JobsModel->get_job_by_id($job_id);
        if (!$job) {
            echo "Job not found.";
            return;
        }

        // Check if already applied
        if ($this->ApplicationsModel->has_applied($_SESSION['user']['id'], $job_id)) {
            echo "You have already applied for this job.";
            return;
        }

        $data = [
            'user_id' => $_SESSION['user']['id'],
            'job_id' => $job_id,
            'status' => 'pending',
            'applied_at' => date('Y-m-d H:i:s')
        ];

        if ($this->ApplicationsModel->insert($data)) {
            redirect('/jobs/seeker');
        } else {
            echo 'Failed to apply for job.';
        }
    }

    public function update_status($id, $status)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('ApplicationsModel');
        $application = $this->ApplicationsModel->get_application_by_id($id);

        if (!$application) {
            echo "Application not found.";
            return;
        }

        // Check if employee owns the job
        $this->call->model('JobsModel');
        $job = $this->JobsModel->get_job_by_id($application['job_id']);
        if ($job['posted_by'] != $_SESSION['user']['id']) {
            echo "Access denied.";
            return;
        }

        if ($this->ApplicationsModel->update($id, ['status' => $status])) {
            redirect('/applications');
        } else {
            echo 'Failed to update application status.';
        }
    }
}
