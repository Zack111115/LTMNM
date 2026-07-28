<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Bộ lọc tìm kiếm
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Phân trang 5 item, giữ tham số trên URL
        $products = $query->latest()->paginate(5)->withQueryString();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->except(['image_up', 'document_up']);

        if ($request->hasFile('image_up')) {
            $data['image_path'] = $request->file('image_up')->store('products/images', 'public');
        }
        
        if ($request->hasFile('document_up')) {
            $data['document_path'] = $request->file('document_up')->store('products/documents', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('ok', 'Thêm sản phẩm thành công!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->except(['image_up', 'document_up']);

        // Xử lý cập nhật ảnh: Xóa ảnh cũ nếu có up ảnh mới
        if ($request->hasFile('image_up')) {
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image_up')->store('products/images', 'public');
        }

        // Xử lý cập nhật tài liệu: Xóa file cũ nếu có up file mới
        if ($request->hasFile('document_up')) {
            if ($product->document_path && Storage::disk('public')->exists($product->document_path)) {
                Storage::disk('public')->delete($product->document_path);
            }
            $data['document_path'] = $request->file('document_up')->store('products/documents', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('ok', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Product $product)
    {
        // Vì dùng SoftDeletes nên không xóa file vật lý ở bước này
        $product->delete();
        return redirect()->route('admin.products.index')->with('ok', 'Xóa sản phẩm thành công!');
    }
    public function downloadDocument($id)
    {
        $product = Product::findOrFail($id);
        if ($product->document_path && Storage::disk('public')->exists($product->document_path)) {
            return response()->download(storage_path('app/public/' . $product->document_path));
        }
        return redirect()->back()->with('error', 'File không tồn tại hoặc đã bị xóa!');
    }

    public function trash()
    {
        // Lấy danh sách sản phẩm đã xóa mềm
        $products = Product::onlyTrashed()->with('category')->paginate(5);
        return view('admin.products.trash', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore(); // Khôi phục lại
        return redirect()->route('admin.products.trash')->with('ok', 'Khôi phục sản phẩm thành công!');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        
        // Xóa triệt để file vật lý trong ổ storage
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }
        if ($product->document_path && Storage::disk('public')->exists($product->document_path)) {
            Storage::disk('public')->delete($product->document_path);
        }
        
        $product->forceDelete(); // Xóa khỏi CSDL
        return redirect()->route('admin.products.trash')->with('ok', 'Đã xóa vĩnh viễn và dọn sạch file đính kèm!');
    }
    public function import(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    Excel::import(new ProductsImport, $request->file('excel_file'));

    return back()->with('success', 'Đã tải dữ liệu từ file Excel thành công.');
}
}