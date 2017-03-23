<?php
/**
 * @var $this yii\web\View
 */
use app\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = \app\assets\AppAsset::register($this);
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
    <div class="wrapper">
        <!-- header logo: style can be found in header.less -->
        <header class="main-header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
               Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li id="timeline-notifications" class="notifications-menu">
                            <a href="">
                                <i class="fa fa-bell"></i>
                                <span class="label label-success">
                                    10
                                </span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li id="log-dropdown" class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                10
                            </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num'=> 10]) ?></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php for ($i = 0; $i<=10; $i++){?>
                                            <li>
                                                <a href="<?php echo Yii::$app->urlManager->createUrl(['/log/view', 'id'=>$logEntry->id]) ?>">
                                                    <i class="fa fa-warning <?php echo $logEntry->level == \yii\log\Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                    <?php echo $logEntry->category ?>
                                                </a>
                                            </li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <?php echo Html::a(Yii::t('backend', 'View all'), ['/log/index']) ?>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $this->assetManager->getAssetUrl($bundle, 'img/anonymous.png') ?>" class="user-image">
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header light-blue">
                                    <img src="<?php $this->assetManager->getAssetUrl($bundle, 'img/anonymous.png') ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        Admin
                                        <small>
                                            <?php echo Yii::t('app', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                        </small>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('app', 'Profile'), ['/sign-in/profile'], ['class'=>'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-left">
                                        <?php echo Html::a(Yii::t('app', 'Account'), ['/sign-in/account'], ['class'=>'btn btn-default btn-flat']) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo Html::a(Yii::t('app', 'Logout'), ['/sign-in/logout'], ['class'=>'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo Html::a('<i class="fa fa-cogs"></i>', ['/site/settings'])?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php $this->assetManager->getAssetUrl($bundle, 'img/anonymous.png') ?>" class="img-circle" />
                    </div>
                    <div class="pull-left info">
                        <p><?php echo Yii::t('backend', 'Hello, {username}', ['username'=>'Admin']) ?></p>
                        <a href="<?php echo Url::to(['/sign-in/profile']) ?>">
                            <i class="fa fa-circle text-success"></i>
                            <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                        </a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php echo Menu::widget([
                    'options'=>['class'=>'sidebar-menu'],
                    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                    'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                    'activateParents'=>true,
                    'items'=>[
                        [
                            'label'=>Yii::t('backend', 'Main'),
                            'options' => ['class' => 'header']
                        ],
                        [
                            'label'=>'M0',
                            'url' => '#',
                            'icon'=>'<i class="fa fa-edit"></i>',
                            'options'=>['class'=>'treeview'],
                            'items'=>[
                                ['label'=> 'm01', 'url'=>['/m0/m01'], 'icon'=>'<i class="fa fa-angle-double-right"></i>'],
                            ]
                        ],
                    ]
                ]) ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <?php if (isset($this->params['subtitle'])): ?>
                        <small><?php echo $this->params['subtitle'] ?></small>
                    <?php endif; ?>
                </h1>

                <?php echo Breadcrumbs::widget([
                    'tag'=>'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if (Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
                <?php echo $content ?>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

<?php $this->endContent(); ?>