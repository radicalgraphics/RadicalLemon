<?php

class Model_admin_page extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getPageIdByUri($uri2) {
        $query = $this->db->query(' SELECT id_page FROM ls_pages WHERE url ="' . $uri2 . '"');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function getIdPageDataByPageId($data) {
        $query = $this->db->query(' SELECT id_page_data, id_page FROM ls_pages_data WHERE id_page = "' . $data['id'] . '" AND lang = "' . $data['lang'] . '"');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function getAllIdpagedataByPageId($data) {
        $query = $this->db->query(' SELECT id_page_data FROM ls_pages_data WHERE id_page = "' . $data['id'] . '" ');
        if ($query->num_rows > 0) {
            return $query->result();
        } return false;
    }

    function getPageInformationName($data) {
        $query1 = $this->db->query(' SELECT * FROM ls_temp_page_data WHERE id_page_data=" ' . $data['id'] . ' "  ');
        return $query1->num_rows;
    }

    function getPageInformationTemplate($data) {
        $query = $this->db->query(' SELECT template, is_active FROM ls_pages WHERE id_page=" ' . $data['pid'] . ' "  ');
        return $query->row();
    }

    function getActiveBgslide($data) {
        $query = $this->db->query(' SELECT * FROM ls_temp_page_data WHERE is_active="1" AND id_page_data=" ' . $data['id'] . ' " ORDER BY order_active ASC');
        if ($query->num_rows > 0) {
            return $query->result();
        } return false;
    }

    function getNonActiveBgslide($data) {
        $query = $this->db->query(' SELECT * FROM ls_temp_page_data WHERE is_active="0" AND id_page_data=" ' . $data['id'] . ' " ORDER BY order_nonactive ASC');
        if ($query->num_rows > 0) {
            return $query->result();
        } return false;
    }

    function saveSlideOrderActive($data) {
        foreach ($data['orderId'] as $key => $val) {
            $query = $this->db->query(' UPDATE  ls_temp_page_data  SET  `order_active` =  "' . $key . '"  WHERE  `id` = "' . $val . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
        }
    }

    function saveSlideOrderNonActive($data) {
        foreach ($data['orderId'] as $key => $val) {
            $query = $this->db->query(' UPDATE  ls_temp_page_data  SET  `order_nonactive` =  "' . $key . '"  WHERE  `id` = "' . $val . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
        }
    }

    function saveActiveSlide($data) {
        $query = $this->db->query(' UPDATE  ls_temp_page_data SET is_active =1 WHERE   `id` = "' . $data['video_id'] . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
    }

    function saveNonActiveSlide($data) {
        $query = $this->db->query(' UPDATE  ls_temp_page_data SET is_active =0 WHERE   `id` = "' . $data['video_id'] . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
    }

    function getSlideTitle($data) {
        $query = $this->db->query(' SELECT id, title FROM ls_temp_page_data WHERE id = "' . $data['slide_id'] . '"    ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function saveTitle($data) {
        $query = $this->db->query('UPDATE ls_temp_page_data SET title="' . $data['title'] . '" WHERE id = "' . $data['slide_id'] . '"');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function previewSlide($data) {
        $query = $this->db->query(' SELECT * FROM ls_temp_page_data WHERE id = "' . $data['video_id'] . '"    ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function deleteSlide($data) {
        $query = $this->db->query(' DELETE FROM ls_temp_page_data WHERE   `id` = "' . $data['video_id'] . '" ');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function writeSlide($data) {
        $query = $this->db->query(' SELECT * FROM ls_temp_page_data WHERE id = "' . $data['slide_id'] . '" ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
    }

    function saveText($data) {
        $query = $this->db->query(' UPDATE ls_temp_page_data SET content = "' . addslashes($data['content']) . '" WHERE id ="' . $data['slide_id'] . '" ');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function addSlideForAll($data) {
        foreach ($data['page_data'] as $id_page_data) {
            $query = $this->db->query('INSERT INTO ls_temp_page_data (id_page_data, id_page, title, content, img, pdf, date, is_active, order_active, order_nonactive, creation_time) VALUES ("' . $id_page_data->id_page_data . '", "' . $data['id'] . '", "" , "" ,  "' . $data['img'] . '" ,"", "", "0", "0", "0" , NOW()) ');
        } if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function addSlide($data) {
        $query = $this->db->query('INSERT INTO ls_temp_page_data (id_page_data, id_page, title, content, img, pdf, date, is_active, order_active, order_nonactive, creation_time) VALUES ("' . $data['page_data']->id_page_data . '", "' . $data['id'] . '", "" , "" ,  "' . $data['img'] . '" ,"", "", "0", "0", "0" , NOW()) ');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function isPdfSet($data) {
        $query = $this->db->query('SELECT id, pdf FROM ls_temp_page_data WHERE id="' . $data['slide_id'] . '"');
        return $query->row();
    }

    function upload($data) {
        $query = $this->db->query(' UPDATE ls_temp_page_data SET pdf = "' . $data['filename'] . '" WHERE id ="' . $data['slide_id'] . '" ');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }
    
    
    
    
    
    function getEditBgText ($id_page_data) {
        
     $query = $this->db->query(' SELECT * FROM ls_temp_page_static_data WHERE id_page_data="'.$id_page_data.'" ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;

    }
    
    
    
    function ifIdPageDataExist ($data) {
        
        
         $query = $this->db->query(' SELECT id_page_data FROM ls_temp_page_static_data WHERE id_page_data="'.$data['id_page_data'].'" ');
        if ($query->num_rows > 0) {
            return $query->row();
        } return false;
        
    }
              
    function saveEditBgText ($data) {
           
        $query = $this->db->query('INSERT INTO ls_temp_page_static_data (id_page_data, content, creation_time) VALUES ("'.$data['id_page_data'].'", "'.addslashes($data['content']).'", NOW())');
           
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
        
    }
    
    function updateEditBgText ($data) {

        $query = $this->db->query(' UPDATE ls_temp_page_static_data SET content = "'.addslashes($data['content']).'" WHERE id_page_data ="'.$data['id_page_data'].'" ');
           
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
       
    }

     function deletePdf($data) {
        $query = $this->db->query(' UPDATE ls_temp_page_data SET pdf=NULL WHERE id="'.$data['slide_id'].'" ');
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

} ?>