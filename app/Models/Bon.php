<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    use HasFactory;

    public $table = 'bons';

    protected $dates = [
        'date_emission',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date_emission',
        'organisation',
        'reference_commande',
        'date_livraison',
        'nom_destinataire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function bons()
    {
        return $this->belongsToMany(Asset::class);
    }

    public function getDateEmissionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateEmissionAttribute($value)
    {
        $this->attributes['date_emission'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
