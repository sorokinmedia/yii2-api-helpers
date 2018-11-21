<?php
namespace sorokinmedia\api_helpers\Serializer;

use yii\web\Link;

/**
 * Сериалайзер изменяет отдачу стандартных yii вещей в апи
 *
 * Class Serializer
 * @package sorokinmedia\api_helpers\Serializer
 */
class Serializer extends \yii\rest\Serializer
{
    /**
     * @param \yii\data\Pagination $pagination
     * @return array
     */
    protected function serializePagination($pagination)
    {
        return [
            $this->linksEnvelope => Link::serialize($pagination->getLinks(true)),
            $this->metaEnvelope => [
                'totalCount' => $pagination->totalCount,
                'pageCount' => $pagination->getPageCount(),
                'currentPage' => ($pagination->getPageCount() == 0) ? 0 : $pagination->getPage() + 1,
                'perPage' => $pagination->getPageSize(),
            ],
        ];
    }

}