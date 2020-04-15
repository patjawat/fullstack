<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?=Html::a(Html::img('@web/img/AdminLTELogo.png', [
    'class' => 'brand-image img-circle elevation-3',
    'style' => 'opacity: .8']) . '<span class="brand-text font-weight-light">ระบบเต้นรถมือสอง</span>',
    ['/car2/admin'], ['class' => 'brand-link elevation-4']);?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <?=Html::a('<i class="fas fa-cart-plus"></i> <p>ใบสั่งซื้อ</p>', ['/car2/customer'], ['class' => 'nav-link']);?>
                </li>
                <li class="nav-item">
                    <?=Html::a('<i class="far fa-copy"></i> <p>ใบจอง</p>', ['/car2/customer'], ['class' => 'nav-link']);?>
                </li>
                <li class="nav-item">
                    <?=Html::a('<i class="fas fa-user-tag"></i> <p>ลูกค้า</p>', ['/car2/customers'], ['class' => Yii::$app->controller->id == 'customers' ? 'nav-link active' : 'nav-link']);?>
                </li>
                <li class="nav-item">
                    <?=Html::a('<i class="fas fa-code-branch"></i> <p>สาขา</p>', ['/car2/branch'], ['class' => Yii::$app->controller->id == 'branch' ? 'nav-link active' : 'nav-link']);?>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"> <i class="fas fa-car"></i>
                        <p>
                            รถยนต์
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <?=Html::a('<i class="fas fa-user-tag"></i> <p>ยี่ห้อ</p>', ['/car2/bands'], ['class' => 'nav-link']);?>
                        </li>
                        <li class="nav-item">
                            <?=Html::a('<i class="fas fa-user-tag"></i> <p>ข้อมูลรถยนต์</p>', ['/car2/cars'], ['class' => 'nav-link']);?>
                        </li>

                        <li class="nav-item">
                            <?=Html::a('<i class="fas fa-user-tag"></i> <p>ประเภท</p>', ['/car2/types'], ['class' => 'nav-link']);?>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?=Html::a('<i class="fas fa-cogs"></i> <p>ตั้งค่าระบบ</p>', ['/car2/setting/update','id'=>1], ['class' => Yii::$app->controller->id == 'setting' ? 'nav-link active' : 'nav-link']);?>
                </li>
                <li class="nav-item">
                    <?=Html::a('<i class="fas fa-images"></i> <p>Slide Show</p>', ['/car2/carousel'], ['class' => Yii::$app->controller->id == 'carousel' ? 'nav-link active' : 'nav-link']);?>
                </li>
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                < </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>