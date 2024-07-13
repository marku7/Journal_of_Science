<?php
class Volume_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function createVolume($data) {
        return $this->db->insert('Volume', $data);
    }

    public function getVolumeById($volumeid) {
        return $this->db->get_where('Volume', array('volumeid' => $volumeid))->row();
    }

    public function updateVolume($volumeid, $data) {
        $this->db->where('volumeid', $volumeid);
        return $this->db->update('Volume', $data);
    }

    public function deleteVolume($volumeid) {
        // Delete the volume from the database
        $this->db->where('volumeid', $volumeid);
        $this->db->delete('Volume');
    }
    
    public function getAllVolumes() {
        return $this->db->get('Volume')->result();
    }

    public function getVolumes() {
        return $this->db->get('Volume')->result_array();
    }

    public function updatePublishedStatus($volumeid, $published) {
        // Determine the value for date_published based on the published status
        $date_published = $published == 1 ? date('Y-m-d H:i:s') : null;
    
        // Update the published status and date_published in the database
        $data = array(
            'published' => $published,
            'date_published' => $date_published
        );
    
        $this->db->where('volumeid', $volumeid);
        $this->db->update('Volume', $data);
    }
    

    

}
