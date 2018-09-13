<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use app\models\Songs;
use app\models\Theme;
use app\models\ThemeItems;
use app\models\VisitBlock;
use app\models\VisitError;
use app\models\Visitor;
use app\models\VisitorCount;
use Yii;
use yii\base\ErrorException;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'test';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*
        $max_id = (int)RadioItem::find()
            ->select('MAX(id)')
            ->scalar();

        //$item = RadioItem::findOne(rand(0, $max_id));

        $items = RadioItem::find()->where('cat_id <> 13 and cat_id <> 17 and cat_id <> 18 and cat_id <> 19 ')->all();
        
        $item = $items[rand(0,count($items)-1)];


        $theme_items = [];
        $cats = Category::find()->all();
        // $items = RadioItem::find()->all();
        $themes = Theme::find()->all();

        foreach ($themes as $theme) {
            $theme_items[$theme->title] = ThemeItems::find()->where(['theme_id' => $theme->id])->all();
        }

        //shuffle($theme_items);
        //return var_dump($theme_items);
       // echo Yii::$app->request->referrer; exit;
        /*if(Yii::$app->request->referrer != Url::home(true)) {
            return $this->renderPartial('index', ['cats' => $cats, 'theme_items' => $theme_items]);
        }
        else{*/
            return $this->render('index'
                //['cats' => $cats, 'theme_items' => $theme_items, 'cur_item' => $item]
            );
      //  }


    }
    
  
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionForAntoha()
    {
        $max_id = (int)RadioItem::find()
            ->select('MAX(id)')
            ->scalar();

        $item = RadioItem::findOne(rand(0, $max_id));

        $theme_items = [];
        $cats = Category::find()->all();
        // $items = RadioItem::find()->all();
        $themes = Theme::find()->all();

        foreach ($themes as $theme) {
            $theme_items[$theme->title] = ThemeItems::find()->where(['theme_id' => $theme->id])->all();
        }
        
        return $this->render('antoha', ['cats' => $cats, 'theme_items' => $theme_items, 'cur_item' => $item]);
       
        
    }
    
    function actionGetItemByLink(){
        if(Yii::$app->getRequest()->getQueryParam('u') && Yii::$app->getRequest()->getQueryParam('b')) {
           // return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
            //return var_dump(Yii::$app->getRequest()->getQueryParam('u'));
            $mount = Yii::$app->getRequest()->getQueryParam('u');
            $block = Yii::$app->getRequest()->getQueryParam('b');
            /*if(mb_detect_encoding($current_track) != 'ASCII') {

            }
            iconv( "utf-8", "windows-1251", addslashes(file("http://37.192.187.83:10088/status.xsl?mount=/$mount")[64])) );
            */
            $current_track = strip_tags(html_entity_decode(addslashes(file("http://37.192.187.83:10088/status.xsl?mount=/$mount")[64])));

           // $current_track = strip_tags(addslashes(file("http://37.192.187.83:10088/status.xsl?mount=/$mount")[64]));
            //var_dump(file("http://37.192.187.83:10088/status.xsl?mount=/$mount"));
           try {
                $item = RadioItem::find()->where(['like', 'audio', trim($current_track)])->one();
                if($item){
                    return "document.getElementById('".$block."').innerHTML = '".$item->category->name." :: ".addslashes($item->anons)." :: ".$item->title."';";
                    //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
                };
            } catch (ErrorException $e) {
                return 12;
            }

            // return var_dump(substr($current_track, -10));


            if(trim($current_track) == 'oho' || substr($current_track, 0) == 'komnata_s_mehom') {
                return "document.getElementById('".$block."').innerHTML = 'РАДИО-БЛОГ КОМНАТА С МЕХОМ - ВСЕГДА ЖИВОЙ ЗВУК';";
            }



            if($current_track){
                return "document.getElementById('".$block."').innerHTML = '".trim($current_track)."';";
                //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
            };


            return "document.getElementById('".$block."').innerHTML = 'Доброго Вам Времени!';";

        }

        return "document.getElementById('rand').innerHTML = 'Радио скрючилось!';";
        /*$current_track = file("http://37.192.187.83:10088/ices.vclt") ?
            substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : "Скоро возобновление трансляции";*/

     // return var_dump(file("http://37.192.187.83:10088/status.xsl?mount=/test_mp3"));
        //http://radio.kraslan.ru:8000/status.xsl?mount=/radiobox отсюда не проще тянуть???

        /*$result = [];

        $handle = @fopen("http://37.192.187.83:10088/status.xsl","r");
        if ($handle) {
            $i=0;
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($i==68) {
                    $d = preg_split("/<[^>]*[^\/]>/i",$buffer);
                    array_push($result,"<a href=\"http://37.192.187.83:10088/1.m3u\">".$d[1]."</a>");
                }
                else if ($i==126) {
                    $d = preg_split("/<[^>]*[^\/]>/i",$buffer);
                    array_push($result,"<a href=\"http://37.192.187.83:10088/2.m3u\">".$d[1]."</a>");
                }
                else if ($i==184){
                    $d = preg_split("/<[^>]*[^\/]>/i",$buffer);
                    array_push($result,"<a href=\"http://37.192.187.83:10088/3.m3u\">".$d[1]."</a>");
                }
                else if ($i==242) {
                    $d = preg_split("/<[^>]*[^\/]>/i",$buffer);
                    array_push($result,"<a href=\"http://37.192.187.83:10088/4.m3u\">".$d[1]."</a>");
                }
                $i++;
            }
            fclose($handle);
            foreach ($result as $link)
                echo $link."\n";
        }
        return var_dump($result);
        */
        //http://90.151.96.164:8000/status.xsl

        /*if(RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])){
            try {
                $item = RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])->one();
            } catch (ErrorException $e) {
                return 12;
            }
            if($item){
                return "document.getElementById('rand').innerHTML = '".$item->category->name." :: ".addslashes($item->anons)." :: ".$item->title."';";
                //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
            };
        }

        if(Songs::find()->where(['like', 'link', trim(substr($current_track, -10))])){
            try {
                $item = Songs::find()->where(['like', 'link', trim(substr($current_track, -10))])->one();
            } catch (ErrorException $e) {
                return 12;
            }
            if($item){
                return "document.getElementById('rand').innerHTML = '".$item->category->name." :: ".addslashes($item->anons)." :: ".$item->title."';";
                //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
            };
        }
        */



        /*if(mb_detect_encoding($current_track) != 'ASCII') {
          //  return  /*mb_convert_encoding($current_track, "windows-1251", "UTF-8");
            //return $out=iconv( mb_detect_encoding($current_track), 'UTF-8', $current_track);
            return "document.getElementById('rand').innerHTML = '".addslashes(trim($current_track))."';";
           // return mb_detect_encoding($current_track);
        }
    */
/*

        if($current_track){
            if(RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])){
                try {
                    $item = RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])->one();
                } catch (ErrorException $e) {
                    return 12;
                }
                if($item){
                    return "document.getElementById('rand').innerHTML = '".$item->category->name." :: ".addslashes($item->anons)." :: ".$item->title."';";
                    //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
                };
            }
            return "document.getElementById('rand').innerHTML = '".addslashes(trim($current_track))."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };



        //$item_title = RadioItem::find()->where(' audio LIKE "%krepche-russkogo-ivana%"')->one();
*/

        //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
    }

    function actionGetItemText(){
        $current_track = file("http://37.192.187.83:10088/ices.vclt") ?
            substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : "Скоро возобновление трансляции";

        //$item_title = RadioItem::find()->where(' audio LIKE "%krepche-russkogo-ivana%"')->one();
        $item = RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])->one();
        //return var_dump(substr($current_track, -10));

        if($item){
            return "document.getElementById('section_page').innerHTML = '".nl2br(addslashes($item->text))."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };
    }


    function actionShowCurrentRadioTracksTest(){
        //return var_dump(file("http://88.212.253.193:8000/status.xsl?mount=/test")[68]);
        return '<p>'.$this->getAudioTags($this->getTrackInfo()).'</p>';
    }

    function getAudioTags($api_string){
        $item = RadioItem::find()->where(['like', 'audio', trim($api_string)])->one();
        //return var_dump($item);

        if($item) return $item->cat->name. " :: ".$item->anons." :: ".$item->title;

        return trim($api_string);

    }

    function actionShowTrackInfo(){
        $item = RadioItem::find()->where(['like', 'audio', trim($this->getTrackInfo())])->one();
        if($item) return $this->render('room', ['item' => $item]);
    }

    function actionShowInfoIcon(){
        $item = RadioItem::find()->where(['like', 'audio', trim($this->getTrackInfo())])->one();
        return '<a href="'.$item->alias .'.html" target="_blank" title="Информация о текущем треке" class="icc"><i class="fa fa-language"></i></a>';
    }


    function actionComeIn()
    {
        //print_r($_POST['ip_json']); exit;

        if(isset($_POST['hash']) && isset($_POST['components']) && isset($_POST['site']) && isset($_POST['block'])) {
            
            $json_string = $_POST['components'];
            $obj = json_decode($json_string);

            $visitor = VisitorCount::find()
                ->where(['hash' => $_POST['hash']])
                ->one();

            if($visitor){

                $visitor->count++;
                $visitor->update(false);

                $block = new VisitBlock();
                $block->visitor_id = $visitor->id;
                $block->time = time();
                $block->site = $_POST['site'];
                $block->block = $_POST['block'];


                if(isset($_POST['ip_json'])){
                    $ip = $_POST['ip_json'];

                    if(isset($ip['ip']))$block->ip = $ip['ip'];
                    if(isset($ip['hostname']))$block->hostname = $ip['hostname'];
                    if(isset($ip['city']))$block->city = $ip['city'];
                    if(isset($ip['block']))$block->region = $ip['block'];
                    if(isset($ip['country']))$block->country = $ip['country'];
                    if(isset($ip['loc']))$block->loc = $ip['loc'];
                    if(isset($ip['org']))$block->org = $ip['org'];
                    if(isset($ip['postal']))$block->postal = $ip['postal'];
                    //var_dump($ip_obj); exit;

                }

                if(!$block->save(false)){
                    $error = new VisitError();
                    $error->time = time();
                    $error->text = 'ошибка сохранения блока на '. $_POST['site'] . ' в блок '. $_POST['block'] . ' hash ' . $_POST['hash'];
                    $error->save(false);
                }

            }
            else{

                try {
                    $visitor = new VisitorCount();
                    $visitor->hash = $_POST['hash'];
                    $visitor->count = 0;
                } catch (ErrorException $e) {

                    $error = new VisitError();
                    $error->time = time();
                    $error->text = $e->getMessage();
                    $error->save(false);
                }


                if($visitor->save(false)) {
                    $visit = new Visitor();

                    $visit->time = time();

                    $visit->visitor_id = $visitor->id;

                    $visit->site = $_POST['site'];
                    $visit->block = $_POST['block'];


                    for ($i = 0; $i < count($obj); $i++) {
                        if ($obj[$i]->key == 'user_agent') $visit->user_agent = $obj[$i]->value;
                        if ($obj[$i]->key == 'language') $visit->language = $obj[$i]->value;
                        if ($obj[$i]->key == 'color_depth') $visit->color_depth = $obj[$i]->value;
                        if ($obj[$i]->key == 'pixel_ratio') $visit->pixel_ratio = $obj[$i]->value;
                        if ($obj[$i]->key == 'hardware_concurrency') $visit->hardware_concurrency = $obj[$i]->value;

                        if ($obj[$i]->key == 'resolution') {
                            $visit->resolution_x = $obj[$i]->value[0];
                            $visit->resolution_y = $obj[$i]->value[1];
                        }

                        if ($obj[$i]->key == 'available_resolution') {
                            $visit->available_resolution_x = $obj[$i]->value[0];
                            $visit->available_resolution_y = $obj[$i]->value[1];
                        }


                        if ($obj[$i]->key == 'timezone_offset') $visit->timezone_offset = $obj[$i]->value;
                        if ($obj[$i]->key == 'session_storage') $visit->session_storage = $obj[$i]->value;
                        if ($obj[$i]->key == 'local_storage') $visit->local_storage = $obj[$i]->value;

                        if ($obj[$i]->key == 'indexed_db') $visit->indexed_db = $obj[$i]->value;
                        if ($obj[$i]->key == 'open_database') $visit->open_database = $obj[$i]->value;
                        if ($obj[$i]->key == 'cpu_class') $visit->cpu_class = $obj[$i]->value;

                        if ($obj[$i]->key == 'navigator_platform') $visit->navigator_platform = $obj[$i]->value;
                        if ($obj[$i]->key == 'do_not_track') $visit->do_not_track = $obj[$i]->value;
                        if ($obj[$i]->key == 'regular_plugins') $visit->regular_plugins = implode('; ', $obj[$i]->value);

                        if ($obj[$i]->key == 'canvas') $visit->canvas = $obj[$i]->value;
                        if ($obj[$i]->key == 'webgl') $visit->webgl = $obj[$i]->value;
                        if ($obj[$i]->key == 'adblock') $visit->adblock = $obj[$i]->value ? 1 : 0;

                        if ($obj[$i]->key == 'has_lied_languages') $visit->has_lied_languages = $obj[$i]->value ? 1 : 0;
                        if ($obj[$i]->key == 'has_lied_resolution') $visit->has_lied_resolution = $obj[$i]->value ? 1 : 0;
                        if ($obj[$i]->key == 'has_lied_os') $visit->has_lied_os = $obj[$i]->value ? 1 : 0;

                        if ($obj[$i]->key == 'has_lied_browser') $visit->has_lied_browser = $obj[$i]->value ? 1 : 0;
                        if ($obj[$i]->key == 'touch_support') $visit->touch_support = $obj[$i]->value[0] ? 1 : 0;
                        if ($obj[$i]->key == 'js_fonts') $visit->js_fonts = implode('; ', $obj[$i]->value);

                    }

                    if(!$visit->save(false)) {
                        $error = new VisitError();
                        $error->time = time();
                        $error->text = 'ошибка сохранения входа на '. $_POST['site'] . ' в блок '. $_POST['block'] . ' hash ' . $_POST['hash'];
                        $error->save(false);

                    }
                    else{
                        $block = new VisitBlock();
                        $block->visitor_id = $visitor->id;
                        $block->time = time();
                        $block->site = $_POST['site'];
                        $block->block = $_POST['block'];
                        if(isset($_POST['ip_json'])){

                            $ip_obj = json_decode($_POST['ip_json']);

                            //var_dump($ip_obj); exit;
                            if(isset($ip_obj->ip))$block->ip = $ip_obj->ip;
                            if(isset($ip_obj->hostname))$block->hostname = $ip_obj->hostname;
                            if(isset($ip_obj->city))$block->city = $ip_obj->city;
                            if(isset($ip_obj->region))$block->region = $ip_obj->region;
                            if(isset($ip_obj->country))$block->country = $ip_obj->country;
                            if(isset($ip_obj->loc))$block->loc = $ip_obj->loc;
                            if(isset($ip_obj->org))$block->org = $ip_obj->org;
                            if(isset($ip_obj->postal))$block->postal = $ip_obj->postal;
                            //var_dump($ip_obj); exit;

                        }


                        if(!$block->save(false)){
                            $error = new VisitError();
                            $error->time = time();
                            $error->text = 'ошибка сохранения блока на '. $_POST['site'] . ' в блок '. $_POST['block'] . ' hash ' . $_POST['hash'];
                            $error->save(false);
                        }
                    }
                }

                else{
                    $error = new VisitError();
                    $error->time = time();
                    $error->text = 'ошибка сохранения пользователя - hash: '. $_POST['hash'] . 'на сайте '. $_POST['site'] . ' в блок '. $_POST['block'] . ' hash ' . $_POST['hash'];
                    $error->save(false);
                }
            }
        }

        else{
            $error = new VisitError();
            $error->time = time();
            $error->text = 'Вход без данных';
            $error->save(false);
        }


    }

    private function getTrackInfo(){
        return html_entity_decode(strip_tags(file("http://88.212.253.193:8000/status.xsl?mount=/test")[68]));
    }
    
}
