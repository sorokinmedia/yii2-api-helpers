<?php
namespace sorokinmedia\api_helpers\ActionModels\link;

use sorokinmedia\api_helpers\ActionModels\ApiAnswerAction;

/**
 * Класс, описывающий действие в виде ссылки, открывающейся в новом же окне
 * Необходимо задание обязательных параметров: id, name, url
 *
 * Class ApiAnswerActionSelfLink
 * @package sorokinmedia\api_helpers\ActionModels\link
 */
class ApiAnswerActionOutLink extends ApiAnswerAction
{
    /**
     * ApiAnswerActionSameLink constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->type = self::TYPE_OUT_LINK;
        $this->method = self::METHOD_SELF;
    }
}