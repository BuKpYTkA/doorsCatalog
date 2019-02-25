<?php

namespace App\Entity\Brand;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Entity\Brand
 * @property int $id
 * @property string $title
 */
class Brand extends Model implements BrandInterface
{

    protected $fillable = [
        'title',
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

}
