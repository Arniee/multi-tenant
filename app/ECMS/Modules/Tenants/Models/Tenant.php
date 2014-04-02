<?php


namespace ECMS\Modules\Tenants\Models;

class Tenant extends \Eloquent {

    /**
     * Guarded properties
     * @var array
     */
    protected $guarded = array('id');

    /**
     * Article relationship
     *
     * @return Relationship
     */
    public function articles()
    {
        return $this->hasMany('ECMS\Modules\Articles\Model\Article');
    }

    /**
     * Settings relationship
     *
     * @return Relationship
     */
    public function settings()
    {
        return $this->hasMany('ECMS\Modules\Settings\Models\Setting' );
    }

    public function users()
    {
        return $this->belongsToMany('ECMS\Models\User', 'tenants_users');
    }
}