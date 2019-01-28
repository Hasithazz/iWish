<?php
/**
 * Created by PhpStorm.
 * User: hsedi
 * Date: 1/23/2019
 * Time: 6:39 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class WishListModel extends CI_Model
{
    public function getAllWishList()
    {
        $query = $this->db->get('wishlist');
        return $query->result();
    }

    public function getWishList($listOwner)
    {
        $query = $this->db->get_where('wishList', array('list_owner' => $listOwner));
        return $query->row();
    }

    public function insertItem($data)
    {
        return $this->db->insert('item', $data);
    }

    public function getAllItems($parentListId)
    {
        $query = $this->db->get_where('item', array('parent_wish_list_id' => $parentListId));
        return $query->result();
    }

    public function updateItems($data)
    {
        return $this->db->replace('item', $data);
    }

    public function deleteItems($id)
    {
        return $this->db->delete('item', array('id' => $id));

    }

    public function insertWishList($data)
    {
        return $this->db->insert('wishList', $data);
    }

    public function findWishList($userName)
    {
        $query = $this->db->get_where('wishList', array('list_owner' => $userName));
        return $query->row();
    }

}


/* End of file .php */