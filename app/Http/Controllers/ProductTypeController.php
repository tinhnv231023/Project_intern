<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductTypeRepository;
use App\Models\ProductType;
use App\Http\Requests\ProductTypeRequest;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
   protected $repository;
  public function __construct(ProductTypeRepository $repository)
  {
      $this->repository = $repository;
  }
    public function index(Request $request)
    {
        $product_type = $this->repository->getAll();
        $product_type = $this->repository->search($request); 
        return view('layout_admin.product_type.create_type', compact('product_type'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:type_product|regex:/(^[\pL0-9 ]+$)/u',
        ];
        $messages = [
            'name.regex' => 'Tên thể loại không được phép có ký tự đặc biệt',
            'name.required' => 'Bạn chưa nhập tên thể loại',
            'name.unique' => 'Tên thể loại đã được sử dụng',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 500); 
        }
        return  $this->repository->create($request);
    }
    public function show($id)
    {
        //
    }
    public function getUpdate(Request $request)
    {
        return $this->repository->update($request);
    }
    public function delete($id)
    {
            $product_type = $this->repository->destroy($id);
            if($product_type){
                ProductType::destroy($id);
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                ], 200);
                
            }else{
            return response()->json([
                'code' => 500,
                'message' => 'danger',
            ], 500);
        }
        
       
    }

    public function getEdit(Request $request)
    {   
        $type = ProductType::find($request->id);         
        return json_encode((object)['type'=>$type]);
    }
}
