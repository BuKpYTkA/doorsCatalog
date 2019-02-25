<?php

namespace App\Entity\FeedBack;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * @package App\Entity\FeedBack
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $commentary
 * @property bool $is_new
 */
class Feedback extends Model implements FeedbackInterface
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'commentary',
        'is_new'
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * @param string $commentary
     */
    public function setCommentary(string $commentary)
    {
        $this->commentary = $commentary;
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return $this->is_new;
    }

    /**
     * @param bool $is_new
     */
    public function setIsNew(bool $is_new)
    {
        $this->is_new = $is_new;
    }

}
