<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOderRequest;
use App\Http\Requests\UpdateOderRequest;
use App\Models\OrderItem;
use App\Models\Oder;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statuses = OrderStatus::all();

        $orders = Oder::query()
            ->with(['user', 'status', 'coupon'])
            ->when($request->status, function ($query, $status) {
                $query->where('order_status_id', $status);
            })
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    /**
     * Hiển thị chi tiết đơn hàng
     */
    public function show($id)
    {
        $order = Oder::with(['user', 'status', 'items', 'coupon'])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Cập nhật trạng thái đơn hàng
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Oder::findOrFail($id);

        $request->validate([
            'status' => 'required|exists:order_statuses,id',
        ]);

        $order->update([
            'order_status_id' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Xóa đơn hàng
     */
    public function destroy($id)
    {
        $order = Oder::findOrFail($id);

        $order->items()->delete();

        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}
