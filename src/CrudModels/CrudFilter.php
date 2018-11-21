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
    const TYPE_SELECT = 'select';
    const TYPE_SELECT_ONE = 'select_one';
    const TYPE_TEXT = 'input_text';
    const TYPE_NUMBER = 'input_number';
    const TYPE_DATE = 'date_picker';
    const TYPE_BOOL = 'boolean';

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