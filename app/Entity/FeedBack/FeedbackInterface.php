<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 14:33
 */

namespace App\Entity\FeedBack;

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
interface FeedbackInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     */
    public function setPhone(string $phone);

    /**
     * @return string
     */
    public function getCommentary();

    /**
     * @param string $commentary
     */
    public function setCommentary(string $commentary);

    /**
     * @return bool
     */
    public function isNew();

    /**
     * @param bool $is_new
     */
    public function setIsNew(bool $is_new);

}