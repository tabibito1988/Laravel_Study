<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
     /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'attachments';

    public function contacts()
    {
        return $this->belongsTo("App\Contact");
    }
}
