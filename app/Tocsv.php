<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tocsv extends Model
{
    protected $table	= 'to_csv';
    protected $fillable	= ['nomortes', 'nim', 'ips1', 'ips2', 'ips3', 'ips4', 'ips5', 'ips6', 'ips7', 'ips8', 'ipk'];
    public $timestamps = false;
}
