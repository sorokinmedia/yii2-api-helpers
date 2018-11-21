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
 */
class ApiAnswerAction extends Model
{
    public $id;
    public $icon;
    public $btn_class;
    public $name;
    public $type;
    public $method;
    public $url;

    const TYPE_LINK = 'link'; // тип действия ссылка
    const TYPE_QUERY = 'query'; // тип действия запрос на API

    const METHOD_GET = 'GET'; // get запрос
    const METHOD_POST = 'POST'; // post запрос
    const METHOD_DELETE = 'DELETE'; // delete запрос

    const METHOD_BLANK = 'blank'; // открыть ссылку в новом окне
    const METHOD_SELF = 'self'; // открыть ссылку в этом же окне

    /**
     * ApiAnswerAction constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}