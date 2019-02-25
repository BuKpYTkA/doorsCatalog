<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 14:40
 */

namespace App\Repository\FeedBackRepository;

use App\Entity\FeedBack\Feedback;
use App\Repository\GeneralRepository\GeneralRepository;

class FeedBackRepository extends GeneralRepository implements FeedBackRepositoryInterface
{

    /**
     * FeedBackRepository constructor.
     * @param Feedback $feedback
     */
    public function __construct(Feedback $feedback)
    {
        parent::__construct($feedback);
    }

}