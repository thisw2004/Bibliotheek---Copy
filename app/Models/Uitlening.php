<?php

namespace App\Models;
//miss hier nog table naam neerzetten,want is uitleningen en geen uitlenings of iets
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Uitlening extends Model
{
    use HasFactory;
    protected $table = 'uitleningen';
    protected $fillable = ['ID','UserID', 'BookID', 'DatumUitgeleend','DatumIngeleverd'];
    
}
