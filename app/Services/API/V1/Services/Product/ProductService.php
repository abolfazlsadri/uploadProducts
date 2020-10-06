<?php 

namespace App\Services\API\V1\Services\Product;

use App\Product;
use App\Category;
use App\Services\API\V1\Interfaces\ProductInterface;
use App\Services\API\V1\Interfaces\FileInterface;
use Auth;
use DB;

class ProductService implements ProductInterface
{
    protected $fileInterface;
    public function __construct(FileInterface $fileInterface)
    {
        $this->fileInterface = $fileInterface;
    }

    public function gets(array $request)
    {   
        $query = Product::query();

        if (!empty($request['category_id'])) {
            $query->where('category_id', $request['category_id']);
        }

        $products = $query->paginate($request['per_page'] ?? 10);

        $result=['status' => 200 , 'data' => $products];
        return $result;
    }

    public function create(array $request) : array
    {
        $upload=$this->fileInterface->upload($request);

        if(!$upload){
            $result=['status' => 400 , 'message' => 'عملیات ناموفق'];
            return $result;
        }

        $result=['status' => 200 , 'message' => 'عملیات موفق'];
        return $result;
    }

    public function update(array $request, int $id) : array
    {   
        $product = Product::find($id);
        if (!$product)  return ['message' => "product not found", 'status' => 404];

        $product->update($request);
        return ['message' => "success", 'status' => 200];
    }

    public function delete(int $id) : array
    {   
        $product = Product::find($id);
        if (!$product)  return ['message' => "product not found", 'status' => 404];
        $product->delete();
        return ['message' => "success", 'status' => 200]; 
    }

} 