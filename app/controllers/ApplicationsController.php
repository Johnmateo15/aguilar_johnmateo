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

        // Use the new employer/applicants view with Tailwind layout
        $this->call->view('employer/applicants', $data);
    }

    public function apply($job_id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'job_seeker') {
            redirect('/auth/login');
            exit;
        }

        $this->call->model('ApplicationsModel');
        $this->call->model('JobsModel');
        $this->call->model('UsersModel');

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

        // Check if user has resume uploaded
        $user = $this->UsersModel->get_user_by_id($_SESSION['user']['id']);
        $has_resume = $this->has_resume($_SESSION['user']['id']);
        
        if (!$has_resume) {
            $_SESSION['error_message'] = 'Please upload your resume in your profile before applying for jobs.';
            redirect('/applicant/profile');
            exit;
        }

        $data = [
            'user_id' => $_SESSION['user']['id'],
            'job_id' => $job_id,
            'status' => 'pending',
            'resume_path' => $this->get_user_resume_path($_SESSION['user']['id']),
            'applied_at' => date('Y-m-d H:i:s')
        ];

        if ($this->ApplicationsModel->insert($data)) {
            $_SESSION['success_message'] = 'Application submitted successfully!';
            redirect('/jobs/seeker');
        } else {
            echo 'Failed to apply for job.';
        }
    }

    private function has_resume($user_id)
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

    private function get_user_resume_path($user_id)
    {
        // Get resume from latest application
        $applications = $this->ApplicationsModel->get_applications_by_user($user_id);
        foreach ($applications as $app) {
            if (!empty($app['resume_path']) && file_exists($app['resume_path'])) {
                return $app['resume_path'];
            }
        }
        
        // Or from user table
        $this->call->model('UsersModel');
        $user = $this->UsersModel->get_user_by_id($user_id);
        if (isset($user['resume_path']) && !empty($user['resume_path'])) {
            return $user['resume_path'];
        }
        
        return null;
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
