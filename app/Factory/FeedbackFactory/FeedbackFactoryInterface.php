<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 14:37
 */

namespace App\Factory\FeedbackFactory;


use App\Entity\FeedBack\Feedback;

/**
 * Class FeedbackFactory
 * @package App\Factory\FeedbackFactory
 */
interface FeedbackFactoryInterface
{

    /**
     * @param string|null $name
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $commentary
     * @param bool $isNew
     * @return Feedback
     */
    public function create(string $name = null, string $email = null, string $phone = null, string $commentary = null, bool $isNew = true);

}