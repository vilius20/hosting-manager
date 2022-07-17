<?php
require __DIR__.'/../auth.php';

class Category {

    protected function list() {
        $resp = client()->get('/api/category')->getBody();
        $res = json_decode($resp, true);
        return $res['categories'];
    }

    public function info($id) {
        $resp = client()->get("/api/category/$id/product")->getBody();
        $res = json_decode($resp, true);
        return $res['products'];
    }

}