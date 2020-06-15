<?php 
namespace BPBJ\Providers;
use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        View::composer('*', function($view){
            //any code to set $val variable
            $kilasinfos = DB::table('blogs')->where('cat', '=', 1)->orderBy('created_at', 'DESC')->take(4)->get();
            $agendafront = DB::table('agendas')->orderBy('jadwal', 'DESC')->take(5)->get();
            $view->with('kilasinfos', $kilasinfos)->with('agendafront', $agendafront);
        });
    }

    public function register()
    {
        //
    }
}