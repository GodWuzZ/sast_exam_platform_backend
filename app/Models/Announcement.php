<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public static function modify($config)
    {
        if(isset($config['id'])){
            $announcement = self::find($config['id']);
        }
        if(empty($announcement)){
            $announcement = new Announcement;
        }
        $announcement->title = $config['title'];
        $announcement->content = $config['content'];
        $announcement->save();
    }

    public static function fetch()
    {
        $ret = static::get();
        if(empty($ret)){
            return [];
        }else{
            $result = [];
            foreach ($ret as $announcement) {
                $result[] = [
                    'id'       => $announcement->id,
                    'title'    => $announcement->title,
                    'content'  => $announcement->content,
                    'time'     => strtotime($announcement->created_at)
                ];
            }
            return $result;
        }
    }
}

