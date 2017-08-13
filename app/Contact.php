<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'contacts';
    protected $fillable = ['firstname', 'lastname', 'kana','sex','birthday','tel','contents'];

    public function attachments()
    {
        return $this->hasMany("App\Attachment");
    }
}
