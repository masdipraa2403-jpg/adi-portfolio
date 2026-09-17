<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $table = 'projects';
    protected $fillable = ['name','slug','category','thumbnail','short_description','description','year','github_url','demo_url','status','is_featured','sort_order'];
    protected $casts = ['is_featured'=>'boolean'];
    public function technologies(){ return $this->belongsToMany(Technology::class,'project_technology'); }
    public function images(){ return $this->hasMany(ProjectImage::class); }
}
