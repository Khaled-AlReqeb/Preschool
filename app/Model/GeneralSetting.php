<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSetting extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'logo_image', 'header_image', 'about_image', 'ar_name', 'en_name', 'ar_header_title', 'en_header_title', 'ar_header_subTitle',
        'en_header_subTitle', 'ar_about_title', 'en_about_title', 'ar_about_content', 'en_about_content', 'ar_activities_title',
        'en_activities_title', 'ar_partner_title', 'en_partner_title', 'ar_contact_content', 'en_contact_content', 'ar_footer_content',
        'en_footer_content', 'app_url', 'ar_terms','en_terms', 'ar_policy', 'en_policy', 'youtube_url', 'ar_address',
        'en_address', 'mobile', 'email', 'fax', 'telephone', 'whatsapp', 'facebook', 'twitter', 'instagram','google',
        'pannel_main_color','pannel_secondary_color','pannel_type','pannel_mood','	fast_access_color'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'name', 'address',
        'header_title', 'header_subTitle', 'about_title', 'about_content',
        'activities_title', 'partner_title', 'contact_content', 'footer_content',
        'terms', 'policy',
    ];

//    public function getStatusNameAttribute()
//    {
//        switch ($this->status) {
//            case 'inactive':
//                return admin('inactive');
//                break;
//            case 'active':
//                return admin('active');
//                break;
//            default:
//                return admin('Unknown Status');
//        }
//    }

    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
    }
    public function getAddressAttribute()
    {
        return $this->{app()->getLocale() . '_address'};
    }
    public function getHeaderTitleAttribute()
    {
        return $this->{app()->getLocale() . '_header_title'};
    }
    public function getHeaderSubTitleAttribute()
    {
        return $this->{app()->getLocale() . '_header_subTitle'};
    }
    public function getAboutTitleAttribute()
    {
        return $this->{app()->getLocale() . 'about_title'};
    }
    public function getAboutContentAttribute()
    {
        return $this->{app()->getLocale() . '_about_content'};
    }
    public function getActivitiesTitleAttribute()
    {
        return $this->{app()->getLocale() . '_activities_title'};
    }
    public function getPartnerTitleAttribute()
    {
        return $this->{app()->getLocale() . '_partner_title'};
    }
    public function getContactContentAttribute()
    {
        return $this->{app()->getLocale() . '_contact_content'};
    }
    public function getFooterContentAttribute()
    {
        return $this->{app()->getLocale() . '_footer_content'};
    }

    public function getTermsAttribute()
    {
        return $this->{app()->getLocale() . '_terms'};
    }
    public function getPolicyAttribute()
    {
        return $this->{app()->getLocale() . '_policy'};
    }


    public function getLogoImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : null;
    }
    public function getHeaderImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : null;
    }
    public function getAboutImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : null;
    }

}
