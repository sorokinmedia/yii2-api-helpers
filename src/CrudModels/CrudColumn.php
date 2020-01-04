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
    public const TYPE_INTEGER = 'integer';
    public const TYPE_NUMBER = 'number';
    public const TYPE_SELECT = 'select';
    public const TYPE_STRING = 'string';
    public const TYPE_TEXT = 'text';
    public const TYPE_DATE = 'date';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_OBJECT = 'object';
    public const TYPE_ARRAY = 'array';
    public const TYPE_ACTIONS = 'actions';
    public const TYPE_LINK = 'link';
    public const TYPE_EDITOR = 'editor';
    public const TYPE_HTML = 'html';
    public const TYPE_ARRAY_OBJECTS = 'array_objects';
    public const TYPE_EXTENDED_ARRAY = 'array_ext';
    public $id;
    public $title;
    public $type;
    public $filter;
    public $order;

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
