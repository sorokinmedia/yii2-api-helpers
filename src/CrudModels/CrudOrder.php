<?php
namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Общий класс для данных по сортировке колонки. Все остальные классы наследуются от этого класса.
 *
 * Class CrudOrder
 * @package sorokinmedia\api_helpers\CrudModels
 *
 * @property boolean $can Доступна ли колонка для сортировки
 * @property array $orders Направление сортировки
 */
class CrudOrder extends Model
{
    public $can = true;
    public $orders = ['SORT_ASC', 'SORT_DESC'];

    /**
     * Order constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}