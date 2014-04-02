<?php
namespace ECMS\Modules\Articles\Models;
use Carbon\Carbon;

class Article extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    protected $softDelete = true;

    // Use fillable as a white list
    protected $fillable = array('title', 'slug','content','active', 'frontpage','image', 'meta_description', 'type', 'keywords','publish_date', 'user_id', 'tenant_id');

    /**
     * Category relationship
     *
     * @return Relationship
     */
    public function categories()
    {
        return $this->belongsToMany('ECMS\Modules\Categories\Models\Category', 'articles_categories');
    }

    /**
     * User relationship
     *
     * @return Relationship
     */
    public function user()
    {
        return $this->belongsTo('ECMS\Modules\Users\Models\User');
    }


    public function terms()
    {
        return $this->morphMany('ECMS\Modules\Terms\Models\Term', 'termable');
    }



}