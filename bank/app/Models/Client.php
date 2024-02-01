<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'personalNumber',
    ];

    protected static $sorts = [
        'noSort' => 'Default',
        'name_asc' => 'Surname (A-Z)',
        'name_desc' => 'Surname(Z-A)',
    ];

    protected static $perPageSelect = [
        0 => 'All',
        3 => 3,
        7 => 7,
        11 => 11,
        13 => 13,
        29 => 29,
    ];

    public static function getSorts()
    {
        return self::$sorts;
    }
    public static function getPerPageSelect(){
        return self::$perPageSelect;
    }
 

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }


}
