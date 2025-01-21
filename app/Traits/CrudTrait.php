<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait CrudTrait
{
    protected $crudHelper;

    public function index(Request $request)
    {
        $items = $this->crudHelper->all($request->all(), $request->get('per_page', 15));
        return response()->json($items);
    }

    public function show($id)
    {
        $item = $this->crudHelper->get($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $item = $this->crudHelper->create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = $this->crudHelper->update($id, $request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $this->crudHelper->delete($id);
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
