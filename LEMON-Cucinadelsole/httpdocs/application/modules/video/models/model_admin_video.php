<?php

class Model_admin_video extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function getPageIdByUri($uri2) {

        $query = $this->db->query(" SELECT id_page FROM ls_pages WHERE url ='" . $uri2 . "' ");

        if ($query->num_rows > 0) {
            return $query->row();
        }
        return false;
    }
    
    
     function getAllIdpagedataByPageId($data) {
        $query = $this->db->query(' SELECT id_page_data FROM ls_pages_data WHERE id_page = "' . $data['id'] . '" ');
        if ($query->num_rows > 0) {
            return $query->result();
        } return false;
    }
    
    

    function getIdPageDataByPageId($data) {

        $query = $this->db->query(" SELECT id_page_data, id_page FROM ls_pages_data WHERE id_page ='" . $data['id'] . "'  AND lang  = '" . $data['lang'] . "' ");

        if ($query->num_rows > 0) {
            return $query->row();
        }
        return false;
    }

    function getPageInformationName($data) {
        $query1 = $this->db->query(' SELECT * FROM ls_temp_video_data WHERE id_page_data=" ' . $data['id'] . ' "  ');
        return $query1->num_rows;
    }

    function getPageInformationTemplate($data) {
        $query = $this->db->query(' SELECT template, is_active FROM ls_pages WHERE id_page=" ' . $data['pid'] . ' "  ');
        return $query->row();
    }

    function getActiveVideo($data) {

        $query = $this->db->query(' SELECT * FROM ls_temp_video_data WHERE is_active="1" AND id_page_data=" ' . $data['id'] . ' " ORDER BY order_active ASC');

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }

    function getNonActiveVideo($data) {

        $query = $this->db->query(' SELECT * FROM ls_temp_video_data WHERE is_active="0" AND id_page_data=" ' . $data['id'] . ' " ORDER BY order_nonactive ASC');

        if ($query->num_rows > 0) {
            return $query->result();
        }
        return false;
    }


    function saveYouTubeVideoForAll($data) {

        $ytURL = $data['video_url'];
        $ytvIDlen = 11;
        $idStarts = strpos($ytURL, "?v=");

        if ($idStarts === FALSE)
            $idStarts = strpos($ytURL, "&v=");

        if ($idStarts === FALSE)
            die("YouTube video ID not found.");

        $idStarts +=3;
        $yt_video_id = substr($ytURL, $idStarts, $ytvIDlen);

        foreach ($data['page_data'] as $id_page_data) {
            $query = $this->db->query('INSERT INTO ls_temp_video_data (id_page_data, id_page, video_url, video_id, is_active, order_active, order_nonactive, creation_time) VALUES ("'.$id_page_data->id_page_data.'", "'.$data['id'].'", "'.$data['video_url'].'" , "'.$yt_video_id.'", "0" ,"0", "0", NOW())');
        }
        
        
        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }
    

      function saveYouTubeVideo($data) {

        $ytURL = $data['video_url'];
        $ytvIDlen = 11;
        $idStarts = strpos($ytURL, "?v=");

        if ($idStarts === FALSE)
            $idStarts = strpos($ytURL, "&v=");

        if ($idStarts === FALSE)
            die("YouTube video ID not found.");

        $idStarts +=3;
        $yt_video_id = substr($ytURL, $idStarts, $ytvIDlen);

        $query = $this->db->query(' INSERT INTO ls_temp_video_data  (id_page_data, id_page, video_url, video_id, is_active, order_active, order_nonactive, creation_time) VALUES ("'.$data['page_data']->id_page_data.'", "'.$data['id'].'", "'.$data['video_url'].'", "'.$yt_video_id.'", "0" ,"0", "0", NOW()) ');

        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    function saveVideoOrderActive($data) {

        foreach ($data['orderId'] as $key => $val) {

            $query = $this->db->query(' UPDATE  ls_temp_video_data  SET  `order_active` =  "' . $key . '"  WHERE  `id` = "' . $val . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
        }
    }

    function saveVideoOrderNonActive($data) {

        foreach ($data['orderId'] as $key => $val) {

            $query = $this->db->query(' UPDATE  ls_temp_video_data  SET  `order_nonactive` =  "' . $key . '"  WHERE  `id` = "' . $val . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
        }
    }

    function saveActiveVideo($data) {

        $query = $this->db->query(' UPDATE  ls_temp_video_data SET is_active =1 WHERE   `id` = "' . $data['video_id'] . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
    }

    function saveNonActiveVideo($data) {

        $query = $this->db->query(' UPDATE  ls_temp_video_data SET is_active =0 WHERE   `id` = "' . $data['video_id'] . '" AND  `id_page_data` = "' . $data['id_page_data'] . '" ');
    }

    function deleteVideo($data) {

        $query = $this->db->query(' DELETE FROM ls_temp_video_data WHERE   `id` = "' . $data['video_id'] . '" ');

        if ($query) {
            echo $data = "true";
        } else {
            echo $data = "false";
        }
    }

    function previewVideo($data) {

        $query = $this->db->query(' SELECT * FROM ls_temp_video_data WHERE id = "' . $data['video_id'] . '"    ');

        if ($query->num_rows > 0) {
            return $query->row();
        }
        return false;
    }

}

?>