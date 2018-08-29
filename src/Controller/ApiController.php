<?php
namespace sorokinmedia\api_helpers\Controller;

use sorokinmedia\api_helpers\{
    Exception\RestAnswerException,ApiAnswer\ApiAnswer,ApiAnswer\RestMessage
};
use yii\base\InvalidRouteException;
use yii\base\Module;

/**
 * Class ApiController
 * @package sorokinmedia\api_helpers\Controller
 *
 * общий API контроллер
 * все API контроллеры наследовать от этого контроллера
 */
class ApiController extends Controller
{
    // константы для ответов серверов
    const STATUS_SUCCESS = 0; // успешное выполнение, сообщения надо показывать пользователю
    const STATUS_LOG = 10; // успешное выполнение, сообщения не надо показывать пользователю
    const STATUS_ERROR = 100; // ошибка при выполнении, сообщение надо показывать пользователю

    /**
     * обработка ошибок, валидация ответа на соответствие модели, обертка для ошибок
     * @param string $id
     * @param array $params
     * @return ApiAnswer|mixed|null
     * @throws InvalidRouteException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\BadRequestHttpException
     */
    public function runAction($id, $params = [])
    {
        try {
            $action = $this->createAction($id);
            if ($action === null) {
                throw new InvalidRouteException(\Yii::t('app', 'Ошибка в роутинге: {unique_id}/{id}', [
                    'unique_id' => $this->getUniqueId(),
                    'id' => $id
                ]));
            }
            \Yii::trace('Роут: ' . $action->getUniqueId(), __METHOD__);
            if (\Yii::$app->requestedAction === null) {
                \Yii::$app->requestedAction = $action;
            }
            $oldAction = $this->action;
            $this->action = $action;
            $modules = [];
            $runAction = true;
            // call beforeAction on modules
            foreach ($this->getModules() as $module) {
                if ($module->beforeAction($action)) {
                    array_unshift($modules, $module);
                } else {
                    $runAction = false;
                    break;
                }
            }
            $result = null;
            if ($runAction && $this->beforeAction($action)) {
                // run the action
                $result = $action->runWithParams($params);
                if(!($result instanceof ApiAnswer)) {
                    throw new RestAnswerException(\Yii::t('app', 'Неправильный формат ответа, ожидался объект \sorokinmedia\api_helpers\ApiAnswer'));
                }
                $result = $this->afterAction($action, $result);
                // call afterAction on modules
                foreach ($modules as $module) {
                    /* @var $module Module */
                    $result = $module->afterAction($action, $result);
                }
            }
            $this->action = $oldAction;
            return $result;
        } catch (RestAnswerException $e) {
            return new ApiAnswer([
                'status' => self::STATUS_ERROR,
                'messages' => [
                    new RestMessage([
                        'type' => RestMessage::TYPE_SERVER_ERROR,
                        'message' => $e->getMessage(),
                    ]),
                ]
            ]);
        }
    }
}