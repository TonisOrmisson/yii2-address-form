<?php
namespace tonisormisson\addressform\controllers;

use tonisormisson\addressform\AddressHelper;
use yii\web\Controller;
use Rinvex\Country\Country;

/**
 * Class QueryController
 * @package tonisormisson\addressform
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QueryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }


    /**
     * @return array
     */
    public function actionRegions()
    {
        $request = \Yii::$app->request;
        if ($request->isAjax && $request->post('depdrop_parents')) {
            $ids = $request->post('depdrop_parents');
            $countryCode = empty($ids[0]) ? null : $ids[0];
            $country = country($countryCode);
            if ($country instanceof Country) {
                return ['output'=> (new AddressHelper())->formatList($country->getDivisions()), 'selected'=>'yee'];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }


}