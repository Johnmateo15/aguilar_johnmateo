<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ApplicationsModel
 *
 * Handles job applications.
 */
class ApplicationsModel extends Model {
    protected $table = 'applications';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_application_by_id($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function get_applications_by_user($user_id)
    {
        return $this->db->table($this->table)
                        ->where('user_id', $user_id)
                        ->get_all();
    }

    public function get_applications_by_job($job_id)
    {
        return $this->db->table($this->table)
                        ->where('job_id', $job_id)
                        ->get_all();
    }

    public function get_applications_by_employee($employee_id)
    {
        // Get jobs posted by employee, then applications for those jobs
        return $this->db->table('applications a')
                        ->join('jobs j', 'a.job_id = j.id')
                        ->join('user u', 'a.user_id = u.id')
                        ->where('j.posted_by', $employee_id)
                        ->select('a.*, j.title as job_title, j.company, u.username, u.email')
                        ->get_all();
    }

    public function insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->update($data);
    }

    public function delete($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->delete();
    }

    public function has_applied($user_id, $job_id)
    {
        return $this->db->table($this->table)
                        ->where('user_id', $user_id)
                        ->where('job_id', $job_id)
                        ->get();
    }
}
