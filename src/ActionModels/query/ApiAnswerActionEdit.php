<?php
namespace sorokinmedia\api_helpers\ActionModels\query;

/**
 * Класс, описывающий действие на редактирование в виде POST запроса с заданными id/name атрибутами
 * Необходимо задание обязательных параметров: url
 *
 * Class ApiAnswerActionEdit
 * @package sorokinmedia\api_helpers\ActionModels\query
 */
class ApiAnswerActionEdit extends ApiAnswerActionPost
{
    /**
     * ApiAnswerActionEdit constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->id = 'edit';
        $this->name = \Yii::t('app-sm-api-helpers', 'Изменить');
    }
}
