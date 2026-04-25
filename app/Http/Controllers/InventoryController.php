namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
   
    public function adjustStock(Request $request, $id)
    {
        
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            
            
            $product->stock += $request->amount;
            $product->save();

            
            StockLog::create([
                'product_id' => $id,
                'quantity' => $request->amount,
                'type' => $request->amount > 0 ? 'in' : 'out',
                'description' => $request->note
            ]);

        
            DB::commit();

            return response()->json(['message' => 'Stok berhasil diperbarui dan dicatat!']);

        } catch (\Exception $e) {
            
            DB::rollBack();
            return response()->json(['error' => 'Gagal update: ' . $e->getMessage()], 500);
        }
    }
}