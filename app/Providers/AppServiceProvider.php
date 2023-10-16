<?php

namespace App\Providers;
use App\AdminLTE\AccountMenuBuildingEvent;
// use App\Models\Handbook;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Dispatcher $events)
    {

        app('view')->addNamespace('adminlte', resource_path("views/vendor/adminlte"));
        app('translator')->addNamespace("site", resource_path("lang/vendor/site"));

        // Account menu
        $events->listen(AccountMenuBuildingEvent::class, function (AccountMenuBuildingEvent $event) {
            foreach (config("app.account.navigation") as $item) {
                $event->menu->add($item);
            }
        });

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if(auth()->user()->role=='admin'){
            $event->menu->add(
                    // ['header' => 'NAVIGATION_PRINCIPALE'],
                        [
                        'text' => 'profile',
                        'url'  => '/profile',
                        'icon' => 'fas fa-fw fa-user',
                        ],
                        [
                        'text' => "Tableau de bord",
                        'url'  => 'dashboard/admin',
                          'icon' => 'fas fa-tachometer-alt',
                        ],

                        [
                            'text' => 'La liste des Employes',
                            'url'  => 'admin/employes',
                            'icon' => 'fas fa-list',
                        ],
                        [
                            'text' => 'Ajouter un Employé',
                            'url'  => 'admin/employes/create',
                            'icon' => 'fas fa-user-plus',
                        ],
                        [
                            'text' => "Liste des Analyses",
                            'url'  => '/admin/analyse',
                            'icon' => 'fas fa-file-archive',
                        ],
                         [
                            'text' => "Ajouter un Analyse",
                            'url'  => '/admin/analyse/create',
                            'icon' => 'fas fa-sold fa-plus',
                        ],
                        [
                            'text' => "La liste des Résultats",
                            'icon' => 'fas fa-solid fa-receipt',
                            'url'  =>'/admin/resultat'
                        ],
                        [
                            'text' => "L'historique des Résultats",
                            'icon' => 'fas fa-file-invoice',
                            'url'  =>'/admin/historique-resultat'
                        ],
                        [
                            'text' => "La liste des paiements",
                            'url'  => '/admin/paiements',
                            'icon' => 'fas fa-money-check',
                        ],

        );
        }else if(auth()->user()->role=='employe'){
            $event->menu->add(
                // ['header' => 'Navigation Principale'],

                [
                    'text' => "Tableau de bord",
                        'url'  => '/dashboard/employe',
                      'icon' => 'fas fa-tachometer-alt',
               ],

                [
                        'text' => 'La liste des Patients',
                        'url'  => 'employe/patients',
                        'icon' => 'fas fa-list',
                ],
                [
                        'text' => 'Ajouter un Patient',
                        'url'  => 'employe/patients/create',
                        'icon' => 'fas fa-user-plus',
                ],
                [
                 'text' => "La liste des analyses",
                 'icon' => 'fas fa-solid fa-vials',
                 'url'  =>'employe/analyses'
                ],
                [
                    'text' => "La liste des Résultats",
                    'icon' => 'fas fa-solid fa-receipt',
                    'url'  =>'employe/resultat'
                ],

            );

        }
        });
    }
}
