<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "blog_category";
    protected $primaryKey = "category_id";
    public $timestamps = false;
    protected $guarded = [];

    public function tree()
    {
        $categorys = $this->orderBy('category_order')->get();
        $data = $this->getTree($categorys);
        return $data;
    }

    private function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v)
        {
            if ($v->category_pid==0)
            {
                $data[$k]["_category_name"] = $data[$k]['category_name'];
                $arr[] = $data[$k];
                foreach ($data as $m => $n)
                {
                    if ($n->category_pid == $v->category_id)
                    {
                        $data[$m]["_category_name"] = '--'.$data[$m]['category_name'];
                        $arr[] = $data[$m];
                    }
                }
            }
        }

        return $arr;
    }
}
