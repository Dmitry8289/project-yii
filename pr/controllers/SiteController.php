<?php

namespace app\controllers;

use app\models\Coterie;
use app\models\Feedback;
use app\models\Proposal;
use app\models\ProposalCategory;
use app\models\RegisterForm;
use app\models\Schedule;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        $coteries = Coterie::find()->asArray()->all();
        $coterie_id = Coterie::find()->all();
        return $this->render('index', ['coteries' => $coteries, 'coterie_id' => $coterie_id]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->isAdmin())
            {
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['/site/account']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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

    public function actionAccount()
    {
        $user = User::findOne(Yii::$app->user->id);
        $proposals = $user->proposal;
        $coterie_id = Coterie::find()->all();
        $goodstatus = Proposal::find()->where(['status'=>1])->all();
        $badstatus = Proposal::find()->where(['status'=>0])->all();
        $context = ['proposals'=>$proposals, 'goodstatus' => $goodstatus, 'coterie_id' => $coterie_id, 'badstatus' => $badstatus];//, 'six_eight_age' => $six_eight_age];
        return $this->render('account', $context);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup())
        {
            Yii::$app->session->setFlash('success', 'Регистрация на сервисе прошла успешно!');

            return $this->refresh();
        }
        return $this->render('register', ['model' => $model]);
    }

//    public function actionCoteries()
//    {
//        $coteries = Coterie::find()->asArray()->all();
//        $coterie_id = Coterie::find()->all();
//        return $this->render('coteries', ['coteries' => $coteries, 'coterie_id' => $coterie_id]);//, 'coterie' => $coterie]);
//    }

    public function actionProposal()
    {
        $model = new Proposal();
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->setFlash('success', 'Заявка оставлена. Когда она будет одобрена, вы увидите ее в личном кабинете.');

            return $this->refresh();
        }
        return $this->render('proposal', ['model' => $model]);
    }

    public function actionSchedule()
    {
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $coterie = Coterie::find()->where(['id' => $_GET['id']])->asArray()->all();
            $schedule = Schedule::find()->where(['coterie_id' => $_GET['id']])->all();
            return $this->render('schedule', ['schedule' => $schedule, 'coterie' => $coterie]);
        } else {
            return $this->render('coteries');
        }
    }

    public function actionDetail()
    {
        $coterie = Coterie::find()->where(['id' => $_GET['id']]);
        $feedback = Feedback::find()->where(['coterie_id' => $_GET['id']])->all();
        $model = new Feedback();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Комментарий успешно отправлен');

            return $this->refresh();
        }
        $context = [
            'coterie' => $coterie,
            'feedback' => $feedback,
            'model' => $model
        ];
        return $this->render('detail', $context);
    }
}
