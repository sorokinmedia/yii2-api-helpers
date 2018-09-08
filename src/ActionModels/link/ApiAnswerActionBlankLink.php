<?php
namespace sorokinmedia\api_helpers\ActionModels\link;

use sorokinmedia\api_helpers\ActionModels\ApiAnswerAction;

/**
 * Class ApiAnswerActionBlankLink
 * @package sorokinmedia\api_helpers\ActionModels\link
 */
class ApiAnswerActionBlankLink extends ApiAnswerAction
{
    /**
     * ApiAnswerActionBlankLink constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->type = self::TYPE_LINK;
        $this->method = self::METHOD_BLANK;
    }
}