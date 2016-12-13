<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../files/default_profile.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        

        <?= 
        dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],

                    
                    ['label' => 'Tipos de Propiedades', 'icon' => 'fa fa-square', 'url' => ['/property-type']],
                    ['label' => 'Departamento', 'icon' => 'fa fa-leaf', 'url' => ['/state']],
                    
                    ['label' => 'Barrio', 'icon' => 'fa fa-bank', 'url' => ['/neighbourhood']],
                    ['label' => 'Propiedades', 'icon' => 'fa fa-home', 'url' => ['/property']],
                    ['label' => 'Clientes', 'icon' => 'fa fa-user', 'url' => ['/client']],
                    ['label' => 'Tipo de Clientes', 'icon' => 'fa fa-user', 'url' => ['/client-type']],
                    ['label' => 'Monedas', 'icon' => 'fa fa-circle', 'url' => ['/currency']],
                    ['label' => 'Tipos de operación', 'icon' => 'fa fa-flag', 'url' => ['/operation-type']],
                ],
            ]
        ) ?>

    </section>

</aside>
