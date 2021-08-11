<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    //
    use Notifiable, SoftDeletes, HasApiTokens;

	protected $granted_permissions;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'profile_image', 'password', 'is_admin', 'country_id',
        'mobile', 'phone_code_id', 'currency_id', 'main_language', 'role_id','time_zone', 'status','forget_code'
    ];

    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'full_name', 'full_mobile_number', 'status_name','name',
    ];

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 'inactive':
                return admin('inactive');
                break;
            case 'active':
                return admin('active');
                break;
            default:
                return admin('Unknown Status');
        }
    }

    public function getFullNameAttribute()
    {

        return $this->first_name . ' ' . $this->last_name;
    }
    public function getNameAttribute()
    {

        return $this->first_name . ' ' . $this->last_name;
    }


    public function getProfileImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : null;
    }

    public function getFullMobileNumberAttribute()
    {
        if ($this->mobile == null || $this->mobile == 0 || trim($this->mobile) == '') {
            $this->mobile = '-';
        } else if ($this->phoneCode == null) {
            return $this->mobile;
        } else {
            return $this->phoneCode->code . '' . $this->mobile;
        }
        return '-';
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function phoneCode()
    {
        return $this->belongsTo(CountryPhoneCode::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected function setPermissions(){
        $this->granted_permissions = [];
        $permissions = RolePermission::query()->where('role_id',$this->role->id)->where('value','active')->get();
		foreach($permissions as $k=>$p){
			    $this->granted_permissions[] = $p->role_detail->key_word;
        }
       // \Log::info(['permissions'=>$this->granted_permissions,'p'=>$permissions]);
	}

	public function getPermissions(){
		if(!is_array($this->granted_permissions)){
			$this->setPermissions();
		}

		return $this->granted_permissions;
	}

	public function hasPermission($permission){
		if(!is_array($this->granted_permissions)){
			$this->setPermissions();
		}

		return (in_array($permission, $this->granted_permissions));
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }

}
