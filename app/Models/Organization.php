<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Organization extends Model {
    protected $table = 'organizations';
    protected $fillable = ['name','position','period','location','description','achievement','logo','is_active','sort_order'];
    protected $casts = ['is_active'=>'boolean'];
}
