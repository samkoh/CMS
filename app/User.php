<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_role',
        'firstname',
        'lastname',
        'email',
        'password',
        'nameTitlePrefix',
        'gender',
        'dateOfBirth',
        'nationalIdentityNo',
        'addressLine1',
        'addressLine2',
        'addressLine3',
        'city',
        'state',
        'postalCode',
        'country',
        'contactNo',
        'faxNo',
        'education'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * A user can have more than one conference
     *
     * @Return \Illuminate\Database\Eloquent\Relations|HasMany
     */
    public function conferences()
    {
        return $this->hasMany('App\Conference');
    }

    public function  papers()
    {
        return $this->hasMany('App\Paper');
    }

    /*
     * A conference chair might send more than one invitations
     */
    public function invitations()
    {
        return $this->hasMany('App\RecipientMessageLog');
    }

//    public function userConferences()
//    {
//        return $this->hasMany('App\UserConference');
//    }

}
