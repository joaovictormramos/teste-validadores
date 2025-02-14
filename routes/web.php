<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\UnidadeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/painel', function () {
        $user = Auth::check() ? Auth::user() : null;
        return view('painel', compact('user'));
    })->name('painel');

    /*Grupos Economicos Routes*/
    Route::get('/grupos', [GrupoEconomicoController::class, 'index'])->name('grupos.index'); // ver todos os registros
    Route::get('/grupos/create', [GrupoEconomicoController::class, 'create'])->name('grupos.create');  // criar registro
    Route::post('/grupos/store', [GrupoEconomicoController::class, 'store'])->name('grupos.store');   // salvar novo registro
    Route::get('/grupos/show/{grupo}', [GrupoEconomicoController::class, 'show'])->name('grupos.show'); // ver registro
    Route::get('/grupos/{grupo}/edit', [GrupoEconomicoController::class, 'edit'])->name('grupos.edit'); // editar registro
    Route::patch('/grupos/{grupo}', [GrupoEconomicoController::class, 'update'])->name('grupos.update'); // atualizar registro
    Route::delete('/grupos/destroy/{grupo}', [GrupoEconomicoController::class, 'destroy'])->name('grupos.destroy'); // excluir registro
    Route::get('/grupos/export/', [GrupoEconomicoController::class, 'export'])->name('grupos.export');
    /*Grupos Economicos Routes*/

    /*Bandeiras Routes*/
    Route::get('/bandeiras', [BandeiraController::class, 'index'])->name('bandeiras.index');  // ver todos os registros
    Route::get('/bandeiras/create', [BandeiraController::class, 'create'])->name('bandeiras.create');  // criar registro
    Route::post('/bandeiras/store', [BandeiraController::class, 'store'])->name('bandeiras.store');   // salvar novo registro
    Route::get('/bandeiras/show/{bandeira}', [BandeiraController::class, 'show'])->name('bandeiras.show'); // ver registro
    Route::get('/bandeiras/{bandeira}/edit', [BandeiraController::class, 'edit'])->name('bandeiras.edit'); // editar registro
    Route::patch('/bandeiras/{bandeira}', [BandeiraController::class, 'update'])->name('bandeiras.update'); // atualizar registro
    Route::delete('/bandeiras/destroy/{bandeira}', [BandeiraController::class, 'destroy'])->name('bandeiras.destroy'); // excluir registro
    Route::get('/bandeiras/export/', [BandeiraController::class, 'export'])->name('bandeiras.export');
    /*Bandeiras Routes*/

    /*Unidades Routes*/
    Route::get('/unidades', [UnidadeController::class, 'index'])->name('unidades.index');  // ver todos os registros
    Route::get('/unidades/create', [UnidadeController::class, 'create'])->name('unidades.create');  // criar registro
    Route::post('/unidades/store', [UnidadeController::class, 'store'])->name('unidades.store');   // salvar novo registro
    Route::get('/unidades/show/{unidade}', [UnidadeController::class, 'show'])->name('unidades.show'); // ver registro
    Route::get('/unidades/{unidade}/edit', [UnidadeController::class, 'edit'])->name('unidades.edit'); // editar registro
    Route::patch('/unidades/{unidade}', [UnidadeController::class, 'update'])->name('unidades.update'); // atualizar registro
    Route::delete('/unidades/destroy/{unidade}', [UnidadeController::class, 'destroy'])->name('unidades.destroy'); // excluir registro
    Route::get('/unidades/export', [UnidadeController::class, 'export'])->name('unidades.export');
    /*Unidades Routes*/

    /*Colaboradores Routes*/
    Route::get('/colaboradors', [ColaboradorController::class, 'index'])->name('colaboradors.index');  // ver todos os registros
    Route::get('/colaboradors/create', [ColaboradorController::class, 'create'])->name('colaboradors.create');  // criar registro
    Route::post('/colaboradors/store', [ColaboradorController::class, 'store'])->name('colaboradors.store');   // salvar novo registro
    Route::get('/colaboradors/show/{colaborador}', [ColaboradorController::class, 'show'])->name('colaboradors.show'); // ver registro
    Route::get('/colaboradors/{colaborador}/edit', [ColaboradorController::class, 'edit'])->name('colaboradors.edit'); // editar registro
    Route::patch('/colaboradors/{colaborador}', [ColaboradorController::class, 'update'])->name('colaboradors.update'); // atualizar registro
    Route::delete('/colaboradors/destroy/{colaborador}', [ColaboradorController::class, 'destroy'])->name('colaboradors.destroy'); // excluir registro
    Route::get('/colaboradors/export/', [ColaboradorController::class, 'export'])->name('colaboradors.export');
    /*Colaboradores Routes*/

    Route::get('/auditorias', [AuditController::class, 'index'])->name('audits.index');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/auth/{provider}/redirect', function (string $provider) {
    return Socialite::driver($provider)->redirect();
})->name('auth');

Route::get('/auth/{provider}/callback', function (string $provider) {
    $provideruser = Socialite::driver($provider)->user();

    $user = Socialite::driver($provider)->user();

    $user = User::updateOrCreate([

        'email' => $provideruser->email,
    ], [
        'provider_id' => $provideruser->id,
        'name' => $provideruser->name,
        'provider_avatar' => $provideruser->provider_avatar,
        'provider_name' => $provider,
    ]);

    Auth::login($user);

    return redirect()->route('painel');
});

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect()->route('index');
})->name('logout');
