<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: JobsModel
 *
 * Handles job postings.
 */
class JobsModel extends Model {
    protected $table = 'jobs';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_job_by_id($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function get_all_jobs()
    {
        return $this->db->table($this->table)->get_all();
    }

    public function get_jobs_by_employee($employee_id)
    {
        return $this->db->table($this->table)
                        ->where('posted_by', $employee_id)
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

    public function page($q = '', $records_per_page = null, $page = null) {
        if (is_null($page)) {
            return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            // Build LIKE conditions
            $query->like('id', '%'.$q.'%')
                ->or_like('title', '%'.$q.'%')
                ->or_like('description', '%'.$q.'%')
                ->or_like('company', '%'.$q.'%');

            // Clone before pagination
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                            ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                    ->get_all();

            return $data;
        }
    }
}
