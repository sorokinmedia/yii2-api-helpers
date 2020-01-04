<?php

namespace sorokinmedia\api_helpers\ActionModels;

use yii\base\Model;

/**
 * Класс, описывающий модель действия, которое можно сделать с моделью
 * Используется для определения кнопок действия
 *
 * Class ApiAnswerAction
 * @package sorokinmedia\api_helpers\ActionModels
 *
 * @property string $id Уникальный ID действия
 * @property string $icon Иконка действия, если есть
 * @property string $btn_class Класс кнопки, если есть
 * @property string $name Название действия. Выводится на кнопке или в тексте ссылки
 * @property string $type Тип действия. link - ссылка, query - запрос на API
 * @property string $method Метод запроса. Для ссылок: blank - в новом окне, self - в этом же окне. Для запросов: GET - get запрос, POST - post запрос, Delete - delete post
 * @property string $url URL ссылки или запроса
 * @property bool $disabled Отображать ссылку со свойством disabled
 */
class ApiAnswerAction extends Model
{
    public const TYPE_LINK = 'link';
    public const TYPE_OUT_LINK = 'out-link';
    public const TYPE_QUERY = 'query';
    public const METHOD_GET = 'GET';
    public const METHOD_PUT = 'PUT';
    public const METHOD_POST = 'POST';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_BLANK = 'blank';
    public const METHOD_SELF = 'self'; // тип действия ссылка

    public $id; // тип действия ссылка
    public $icon; // тип действия запрос на API
    public $btn_class; // get запрос
    public $name; // put запрос
    public $type; // post запрос
    public $method; // delete запрос
    public $url; // открыть ссылку в новом окне
    public $disabled = false; // открыть ссылку в этом же окне

    /**
     * ApiAnswerAction constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}
