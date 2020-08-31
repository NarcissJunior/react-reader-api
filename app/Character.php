<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'vocation',
        'sex',
        'level',
        'world',
        'residence',
        'world_id'
    ];

    //Adicionar a propriedade de links usando o append para facilitar o HATEOAS
    //HATEOAS - Hypermidia As The Engine Of the Application State
    protected $appends = ['links'];

    //Accessor dos links
    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/characters/' . $this->id
        ];
    }
}