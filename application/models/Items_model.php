<?php
class Items_model extends CI_Model
{
	public function __construct()
	{
        // $this->load->library('session');
        $this->load->database('db_connection');
    }   
    public function get_userid_from_token($get_token)
    {

        $sql = "SELECT * FROM users WHERE token = ?";
        $query = $this->db->query($sql,array($get_token));
        $result_set = $query->result();
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            foreach ($result_set as $row) {
                $userid = $row->user_id;
            }
            $user_details = array();
            $user_details['status'] = "True";
            $user_details['message'] = "Your query is successful";
            $user_details['user_id'] = $userid;
            $json_object = json_encode($user_details);
            return($json_object);
        }
        else
        {
            $user_details = array();
            $user_details['status'] = "False";
            $user_details['message'] = "There is no user id with this token";
            $json_object = json_encode($user_details);
            return $json_object;
        }
    }
    public function user_saved_items($json_object)
    {
        $parse_json = json_decode($json_object);
        $userid = $parse_json->user_id;
    	$user_saved_items = array();
        $sql = "SELECT userbasket.item_id,items.item_name from userbasket,items  where userbasket.item_id=items.item_id and userbasket.user_id = ?";
        $query = $this->db->query($sql,array($userid));
        $result_set = $query->result();
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            foreach ($result_set as $row) {
                $user_saved_items[] = $row;
            }
            $user_details = array();
            $user_details['status'] = "True";
            $user_details['message'] = "Your query is successful";
            $user_details['usersaveditems'] = $user_saved_items;
            $user_true_json_items = json_encode($user_details);
            return $user_true_json_items;
        }
        else
        {
            $user_details = array();
            $user_details['status'] = "False";
            $user_details['message'] = "There are no records in user basket";
            $user_false_json = json_encode($user_details);
            return $user_false_json;
        }
        
    }
    public function get_search_results($search_keyword)
    {
        $query = $this->db->query("SELECT * FROM items WHERE item_name LIKE 'search_keyword%'");
        $result_set = $query->result();
        $items = array();
        foreach ($result_set as $row) {
            $items[] = $row;
        }
        //print_r($items);
        $itemslist = json_encode($items);
        return $itemslist;
    }
    public function save_items($json_object,$itemstosave)
    {
        $parse_json = json_decode($json_object);
        $userid = $parse_json->user_id;
        $json_obj = json_decode($itemstosave);
        foreach ($json_obj as $value) {
            $itemid = $value->item_id;
            $query = "INSERT INTO userbasket (user_id,item_id) VALUES (?,?)";
            $result_set = $this->db->query($query,array($userid,$itemid));
            $user_details = array();
            $user_details['status'] = "True";
            $user_details['message'] = "Your query is successful";
            $user_true_save_items_json = json_encode($user_details);
            return $user_true_save_items_json;
        }        
    }
    public function delete_item($json_object,$itemid)
    {
        $parse_json = json_decode($json_object);
        $userid = $parse_json->user_id;
        $query = "DELETE FROM userbasket WHERE user_id = ? and item_id = ?";
        $result_set = $this->db->query($query,array($userid,$itemid));
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
                $user_details = array();
                $user_details['status'] = "True";
                $user_details['message'] = "Your query is successful";
                $delete_items_true_json = json_encode($user_details);
                return $delete_items_true_json;
            }
            else
            {
                $user_details = array();
                $user_details['status'] = "False";
                $user_details['message'] = "There are no records";
                $delete_items_false_json = json_encode($user_details);
                return $delete_items_false_json;
            }
        
    }
    public function get_categories()
    {
        $query = $this->db->query("SELECT * FROM categories");
        $result_set = $query->result();
        $categories = array();
        foreach ($result_set as $row) {
            $categories[] = $row;
        }
        print_r($categories);
        return $categories;
    }
    public function get_category_items($category_id)
    {
        $sql = "SELECT * from items WHERE catagory_id = ?";
        $query = $this->db->query($sql,array($category_id));
        $result_set = $query->result();
        $category_items = array();
        foreach ($result_set as $row) {
            $category_items[] = $row;
        }
        print_r($category_items);
        return $category_items;
    }

}
?>
