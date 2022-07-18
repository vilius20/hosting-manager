<?php
require __DIR__.'/../auth.php';

class Category
{

    /**
     * Get all products.
     *
     * @return array
     */
    protected function list()
    {
        $resp = client()->get('/api/category')->getBody();
        $res = json_decode($resp, true);
        return $res['categories'];
    }

    /**
     * Get specific informaton about product.
     * 
     * @param int $id Product id
     * 
     * @return array
     */
    public function info($id)
    {
        $resp = client()->get("/api/category/$id/product")->getBody();
        $res = json_decode($resp, true);
        return $res['products'];
    }

}