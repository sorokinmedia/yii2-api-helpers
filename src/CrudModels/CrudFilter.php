<?php

namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Общий класс для данных по фильтрации по колонке. Все остальные классы наследуются от этого класса.
 *
 * Class CrudFilter
 * @package sorokinmedia\api_helpers\CrudModels
 *
 * @property bool $can Можно ли фильтровать
 * @property string $type Тип фильтра, если есть
 * @property string $defaultValue Дефолтное значение, если есть
 * @property string $query Запрос в апи для получения массива данных для фильтра
 */
class CrudFilter extends Model
{
    public const TYPE_SELECT = 'select';
    public const TYPE_SELECT_ONE = 'select_one';
    public const TYPE_TEXT = 'input_text';
    public const TYPE_NUMBER = 'input_number';
    public const TYPE_DATE = 'date_picker';
    public const TYPE_BOOL = 'boolean';

    public $can = false;
    public $type = 'input_text';
    public $defaultValue = '';
    public $query = '';

    /**
     * Filter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}
