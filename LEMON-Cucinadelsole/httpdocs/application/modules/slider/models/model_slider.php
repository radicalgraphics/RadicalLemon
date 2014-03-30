<?php

class Model_slider extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function getPageDataId($data) {
        $query = $this->db->query(' SELECT id_page_data FROM ls_pages_data WHERE id_page = "' . $data['id_page'] . '" AND lang = "' . $data['lang'] . '"  ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function getContactData($content) {
        $query = $this->db->query(' SELECT * FROM ls_temp_slider_data WHERE is_active="1" AND  id_page_data = "' . $content['id_page_data'] . '" ORDER BY `order_active` ASC ');
        if ($query->num_rows > 0) {
            return $query->result();
        } return false;
    }

}

?>