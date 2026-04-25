use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

Route::post('/inventory/adjust/{id}', [InventoryController::class, 'adjustStock']);