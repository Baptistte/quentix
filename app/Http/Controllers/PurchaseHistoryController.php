<?php
namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller {
    public function index() {
        $purchases = PurchaseHistory::where('user_id', Auth::id())
            ->with('plan') // 🔹 Charge le plan associé
            ->orderByDesc('purchase_date')
            ->get();

        

        return view('purchase_history.index', compact('purchases'));
    }
}