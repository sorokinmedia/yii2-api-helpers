<?php
namespace sorokinmedia\api_helpers\ActionModels\query;

/**
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
        $this->name = \Yii::t('app', 'Изменить');
    }
}