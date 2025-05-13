use App\Http\Controllers\CepController;

Route::get('/cep/{cep}', [CepController::class, 'buscarCep']);
