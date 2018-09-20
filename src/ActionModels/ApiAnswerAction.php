<?php
namespace sorokinmedia\api_helpers\ActionModels;

use yii\base\Model;

/**
 * Class ApiAnswerAction
 * @package sorokinmedia\api_helpers\ActionModels
 *
 * @property string $id
 * @property string $icon
 * @property string $btn_class
 * @property string $name
 * @property string $type
 * @property string $method
 * @property string $url
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

    const TYPE_LINK = 'link';
    const TYPE_QUERY = 'query';

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';

    const METHOD_BLANK = 'blank';
    const METHOD_SELF = 'self';

    /**
     * ApiAnswerAction constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}