<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'complete'];

    /**
     * @var bool
     */
    private bool $complete;
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;

    /**
     * @return bool
     */
    public function getCompleteStatus(): bool
    {
        return $this->complete;
    }

    /**
     * @return void
     */
    public function setComplete(): void
    {
        $this->complete = true;
    }

    /**
     * @return void
     */
    public function unSetComplete(): void
    {
        $this->complete = false;
    }
}
