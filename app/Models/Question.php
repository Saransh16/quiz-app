<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'option_A',
        'option_B',
        'option_C',
        'option_D',
        'correct_option'
    ];

    protected $appends = [
        'choices'
    ];

    public function getChoicesAttribute()
    {
        $choices = [
            'option_A' => $this->option_A,
            'option_B' => $this->option_B,
            'option_C' => $this->option_C,
            'option_D' => $this->option_D
        ];

        return $choices;
    }
}
