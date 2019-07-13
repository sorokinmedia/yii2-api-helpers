<?php
namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Модель для описания колонки в CRUD сервисах
 *
 * Class Column
 * @package sorokinmedia\api_helpers\CrudModels
 *
 * @property string $id ID колонки, используется для сортировки и фильтров
 * @property string $title Название колонки, которое видит пользователь
 * @property string $type Тип колонки. К выбранному типу привязана работа фронтового компонента
 * @property CrudFilter $filter Объект фильтрации. Задает параметры фильтрации по колонке
 * @property CrudOrder $order Объект сортировки. Задает параметры сортировки по колонке
 */
class CrudColumn extends Model
{
    public $id;
    public $title;
    public $type;
    public $filter;
    public $order;

    const TYPE_INTEGER = 'integer';
    const TYPE_NUMBER = 'number';
    const TYPE_SELECT = 'select';
    const TYPE_STRING = 'string';
    const TYPE_TEXT = 'text';
    const TYPE_DATE = 'date';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_OBJECT = 'object';
    const TYPE_ARRAY = 'array';
    const TYPE_ACTIONS = 'actions';
    const TYPE_LINK = 'link';
    const TYPE_EDITOR = 'editor';
    const TYPE_HTML = 'html';
    const TYPE_ARRAY_OBJECTS = 'array_objects';
    const TYPE_EXTENDED_ARRAY = 'array_ext';

    /**
     * основные атрибуты передаются в виде массива - атрибут => значение ($config)
     * объект фильтрации и объект сортировки передаются объектами ($filter, $order)
     *
     * CrudColumn constructor.
     * @param array $config
     * @param CrudFilter $filter
     * @param CrudOrder $order
     */
    public function __construct(array $config = [], CrudFilter $filter, CrudOrder $order)
    {
        parent::__construct($config);
        $this->filter = $filter;
        $this->order = $order;
    }
}