<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactForm extends Model
{
    //
    public $timestamps = true;

    //table name
    protected $table = 'contact';
    //fillable via form
    protected $fillable = ['name','email','subject','message'];
    //primary
    protected $primaryKey = 'id';

    protected $attributes = ['status' => 'Pending'];

    public function admin()
    {
        return $this->belongsTo('App\User','reply_by');
    }

}
